<?php

function get_user ($userid) {
	global $bcdb;
	return $bcdb->get_row("SELECT * FROM $bcdb->user WHERE userid = '$userid'");
}

function get_user_by_mail($email) {
	global $bcdb;
	return $bcdb->get_row("SELECT * FROM $bcdb->user WHERE email = '$email'");
}

function get_users () {
	global $bcdb, $bcrs, $pager, $usertypes;
	
	$sql = "SELECT * 
			FROM $bcdb->user 
			ORDER BY userid";
	$users = ($pager) ? $bcrs->get_results($sql) : $bcdb->get_results($sql);
	foreach($users as $k => $v)
		$users[$k]['utname'] = $usertypes[$users[$k]['usertype']];
	
	return $users;
}

function save_user($userid, $user_values) {
	global $bcdb, $msg;

	if ($bcdb->get_var("SELECT count(email) FROM $bcdb->user WHERE userid != '$userid' AND email = '$user_values[email]'") ) {
		$msg = sprintf(__('Ya existe otro %s con el mismo %s'), 'Usuario', 'Email');
		return false;
	}
	
	if ( $userid && get_user($userid) ) {
		unset($user_values['regdate']);
		unset($user_values['email']); // We don't want someone 'accidentally' update email
	}		
	
	$user_values['userid'] = $userid;
	
	if ( ($query = insert_update_query($bcdb->user, $user_values)) &&
		$bcdb->query($query) ) {
		if (empty($userid))	
			$userid = $bcdb->insert_id;
		
		$msg = __('Los datos han sido guardados satisfactoriamente');
		// TODO: Save affiliates?
		
		return $userid;
	}
	$msg = sprintf(__('Hubo un problema al intentar guardar un %s'), __('Usuario'));
	return false;
}

function remove_user ($userid) {
	global $bcdb;
	$bcdb->query("DELETE FROM $bcdb->agencies WHERE userid = $userid");
	$bcdb->query("DELETE FROM $bcdb->user WHERE userid = $userid");
}

function send_password ($user, $mailerpath = MAILER_PATH) {
	global $bcdb, $smarty, $file, $section_title;
	$newpass = substr(md5(time()), 0, 6);
	$bcdb->query("UPDATE $bcdb->user SET pwd = MD5('$newpass') WHERE userid = '" . $user['userid'] . "'");
	$smarty->assign('newpass', $newpass);
	$smarty->assign('user', $user);
	$cuerpo = $smarty->fetch(pg_file_exists('new-password.html'));

	if ( !send_mail($user['email'], __('Password Request for ') . get_option('name'), make_clickable($cuerpo)) ) {
		$smarty->assign('referer', $_SERVER['HTTP_REFERER']);
		$file = "error.html";
		$section_title = __('Error!');
		return false;
	}
	return true;
}

function send_user_confirm_mail($userid, $mailerpath = MAILER_PATH) {
	global $bcdb, $smarty, $file, $section_title;
	$user = get_user($userid);
	if($user):
		$smarty->assign('user', $user);
		$smarty->assign('site_name', get_option('name'));
		$smarty->assign('actkey', md5($userid));
		$cuerpo = $smarty->fetch(pg_file_exists('confirm-user.html'));	
		
		if ( !send_mail($user['email'], __('Activate your account ') . get_option('name'), make_clickable($cuerpo)) ) {
			
			$smarty->assign('referer', $_SERVER['HTTP_REFERER']);
			$file = "error.html";
			$section_title = __('Error!');
			return false;
		}
		return true;
	endif;
	return false;
}

function get_user_by_activate_code($code) {
	global $bcdb;
	return $bcdb->get_row("SELECT * FROM $bcdb->user WHERE MD5(userid) = '$code'");
}

function activate_user($userid) {
	global $bcdb;
	return $bcdb->query("UPDATE $bcdb->user SET active = 1 WHERE userid = '$userid'");
}

function get_agency ($userid) {
	global $bcdb;
	return $bcdb->get_row("SELECT * FROM $bcdb->agencies WHERE userid = '$userid'");
}

?>
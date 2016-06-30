<?php

require_once('admin.php');

$id = ! empty($_REQUEST['id']) ? abs($_REQUEST['id']) : 0;
$action = ! empty($_REQUEST['action']) ? strtolower( $_REQUEST['action'] ) : '';

$user = get_user($id);
$current_user = current_user();

if ( $_SERVER['REQUEST_METHOD'] == 'POST' && check_admin_referer('update-user') && $id != $current_user['userid'] ) {
	if (isset($_POST['remove']) && $id > 0 && remove_user($id)) {
		safe_redirect('user-list.php');
	}
	elseif ( isset($_POST['id']) && 
		validate_required(array(__('Nombre') => $_POST['name'], __('Email') => $_POST['email'], 
			__('Pais') => $_POST['country_code']))) {
		
		if ( !empty($_POST['pwd']) && $_POST['pwd'] != $_POST['pwd2'] ) {
			$msg = __('Las contraseñas no coinciden');
		}
		else {
			$_POST['pwd'] = trim($_POST['pwd']);
			$user_values = array(
				'name' => $_POST['name'],
				'email' => $_POST['email'],
				'pwd' => md5($_POST['pwd']),
				'country_code' => $_POST['country_code'],
				'usertype' => $_POST['usertype'],
				'active' => (boolean)$_POST['active'],
				'regdate' => 'now()'
			);
			$user_values = array_map('clean_html', $user_values);
			
			if (empty($_POST['pwd']))
				unset($user_values['pwd']);
			
			if ( ( $id = save_user($id, $user_values) ) &&  
					$_SESSION['loginuser']['userid'] == $id ) {
				$_SESSION['loginuser'] = get_user($id);
			}
		}
	}
}

$status = array(
	'0' => __('No'),
	'1' => __('Yes')
);

$user = get_user($id);

$smarty->assign ('user', $user);
$smarty->assign ('usertypes', $usertypes);
$smarty->assign ('countries', get_countries());
$smarty->assign ('status', $status);
$smarty->assign ('file', 'adm/user.html');
$smarty->assign ('section_title', __('Usuarios'));
$smarty->display ('adm/index.html');

?>
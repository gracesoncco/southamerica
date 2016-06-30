<?php
require_once('home.php');

if ( !empty($_SESSION['loginuser']) ) {
	safe_redirect(BASE_URL);
}

$postback = isset($_POST['email']);
$location = !empty($_REQUEST['r']) ? clean_html($_REQUEST['r']) : BASE_URL;
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';

if (!empty($_POST['email'])) {
	$_POST['email'] = sanitize_email($_POST['email']);
}

switch ($action) {
	case 'lostpassword':
		$section_title = __('Recover Password');
		$file = 'lostpassword.html';
		if($postback) {
			$user = get_user_by_mail($_POST['email']);
			if ( $user ) :
				if(send_password($user)) :
					$msg = __('Your password has been sent to ') . $_POST['email'] . ".";
				endif;
			else:
				$msg = __('User doesn\'t exist');
			endif;
		}
	break;
	default:		
		if($postback){			
			$user = get_user_by_mail($_POST['email']);			
			if ( $user ) :
				if( $user['pwd'] == md5($_POST['pwd']) ) :
					if($user['active'] == 1):
						session_regenerate_id();
						$_SESSION['loginuser'] = $user;
						safe_redirect($location);
					else :
						$msg = __('Your account isn\'t active');
					endif;
				else:
					$msg = __('The Password is incorrect');
				endif;
			else:
				$msg = __('User doesn\'t exist');
			endif;
		}
		$section_title = __('Login');
		$file = 'login.html';
	break;
}

$smarty->assign ('section_title', $section_title);
$smarty->assign ('file', $file);
$smarty->assign ('r', $location);
$smarty->display ('index.html');

?>
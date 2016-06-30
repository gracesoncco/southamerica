<?php

require_once('home.php');

$id = ! empty($_REQUEST['user']) ? trim($_REQUEST['user']) : '';
$location = (isset($_REQUEST['r'])) ? $_REQUEST['r'] : BASE_URL . 'utours.php';

if(!empty($id)) {
	$user = get_user_by_activate_code($id);
	if($user) {
		activate_user($user['userid']);
		$_SESSION['loginuser'] = $user;
		$file = 'blank.html';
		$msg = __('Your account has been successfully activated. Please, use following form to see your profile:');
		$site_name = __('Activated Account!');
		header('refresh:3; url=' . BASE_URL . 'utours.php');
	} else {
		$msg = __('Your account could not be activated. Please, use the following form to create a new account.');
		$site_name = __('Error!');
		$file = 'register.html';
	}
} else {
	header("Location: " . BASE_URL);
}
	
if(isset($msg)) $smarty->assign('msg', $msg);

$smarty->assign ('section_title', $site_name);
$smarty->assign ('file', $file);
$smarty->assign ('r', $location);
$smarty->display ('index.html');

?>
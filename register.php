<?php

require_once('home.php');

$action = ! empty($_REQUEST['action']) ? strtolower( $_REQUEST['action'] ) : '';

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	if ( validate_required(array(__('Name') => $_POST['name'], 
		__('E-Mail') => $_POST['email'], __('Password') => $_POST['pwd'], 
		__('Country') => $_POST['country_code'])) &&
		$_POST['pwd'] == $_POST['pwd2']) {
		
		$user_values = array(
			'name' => $_POST['name'],
			'email' => $_POST['email'],
			'pwd' => md5($_POST['pwd']),
			'country_code' => $_POST['country_code']
		);
		$user_values = array_map('strip_tags', $user_values);
		$agency_values = array(	);
		
		$id = new_user($user_values, $agency_values);
		if($id) {
			if(send_user_confirm_mail($id)) {
				$msg = sprintf(__('We sent a mail to %s with instructions to confirm your registration, please check your inbox.'), $user_values['email']);
			}else{
				$msg = sprintf(__('There was an error while creating your account. Please try again or help us to <a href="%s">resolve this problem</a>.'), template_normal_url('contact', $lang));
			}
			empty_vars();
		} else 
			$msg = __('There is already one user with the same mail, if you forgot your password');
	}
	elseif ($_POST['pwd'] != $_POST['pwd2']) {
		$msg = __('Passwords do not match, please enter the same password.');
	}
	
}
	
$file = 'register.html';
$section_title = __('New Company');

$smarty->assign ('countries', get_countries());
$smarty->assign ('default_country', get_option('default_country'));
//$smarty->assign ('action', $action);
$smarty->assign ('file', $file);
$smarty->assign ('section_title', $section_title);
$smarty->display ('index.html');

?>
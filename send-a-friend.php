<?php

include_once dirname(__FILE__) . '/home.php';

$id = ! empty($_REQUEST['id']) ? abs($_REQUEST['id']) : 0;

if(!empty($_REQUEST['title'])) {
	$id = get_tour_by_link($_REQUEST['title']);
}
if ( ! ($tour = get_tour($id, $lang) ) ) {
	safe_redirect(BASE_URL);
}
$smarty->assign('tour', $tour);

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	if ( validate_required(array(
		__('Your name') => $_POST['fname'],
		__('Your e-Mail') => $_POST['fmail'],
		__('Your friend name') => $_POST['dname'],
		__('Your friend e-Mail') => $_POST['dmail']
		)) ) {
		$mail_params['from'] = sanitize_email($_POST['fmail']);
		$mail_params['from_name'] = clean_html($_POST['fname']);
		$_POST['dname'] = clean_html($_POST['dname']);
		$_POST['dmail'] = sanitize_email($_POST['dmail']);
		$_POST['personal'] = clean_html($_POST['personal']);
		$subject = get_option('site_name') . ' ' . __($tour['name']);
		
		$smarty->assign('fname', $mail_params['from_name']);
		$smarty->assign('fmail', $mail_params['from']);
		$smarty->assign('dname', $_POST['dname']);
		$smarty->assign('dmail', $_POST['dmail']);
		$smarty->assign('personal', $_POST['personal']);
		
		$texto = $smarty->fetch('stmt/send-a-friend.html');
		
		if ( !send_mail($_POST['dmail'], $subject, $texto, $_POST['dname'] ) ) {
			$msg = __('We can not send your message, please try again later.');
		}
		else {
			safe_redirect(template_tour_url($tour, $lang));
		}
	}
}

$smarty->assign('file', 'send-a-friend.html');
$smarty->display('index.html');
?>
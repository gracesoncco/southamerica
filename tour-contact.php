<?php

require_once('home.php');

$id = ! empty($_REQUEST['t']) ? abs($_REQUEST['t']) : 0;

// rewrite
if(isset($_GET['l'])) $id = get_tour_by_link($_GET['l']);
// end rewrite

$tour = get_tour($id, $lang);
//$tour_locale = get_tour_locale($id, $lang);

$postback = isset($_REQUEST['cname']);

if($postback) {
	extract($_REQUEST);

	$smarty->assign('rname', $cname);
	$smarty->assign('remail', $cemail);
	$smarty->assign('rctry', get_country($cctry));
	$smarty->assign('rcomm', $rcomm);
	$cuerpo = $smarty->fetch('stmt/contact-mail.html');
	
	include_once(MAILER_PATH . 'class.phpmailer.php');
	$mail = new phpmailer();
	$mail -> Mailer = "smtp";
	$mail -> From = $cemail;
	$mail -> FromName = $cname;
	$mail -> AddAddress (get_option('site_mail'));
	$mail -> Subject = get_option('name') . ' - ' . 'Consulta sobre ' . $tour['name'];
	$mail -> Body = $cuerpo;
	$mail -> IsHTML (true);
	if (!$mail -> Send()) {
		echo __('We Sorry') . ', ' .
			__('The form could not be sent, please try again') . ' ';
		exit();
	} else {
		echo "$cname, " . 
			__('Thanks for your') . " " .	
			__('Contact') . " " . 
			__('we will notice you the confirmation as soon as possible') . " ";
		exit();
	}
}

$smarty->assign ('section_title', __('I want more information about ') . $tour['name']);
$smarty->assign ('tour', $tour);
$smarty->assign ('countries', get_countries());
$smarty->display ('tour-contact.html');

?>
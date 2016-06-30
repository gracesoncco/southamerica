<?php
require_once('home.php');

$id =  !empty($_REQUEST['id']) ? abs($_REQUEST['id']) : 0;
if (empty($id) && !empty($_REQUEST['title']))
	$id = get_tour_by_link($_REQUEST['title']);
	
$postback = (isset($_POST['rcomm']));
$tour = get_tour($id, $lang);

if($postback) {
	extract($_POST);
	$rname = clean_html($rname);
	$remail = sanitize_email($remail);
	$rctry = substr(clean_html($rctry), 0, 2);
	$rcomm = autop(clean_html($rcomm));
	
	$file = "thankyou.html";
	$smarty->assign('rname', $rname);
	$smarty->assign('remail', $remail);
	$smarty->assign('rctry', get_country($rctry));
	$smarty->assign('rcomm', $rcomm);

	$cuerpo = $smarty->fetch('stmt/contact-mail.html');
	$section_title = __('Thank You!');
	
	$mail_params['from'] = $remail;
	$mail_params['from_name'] = $rname;
	
	if ($tour)
		$subject = get_option('name') . ' - ' . 'Consulta sobre ' . $tour['name'];
	else 
		$subject = 'Contacto desde ' . get_option('name');
	
	if (!send_mail(get_option('site_mail'), $subject, make_clickable($cuerpo))) {
		$smarty->assign('referer', urlencode(strip_tags($_SERVER['HTTP_REFERER'])));
		$file = "error.html";
		$section_title = __('Error!');
	}
} else {
	$file = "contact.html";
	$smarty->assign ('countries', get_countries());
	$smarty->assign ('default_country', get_option('default_country'));
	$smarty->assign ('tour', $tour);
	$section_title = get_option('name') . ' &raquo; ' . __('Contact Us');
}

$smarty->assign ('file', $file);
$smarty->assign ('section_title', $section_title);
$smarty->display ('index.html');

?>
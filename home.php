<?php
include_once('init.php');
$smarty->assign('ldestinations', get_random_destinations());
$smarty->assign('ltourtypes', get_tourtypes($lang));
$smarty->assign('site_footer', get_option('site_footer'));
$smarty->assign('site_name', get_option('name'));
$smarty->assign('site_mail', get_option('site_mail'));
$smarty->assign('meta_tags', get_option('meta_tags'));
$smarty->assign('slogan', get_option('slogan'));
$smarty->assign('tlangs', get_active_langs());
$smarty->assign('popular', get_tours('length(picid) > 0', 'pop', 'visit_count DESC', 5));

if ( REWRITE_URL ) {
	$bcrs->display_lang = false;
}
else {
	$bcrs->display_lang = true;
}

if(isset($_SESSION['loginuser'])) {
	$session_active = true;
	$smarty->assign("loginuser", $_SESSION['loginuser']);
	if(basename($_SERVER['PHP_SELF'])=='register.php' ||
		basename($_SERVER['PHP_SELF'])=='login.php') {
		safe_redirect(template_normal_url('utours', $lang));
	}
}
?>
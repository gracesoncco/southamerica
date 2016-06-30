<?php

require_once('home.php');

if(!isset($session_active)) {
	safe_redirect(BASE_URL . 'login.php?r=' . $_SERVER['PHP_SELF']);
}

$pager = true;

$id = $_SESSION['loginuser']['userid'];
$user = get_user($id);

$atours = get_tours();
$tours = array();
if($atours) {
	foreach ($atours as $k => $v ) {
		$tours[$k] = complete_fields($v);
		$tours[$k]['pdfs'] = get_pdfs_by_lang($v['tourid'], $lang);
	}
}

$file = 'utours.html';

$smarty->assign ('RESULTS', $bcrs->get_navigation());
$smarty->assign ('user', $user);
$smarty->assign ('file', $file);
$smarty->assign ('tours', $tours);
$smarty->assign ('section_title', __('My Account') . ' - ' . $user['name']);
$smarty->display ('index.html');

?>
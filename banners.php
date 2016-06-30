<?php

require_once('home.php');

if(!isset($session_active)) {
	header("Location: ". BASE_URL . "login.php?r=" . $_SERVER['PHP_SELF']);
	exit();
}

$id = $_SESSION['loginuser']['userid'];
$user = get_user($id);

$file = 'banners.html';

$banners = array();

$smarty->assign ('user', $user);
$smarty->assign ('file', $file);
$smarty->assign ('banners', $banners);
$smarty->assign ('lightbox', true);
$smarty->assign ('paid', $_SESSION['loginuser']['userid']);
$smarty->assign ('section_title', __('My Account') . ' - ' . $user['name']);
$smarty->display ('index.html');

?>
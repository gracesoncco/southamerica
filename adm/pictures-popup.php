<?php

require_once('admin.php');

$t = ! empty($_REQUEST['t']) ? strtolower( $_REQUEST['t'] ) : 't';

$pager = true;

if ( $_SERVER['REQUEST_METHOD'] == 'POST' && validate_required(array('Name' => $_POST['name'])) ) {
	$picture_values = array(
		'name' => $_POST['name'],
		'pfor' => $t
	);
	
	$id = save_picture(0, $picture_values);
}

$pictures = get_pictures();

$pfors = array(
	't' => __('Tours'),
	'm' => __('Map'),
	'n' => __('News')
);

$smarty->assign ('RESULTS', $bcrs->get_navigation());
$smarty->assign ('pictures', $pictures);
$smarty->assign ('t', $t);
$smarty->assign ('pfors', $pfors);
$smarty->assign ('section_title', __('Pictures'));
$smarty->display ('adm/picture-popup.html');

?>
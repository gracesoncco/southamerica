<?php

include dirname(__FILE__) . '/home.php';

$pager = true;
$bcrs->num_results_per_page = 9;

$id = ! empty($_REQUEST['id']) ? abs($_REQUEST['id']) : 0;
if(! $id && !empty($_REQUEST['title'])) {
	$id = get_tour_by_link($_REQUEST['title']);
}
	
if ( ( $tour = get_tour($id, $lang) ) ) {	
	$pics = get_pictures(null, $tour['picid']);	
	$smarty->assign('tour', $tour);
	$smarty->assign('section_title', __('Photo gallery: ') . $tour['name']);
}
else {
	$smarty->assign('section_title', __('Photo gallery'));
	$pics = get_pictures();
}

$smarty->assign ('RESULTS', $bcrs->get_navigation());
$smarty->assign ('lightbox', true);
$smarty->assign('pics', $pics);
$smarty->assign('file', 'gallery.html');
$smarty->display('index.html');
?>
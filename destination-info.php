<?php
require_once('home.php');

$id = ! empty($_REQUEST['id']) ? abs($_REQUEST['id']) : 0;
$pager = true;

// rewrite
if(isset($_GET['title'])) $id = get_destination_by_link($_GET['title']);
// end rewrite

if ( empty($id) || !($destination = get_destination($id, $lang)) ) {
	not_found();
}
else {
	$pics = get_destination_pictures($destination['destid']);
}

$atours = get_tours_by_destination($id);

$tours = array();
if($atours) {
	foreach ($atours as $k => $v ) {
		$tours[] = complete_fields($v);
	}
}

$smarty->assign ('RESULTS', $bcrs->get_navigation());
$smarty->assign ('destination', $destination);
$smarty->assign ('file', 'destination-info.html');
$smarty->assign ('tours', $tours);
$smarty->assign ('pics', $pics);
$smarty->assign ('lightbox', true);
$smarty->assign ('section_title', strtoupper($destination['name']));
$smarty->display ('index.html');

?>
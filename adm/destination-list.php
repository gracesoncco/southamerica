<?php

require_once('admin.php');

$pager = true;
$has_tabs = true;

if ( isset($_GET['remove']) && !empty($_GET['id']) && check_admin_referer('delete-destination') &&
	remove_destination((int)$_GET['id']) ) {
	$msg = sprintf(__('%s eliminado satisfactoriamente'), __('Destino'));
}

// TODO: Add search

$destinations = get_destinations();
$active_langs = get_active_langs(true);

if($destinations)
	foreach ($destinations as $k => $v)
		$destinations[$k]["langs"] = get_destinations_filled_langs($destinations[$k]["destid"]);


if(isset($msg)) $smarty->assign('msg', $msg);

$smarty->assign ('RESULTS', $bcrs->get_navigation());
$smarty->assign ('destinations', $destinations);
$smarty->assign ('default_destination', get_option('default_destination'));
$smarty->assign ('file', 'adm/destination-list.html');
$smarty->assign ('section_title', __('Destinos'));
$smarty->display ('adm/index.html');


?>
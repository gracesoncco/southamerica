<?php

require_once('admin.php');

$id = ! empty($_REQUEST['id']) ? abs($_REQUEST['id']) : 0;

$has_tabs = true;
$pager = true;

if ( isset($_GET['remove']) && check_admin_referer('delete-tour') && remove_tour($id)) {
	$msg = sprintf(__('%s eliminado satisfactoriamente'), __('Tour'));
}

$tours = get_tours_filled_langs($lang);

$smarty->assign ('RESULTS', $bcrs->get_navigation());
$smarty->assign ('lang', $lang);
$smarty->assign ('tours', $tours);
$smarty->assign ('lang_name', get_language_name($lang));
$smarty->assign ('file', 'adm/tour-list.html');
$smarty->assign ('section_title', __('Tours'));
$smarty->display ('adm/index.html');

?>
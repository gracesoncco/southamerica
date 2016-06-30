<?php

require_once('admin.php');

$pager = true;
$has_tabs = true;

if ( isset($_GET['remove']) && !empty($_GET['id']) && remove_tourtype((int)$_GET['id'])) {
	$msg = sprintf(__('%s eliminado satisfactoriamente'), __('Tipo'));
}

$active_langs = get_active_langs();

$tourtypes = get_tourtypes();

if($tourtypes)
	foreach ($tourtypes as $k => $v)
		$tourtypes[$k]["langs"] = get_tourtype_filled_langs($tourtypes[$k]["typeid"]);

$smarty->assign ('RESULTS', $bcrs->get_navigation());
$smarty->assign ('tourtypes', $tourtypes);
$smarty->assign ('default_type', get_option('default_type'));
$smarty->assign ('lang_name', get_language_name($lang));
$smarty->assign ('file', 'adm/tourtype-list.html');
$smarty->assign ('section_title', __('Tipos de Tour'));
$smarty->display ('adm/index.html');

?>

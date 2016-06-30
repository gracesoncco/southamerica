<?php

require_once('admin.php');

$id = ! empty($_REQUEST['id']) ? abs($_REQUEST['id']) : 0;
$has_tabs = true;

extract($_POST);
$id = abs($id);

if (isset($remove) && $id > 0) { // Remove single locale
	if (remove_tourtype_locale($id, $lang) && empty($msg)) {
		safe_redirect('tourtype-list.php');
	}
	elseif (empty($msg))
		$msg = sprintf(__('No se ha podido eliminar este %s'), __('Tipo'));
}
elseif ( isset($_POST['id']) &&
		validate_required(array('Name' => $name, 'Language' => $lang)) ) {

	$tourtype_values = array(
		'typeid' => $id,
		'lang_code' => $lang,
		'name' => $name,
		'link' => sanitize_title_with_dashes($name)
	);

	$id = save_tourtype($id, $lang, $tourtype_values);
}

$active_langs = get_active_langs();

if ( $id > 0 && $tourtype = get_tourtype($id, $lang) ) {
	$tourtype['langs'] = get_tourtype_filled_langs($id);	
	$smarty->assign ('tourtype', $tourtype);
}

$smarty->assign ('lang', $lang);
$smarty->assign ('default_type', get_option('default_type'));
$smarty->assign ('lang_name', get_language_name($lang));
$smarty->assign ('active_langs', $active_langs);
$smarty->assign ('file', 'adm/tourtype.html');
$smarty->assign ('section_title', __('Types'));
$smarty->display ('adm/index.html');

?>
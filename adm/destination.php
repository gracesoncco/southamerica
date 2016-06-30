<?php

require_once('admin.php');

$id = ! empty($_REQUEST['id']) ? abs($_REQUEST['id']) : 0;

$has_tabs = true;

extract($_POST);
$id = abs($id);

if (isset($remove) && $id > 0) { // Remove single locale
	if ( check_admin_referer('update-destination') && remove_destination_locale($id, $lang) && empty($msg)) {
		safe_redirect('destination-list.php');
	}
	elseif (empty($msg))
		$msg = sprintf(__('No se ha podido eliminar este %s'), __('elemento'));
}
elseif ( isset($_POST['id']) && check_admin_referer('update-destination') &&
		validate_required(array('Nombre' => $name, 'Idioma' => $lang)) ) {

	$destination_values = array(
		'destid'	=> $id,
		'name' => $name,
		'link' => sanitize_title_with_dashes($name)
	);

	$destination_locale_values = array(
		'destid' => $id,
		'lang_code' => $lang,
		'description' => trim($description)
	);

	if (! ($id = save_destination($id, $destination_values, $destination_locale_values) ) ) {		
		$destination = array_merge($destination_values, $destination_locale_values);
		$smarty->assign ('destination', $destination);
	}	
}

$active_langs = get_active_langs();
if ( $id > 0 && $destination = get_destination($id, $lang) ) {
	$destination['langs'] = get_destinations_filled_langs($id);	
	$smarty->assign ('destination', $destination);
}
$smarty->assign ('active_langs', $active_langs);
$smarty->assign ('default_destination', get_option('default_destination'));
$smarty->assign ('action', 'action');
$smarty->assign ('lang_name', get_language_name($lang));
$smarty->assign ('file', 'adm/destination.html');
$smarty->assign ('section_title', __('Destinos'));
$smarty->display ('adm/index.html');


?>
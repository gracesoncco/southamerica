<?php

require_once('admin.php');

$id = ! empty($_REQUEST['id']) ? abs($_REQUEST['id']) : 0;

$has_tabs = true;
extract($_POST);
$id = abs($id);

if (isset($_POST['remove']) && check_admin_referer('update-tour') && 
	remove_tour_locale($id, $lang)) {
	safe_redirect('tour-list.php');
}
elseif (isset($_REQUEST['deletepdf']) && isset($_REQUEST['pdf'])) {
	if (check_admin_referer('delete-pdf') && delete_pdf($_REQUEST['pdf']))
		$msg = sprintf(__('%s eliminado satisfactoriamente'), 'Archivo');
	else 
		$msg = sprintf(__('No se ha podido eliminar este %s'), __('Archivo'));
		
	if ($_REQUEST['deletepdf'] == 'ajax')
		die($msg);
}
elseif ( isset($_POST['id']) && check_admin_referer('update-tour') &&
	validate_required(array('Nombre' => $name, 'Idioma' => $code, 'Resumen' => $resume))) {
	if ( empty($name) )
		$name = __('Sin nombre');
	if ( empty($resume) )
		$resume = __('Sin resumen');
	if ( empty($price) )
		$price = 0;
	if ( empty($code) )
		$code = '';
		
	if (!empty($typeid) && !empty($tdestinations))	{
		$destid = (isset($tdestinations) && is_array($tdestinations)) ? implode(",", $tdestinations) : get_option('default_destination');
		$picid = (isset($ipictures)) ? implode(",", $ipictures) : '';
		
		$id = intval($id);
		$tour_values = array(
			'tourid' => $id,
			'typeid' => $typeid,
			'destid' => $destid,
			'picid' => $picid,
			'code' => strtoupper($code),
			'price' => ((float)$price)
		);

		$tour_locale_values = array(
			'tourid' => $id,
			'lang_code' => $lang,
			'name' => trim($name),
			'resume' => trim($resume),
			'itinerary' => trim($itinerary),
			'include' => trim($include),
			'notinclude' => trim($notinclude),
			'notes' => trim($notes),
			'link' => sanitize_title_with_dashes($name),
		);

		$id = save_tour($id, $tour_values, $tour_locale_values);
	}
	else 
		$msg = sprintf(__('Datos inválidos de %s y/o %s'), __('Tipo'), __('Destino'));
}

$active_langs = get_active_langs();

$destinations = get_destinations();
$tourtypes = get_tourtypes($lang);
$apictures = get_pictures();

if ( ($tour = get_tour($id, $lang) ) ) {
	$tour['langs'] = get_tour_available_langs($id);

	$active_destinations = explode(",", $tour['destid']);
	foreach($destinations as $k => $v) {
		$destinations[$k]['active'] = in_array($destinations[$k]['destid'], $active_destinations);
	}
	
	if (!empty($tour['picid'])) {
		$tour_pictures = explode(",", $tour['picid']);
		$counter = 0;
		foreach ($apictures as $k => $v)
			if(in_array($v['picid'], $tour_pictures)):
				$pictures[$counter] = $v;
				$counter++;
			endif;
		$smarty->assign ('pictures', isset($pictures) ? $pictures : '');
	}	
	
	$pdfs = get_pdfs($id);
	//$prices = get_lodge_prices($id);
	
	$smarty->assign ('pdfs', $pdfs);
	$smarty->assign ('tour', $tour);
	//$smarty->assign ('prices', $prices);
}

$smarty->assign ('action', 'action');
$smarty->assign ('lang', $lang);
$smarty->assign ('tourtypes', $tourtypes);
$smarty->assign ('destinations', $destinations);
$smarty->assign ('default_destination', get_option('default_destination'));
$smarty->assign ('default_type', get_option('default_type'));
$smarty->assign ('lang_name', get_language_name($lang));
$smarty->assign ('active_langs', $active_langs);
$smarty->assign ('js', true);
$smarty->assign ('cookiename', 'tour');
$smarty->assign ('file', 'adm/tour.html');
$smarty->assign ('section_title', __('Tours'));
$smarty->display ('adm/index.html');

?>
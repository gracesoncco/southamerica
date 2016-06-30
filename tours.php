<?php

require_once('home.php');

$pager = true;

$dest_or_type = isset($_REQUEST['destination']) || isset($_REQUEST['tourtype']);

$site_name = get_option('name') . ' - ' . get_option('slogan');

if ( isset($_REQUEST['destination']) )
	$type = 'destination';
elseif (isset($_REQUEST['tourtype'])) {
	$type = 'tourtype';
}

if ( $dest_or_type ) { // Si se busca un destino o tipo
	
	/* Recuperar el ID */
	$id = empty($_REQUEST[$type]) ? 0 : abs($_REQUEST[$type]);
	if (!$id && !empty($_REQUEST['title'])) {
		$id = $_REQUEST['title'];
	}
	
	if ( $type == 'destination' &&  $item = get_destination($id, $lang) ) {		
		$atours = get_tours_by_destination($item['destid']);
		$site_name =  __('Tours in') . ' ' . $item['name'] . ' - ' . get_option('name');
		
		if(!empty($item['description'])) {
			$item['description'] = autop(trim_excerpt($item['description']));
		}
		$smarty->assign ('pics', get_destination_pictures($item['destid']));
		$smarty->assign ('lightbox', true);
	}
	else if ( $item = get_tourtype($id, $lang) ) {
		$atours = get_tours_by_tourtype($item['typeid']);
	}	
	// Destino o tipo encontrado
	if ( $item ) {
		$smarty->assign($type, $item);
	}
	else { // Mostrar tour relacionados
		not_found();
	}
}
elseif (!empty($_REQUEST['s']) || ( !empty($_REQUEST['title']) && !$dest_or_type )) { // búsquedas		
	if ( !empty($_REQUEST['s']) ) {
		$search = $_REQUEST['s'];
	}
	elseif ( !empty($_REQUEST['title']) ) {
		$search = $_REQUEST['title'];
	}
		
	$search = empty($search) ? '' : strip_tags($search);
	
	$atours = search_tours($search, $lang);
	
	$site_name = get_option('name') . ' &raquo; ' . __('Search results for') . 
		specialchars(": $search");	
	$smarty->assign('search_term', specialchars($search));	
	
	template_search_url($search);
}
else {
	$atours = get_tours(null, 'basic');
}

$tours = array();
if( !empty($atours) ) {
	foreach ($atours as $k => $v ) {
		$tours[$k] = complete_fields($v);
	}
}

$smarty->assign ('RESULTS', $bcrs->get_navigation());
$smarty->assign ('section_title', $site_name);
$smarty->assign ('tours', $tours);
$smarty->assign ('file', 'tours.html');
$smarty->display ('index.html');

?>
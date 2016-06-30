<?php

require_once('admin.php');

$id = ! empty($_REQUEST['id']) ? abs($_REQUEST['id']) : 0;
$action = ! empty($_REQUEST['action']) ? strtolower( $_REQUEST['action'] ) : '';

$pager = true;
$has_tabs = 1;
extract($_POST);

if ( isset($_REQUEST['remove']) && remove_link($id) ) {
	$msg = sprintf(__('%s eliminado satisfactoriamente'), __('Enlace'));
}
elseif ( $_SERVER['REQUEST_METHOD'] == 'POST' && empty($_REQUEST['remove']) && 
	validate_required(array('Título' => $name, 'Enlace' => $link )) ) {
	
	if ( !preg_match('`^(ht|f)tp://`i', $link) )
		$link = 'http://' . $link;
		
	$link_values = array(
		'name' => $name,
		'description' => htmlspecialchars(strip_tags($description)),
		'link' => strip_tags(preg_replace('`[\r\n\t]`', '', $link))
	);	
	$id = save_link($id, $link_values);
}

$links = get_links();
if ( $id && $link = get_link($id) ) {
	$smarty->assign ('link', $link);
}

$smarty->assign ('RESULTS', $bcrs->get_navigation());
$smarty->assign ('links', $links);
$smarty->assign ('lightbox', true);
$smarty->assign ('file', 'adm/link.html');
$smarty->assign ('section_title', __('Enlaces'));
$smarty->display ('adm/index.html');

?>
<?php

require_once('admin.php');

$id = ! empty($_REQUEST['id']) ? abs($_REQUEST['id']) : 0;
$action = ! empty($_REQUEST['action']) ? strtolower( $_REQUEST['action'] ) : '';
$t = ! empty($_REQUEST['t']) ? strtolower( $_REQUEST['t'] ) : 't';

$has_tabs = true;

if (isset($_POST['remove']) && $id > 0 && remove_picture($id)) {
	safe_redirect('picture-list.php');
}

if ( isset($_POST['id']) && validate_required(array('Name' => $_POST['name'])) ) {
	$picture_values = array(
		'name' => $_POST['name'],
		'pfor' => $t
	);
	
	$id = save_picture($id, $picture_values);
}

$picture = get_picture($id);

$tpic = array(
	't' => __('Lugares'),
	'n' => __('Noticias'),
	'm'	=> __('Mapas')
);

$smarty->assign ('picture', $picture);
$smarty->assign ('t', $t);
$smarty->assign ('tpic', $tpic);
$smarty->assign ('lightbox', true);
$smarty->assign ('file', 'adm/picture.html');
$smarty->assign ('section_title', __('Imágenes'));
$smarty->display ('adm/index.html');

?>
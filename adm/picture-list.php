<?php

require_once('admin.php');

$id = ! empty($_REQUEST['id']) ? abs($_REQUEST['id']) : 0;
$t = ! empty($_REQUEST['t']) ? strtolower( $_REQUEST['t'] ) : null;

$pager = true;
$has_tabs = true;

if (isset($_GET['remove']) && $id > 0 && remove_picture ( $id )) {	
	$msg = __('Picture has been eliminated successfully');
}

$tpic = array(
	'' => __('Todos'),
	't' => __('Lugares'),
	'n' => __('Noticias'),
	'm'	=> __('Mapas')
);
$pictures = get_pictures($t);

$smarty->assign ('RESULTS', $bcrs->get_navigation());
$smarty->assign ('pictures', $pictures);
$smarty->assign ('tpic', $tpic);
$smarty->assign ('t', $t);
$smarty->assign ('lightbox', true);
$smarty->assign ('file', 'adm/picture-list.html');
$smarty->assign ('section_title', __('Imágenes'));
$smarty->display ('adm/index.html');

?>
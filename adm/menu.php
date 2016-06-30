<?php

if (preg_match('/(.*?)(-list)?.php/i', $_SERVER['SCRIPT_NAME'], $page_name)) {
	$page_name = $page_name[1];
	$smarty->assign('page_name', $page_name);
}
	
/* Lame menu */
$admin_menu = array ( 
		array('title' => __('Inicio'), 'page' => 'index.php', 'section' => 'index'), 
		array('title' => __('Administración'), 'page' => 'tour-list.php', 'section' => 'admin' ), 
		array('title' => __('Ventas'), 'page' => 'reserve.php', 'section' => 'sell'), 
		array('title' => __('Opciones'), 'page' => 'option.php', 'section' => 'option'), 
		array('title' => __('Noticias'), 'page' => 'tawa-news.php', 'section' => 'tawa-news'),
		array('title' => __('Acerca De'), 'page' => 'about.php', 'section' => 'about') );

$page_name = basename($page_name);

$pages['admin'] = array(
	__('Tours') => 'tour-list.php',
	__('Destinos') => 'destination-list.php',
	__('Tipos') => 'tourtype-list.php',			
	__('Fotos') => 'picture-list.php',
	__('Usuarios') => 'user-list.php',
	__('Comentarios') => 'comment-list.php'	
);

$pages['sell'] = array(
	__('Reservas') => 'reserve.php',
	__('Estadísticas de Tours') => 'stats.php'
);
$pages['option'] = array(
	__('General') => 'option.php',
	__('Idiomas disponibles') => 'lang.php'
);

$regex = '/\b(' . preg_quote($page_name) . '(-[^.]+)?\.php)\b/i';

foreach ($pages as $k => $v) {
	if ( preg_match($regex, join(',', $v), $match) ) {
		$admin_item = $k;
		$subitems = & $v;
		$smarty->assign('sub_item', $match[1]);
		break;
	}
}

if ( empty($admin_item) )
	$admin_item = $page_name;
	
$smarty->assign('admin_menu', $admin_menu);
$smarty->assign_by_ref('admin_item', $admin_item);
if ( !empty( $subitems ) )
	$smarty->assign('subitems', $subitems);

?>
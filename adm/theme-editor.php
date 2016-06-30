<?php

include_once './admin.php';

$file = empty($_REQUEST['file']) ? '' : clean_html(trim($_REQUEST['file']));
$file = sanitize_filename($file);

if ( isset($_GET['warning']) ) {
	$msg = __('Los cambios que haga en esta página, pueden hacer que su sitio resulte seriamente afectado');
}

if ( $_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['file']) ) {
	$file = sanitize_filename($_POST['file']);		
	$parent_dir = THEME_PATH . get_current_theme() . '/templates/';
	
	if ( ( isset($_POST['save']) || isset($_POST['delete'])) && is_file($parent_dir . $file) && check_admin_referer('update') ) {
		if ( !is_writable($parent_dir . $file) ) {
			$msg = sprintf(__('El archivo en \'%s\' no tiene permisos de escritura'), $file);
		}
		if ( isset($_POST['save']) ) {
			$newcontent = stripslashes($_POST['newcontent']);
			if ( ! ($handle = fopen($parent_dir . $file, 'w+')) || (fwrite($handle, $newcontent) === FALSE) ) {
				$msg = sprintf(__('No se puede abrir el archivo \'%s\''), $file);
			}
			else {
				$msg = sprintf(__('El archivo \'%s\' ha sido actualizado adecuadamente'), $file);
			}
			@fclose($handle);
		}
		else {
			$msg = sprintf(__('El archivo \'%s\' ha sido eliminado adecuadamente'), $file);
			if ( ! @unlink($parent_dir . $file) ) {
				$msg = sprintf(__('No se pudo eliminar el archivo \'%s\''), $file);				
			}
			$file = dirname($file);
		}
	}
	elseif ( isset($_POST['create']) && check_admin_referer('create') ) {		
		if ( is_dir($parent_dir . $file) ) {
			$parent_dir .= $file . '/';
		}
		else {
			$parent_dir .= dirname($file) . '/';
		}
		$parent_dir = preg_replace('|/+|', '/', $parent_dir);
		$new_file = sanitize_filename($_POST['newfile']);
		
		if (empty($new_file)) {
			$msg = __('Ingresa un nombre de archivo');
		}
		if ( !is_writable($parent_dir) ) {
			$msg = sprintf(__('No se puede guardar el archivo en \'%s\' por falta de permisos'), $parent_dir);
		}
		elseif (file_exists($parent_dir . $new_file)) {
			$msg = sprintf(__('El archivo \'%s\' ya existe'), $parent_dir);
		}
		else {
			$handle = fopen($parent_dir . $new_file, 'w');
			fclose($handle);
			if ( is_file($parent_dir . $file) ) {
				$file = str_replace(basename($file), $new_file, $file);
			}
			else {
				$file = rtrim($file, '/') . "/$new_file";
			}			
			$msg = sprintf(__('El archivo \'%s\' fue creado adecuadamente'), $new_file);
		}
	}
}



$filter_lang = empty($_GET['lang']) ? '' : substr(strip_tags($_GET['lang']), 0, 2);
$file_to_edit = get_file_to_edit($file);

if ( !empty($filter_lang) ) {
	$smarty->assign('filter_lang', "&amp;lang=$filter_lang");
}

$title = get_current_theme();
$current_path = THEME_PATH . get_current_theme() . '/templates/';
if ( is_dir($current_path . $file) ) {
	$current_path .= $file;
	$current_path = preg_replace('|/+|', '/', $current_path);
}
else {
	$title = basename($file);
}

$smarty->assign('current_path', $current_path);
$smarty->assign('current_file', $file_to_edit);
$smarty->assign('files', get_template_files($file, $filter_lang));
$smarty->assign('section_title', sprintf(__('Editor de Plantillas (%s)'), $title));
$smarty->assign('file', 'adm/theme-editor.html');
$smarty->display('adm/index.html');
?>
<?php

require_once('admin.php');

$action = ! empty($_REQUEST['action']) ? strtolower( $_REQUEST['action'] ) : '';

switch($action) {
	case 'save':
		if(!isset($_POST['llangs']))
			$msg = __('Al menos un idioma tiene que ser activado');
		else {
			update_active_langs($_POST['llangs']);
			$msg = __('Los cambios se han realizado correctamente');
		}
		break;
}

$langs = get_languages();	

$smarty->assign ('action', $action);
$smarty->assign ('langs', $langs);
$smarty->assign ('file', 'adm/lang.html');
$smarty->assign ('section_title', __('Idiomas'));
$smarty->display ('adm/index.html');

?>
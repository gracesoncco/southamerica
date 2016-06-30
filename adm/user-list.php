<?php

require_once('admin.php');

$id = ! empty($_REQUEST['id']) ? abs($_REQUEST['id']) : 0;
$action = ! empty($_REQUEST['action']) ? strtolower( $_REQUEST['action'] ) : '';

$pager = true;
$has_tabs = true;

if ( isset($_GET['remove']) && !empty($_GET['id']) && remove_user((int)$_GET['id'])) {
	$msg = sprintf(__('%s eliminado satisfactoriamente'), __('Usuario'));
}

$users = get_users();

$status = array(
	'0' => __('No'),
	'1' => __('Yes')
);

$smarty->assign ('RESULTS', $bcrs->get_navigation());
$smarty->assign ('users', $users);
$smarty->assign ('countries', get_countries());
$smarty->assign ('file', 'adm/user-list.html');
$smarty->assign ('section_title', __('Usuarios'));
$smarty->display ('adm/index.html');

?>
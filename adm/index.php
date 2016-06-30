<?php

require_once('admin.php');

$reserves = get_reserves();

$pager = true;

$section_title = __('Bienvenido');
$smarty->assign('section_title', $section_title);
$smarty->assign('reserves', $reserves);
$smarty->display('adm/index.html');

?>
<?php
require_once dirname(__FILE__) . '/admin.php';
include_once INCLUDE_PATH . 'simplepie/simplepie.inc';


$smarty->assign('file', 'adm/tawa-news.html');
$smarty->assign('section_title', __('Noticias de Tawa Team'));
$smarty->display('adm/index.html');
?>
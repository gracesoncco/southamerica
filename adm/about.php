<?php

include_once dirname(__FILE__) . '/admin.php';
include_once INCLUDE_PATH . 'simplepie/simplepie.inc';

$smarty->assign('rss', fetch_rss('http://blog.tawateam.com/feed/', 5));
$smarty->assign('section_title', 'Tawa Team');
$smarty->assign('file', 'adm/about.html');
$smarty->display('adm/index.html');

?>
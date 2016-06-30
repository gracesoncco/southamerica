<?php

require_once('home.php');

$smarty->assign ('section_title', get_option('name') . ' &raquo; ' . __('Good Deeds'));
$smarty->assign ('file',pg_file_exists('deeds.html'));
$smarty->display ('index.html');

?>
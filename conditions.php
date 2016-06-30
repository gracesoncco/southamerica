<?php

require_once('home.php');

$smarty->assign ('section_title', get_option('name') . ' &raquo; ' . __('Conditions'));
$smarty->assign ('file',pg_file_exists('conditions.html'));
$smarty->display ('index.html');

?>
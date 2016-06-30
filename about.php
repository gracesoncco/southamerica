<?php

require_once('home.php');

$smarty->assign ('section_title', get_option('name') . ' &raquo; ' . __('About Us'));
$smarty->assign ('file', pg_file_exists('about.html'));
$smarty->display ('index.html');

?>
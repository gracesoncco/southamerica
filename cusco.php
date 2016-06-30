<?php

require_once('home.php');

$smarty->assign ('section_title', get_option('name') . ' &raquo; ' . __('Cusco Sale'));
$smarty->assign ('file', pg_file_exists('cusco-sale.html'));
$smarty->display ('index.html');

?>
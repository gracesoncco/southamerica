<?php

include_once('home.php');
$pager = true;
$atours = get_tours(null, 'basic');

$tours = array();

if($atours) {
	foreach ($atours as $k => $v ) {
		$tours[$k] = complete_fields($v);
	}
}

$site_name = get_option('name') . ' - ' . get_option('slogan');
$smarty->assign ('RESULTS', $bcrs->get_navigation());
$smarty->assign ('section_title', $site_name);
$smarty->assign ('file', pg_file_exists('home.html'));
$smarty->assign ('tours', $tours);
$smarty->display ('index.html');

?>
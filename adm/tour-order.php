<?php

require_once dirname(__FILE__) . '/admin.php';

$id = ! empty($_REQUEST['id']) ? abs($_REQUEST['id']) : 0;

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
	
	if ( !empty($_POST['tour']) && is_array($_POST['tour']) ) {
		check_admin_referer('tour-order');
		
		$show_order = $bcdb->get_col("SELECT tourid FROM $bcdb->tour ORDER BY show_order ASC");		
		$to_update = array_diff_assoc($_POST['tour'], $show_order);

		if (!empty($to_update)) {
			foreach ($to_update as $k => $v) {
				$k = (int) $k;
				$v = (int) $v;
				$bcdb->query("UPDATE $bcdb->tour SET show_order = $k WHERE tourid = '$v'");
			}
		}
	}
}

$tours = get_tours_filled_langs($lang, 'show_order ASC');

include_site_script('targetorder.js');

$smarty->assign ('lang', $lang);
$smarty->assign ('tours', $tours);
$smarty->assign ('lang_name', get_language_name($lang));
$smarty->assign ('file', 'adm/tour-order.html');
$smarty->assign ('section_title', __('Tours'));
$smarty->display ('adm/index.html');

?>
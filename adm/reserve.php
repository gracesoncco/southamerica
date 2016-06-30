<?php

require_once('admin.php');

$id = ! empty($_REQUEST['id']) ? abs($_REQUEST['id']) : 0;
$action = ! empty($_REQUEST['action']) ? strtolower( $_REQUEST['action'] ) : '';

$pager = true;

if ( isset($_REQUEST['remove']) && check_admin_referer('remove-booking') && remove_reserve($id) ) {	
	$msg = sprintf(__('%s eliminada satisfactoriamente'), __('Reserva'));
}
elseif ( isset($_REQUEST['assign']) ) {
	safe_redirect("presell.php?id=$id&action=assign");
}

$reserves = get_reserves();
$reserve = get_reserve($id);

if ($reserve != null) {
	$action = 'presell';
	$reserve['country_name'] = get_country($reserve['country']);
	$reserve['tourname'] = get_tour_name_locale($reserve['tourid'], $reserve['lang_code']);
	$reserve['userdata'] = get_user($reserve['userid']);
	$lodge_details = get_lodge_details($reserve['wprice'], $reserve['tourid']);
	$smarty->assign('lodge_details', $lodge_details);
}

$smarty->assign ('RESULTS', $bcrs->get_navigation());
$smarty->assign ('reserves', $reserves);
$smarty->assign ('reserve', $reserve);
$smarty->assign ('action', $action);
$smarty->assign ('file', 'adm/reserve.html');
$smarty->assign ('section_title', __('Reservas'));
$smarty->display ('adm/index.html');

?>
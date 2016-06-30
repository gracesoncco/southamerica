<?php

require_once('home.php');

$r = ! empty($_REQUEST['r']) ? trim($_REQUEST['r']) : '';
$presell = array();
if(!empty($r) && preg_match('/^[a-z\d]{32}$/i', $r) && ($presell = get_presell_by_reservecod($r))) {
	$percent = $presell['percent'];	
	if ( $percent % 100 != 0 ) {
		$total = $presell['total'];
		
		$presell['quota'] = $total * 0.01 * $percent;
		$presell['quota_desc'] = sprintf(
			__('Pay %.2f%% (US$ %.2f) now, and %.2f%% (US$ %.2f) on your arrival.'),
			$percent, 
			$presell['quota'], 
			100 - $percent, 
			$total - $presell['quota'] );
	}
}
elseif ( !empty($r) ) {
	$msg = __('Invalid book code, please try again.');
}
//old_passwords 
$site_name = get_option('name') . ' - Pago en línea';
$smarty->assign ('section_title', $site_name);
$smarty->assign ('account', get_option('paypal'));
$smarty->assign ('presell', $presell);
$smarty->assign ('file', 'payment.html');
$smarty->display ('index.html');

?>
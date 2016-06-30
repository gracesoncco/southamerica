<?php

require_once('home.php');

if(!isset($session_active)) {
	header("Location: ". BASE_URL . "login.php?r=" . $_SERVER['PHP_SELF']);
	exit();
}

$id = $_SESSION['loginuser']['userid'];
$action = ! empty($_REQUEST['action']) ? strtolower( $_REQUEST['action'] ) : '';
$file = 'account.html';

if ( ! empty($_POST['action']) ) {
	$user_values = array(
		'name' => $_POST['name'],
		'email' => $_POST['email'],
		'pwd' => md5($_POST['pwd']),
		'country_code' => $_POST['country_code']
	);
	$user_values = array_map('clean_html', $user_values);
	
	$agency_values = array(
		'iata' => $_POST['iata'],
		'legalname' => $_POST['legalname'],
		'dbaname' => $_POST['dbaname'],
		'agencyname' => $_POST['agencyname'],
		
		'primaryname' => $_POST['primaryname'],
		'primaryemail' => $_POST['primaryemail'],
		'siteinfo' => $_POST['siteinfo'],
		'primarycountry' => $_POST['primarycountry'],
		'primarycity' => $_POST['primarycity'],
		'primarystate' => $_POST['primarystate'],
		'zipcode' => $_POST['zipcode'],
		'address' => $_POST['address'],
		'primaryphone' => $_POST['primaryphone'],
		'primaryfax' => $_POST['primaryfax'],
		
		'paytoname' => $_POST['paytoname'],
		'paytoemail' => $_POST['paytoemail'],
		'paytocountry' => $_POST['paytocountry'],
		'paytocity' => $_POST['paytocity'],
		'paytostate' => $_POST['paytostate'],
		'paytozip' => $_POST['paytozip'],
		'paytoaddress' => $_POST['paytoaddress'],
		
		'bankname' => $_POST['bankname'],
		'bankaccountname' => $_POST['bankaccountname'],
		'routenumber' => $_POST['routenumber'],
		'accountnumber' => $_POST['accountnumber'],
		'statehold' => $_POST['statehold']
	);
	$agency_values = array_map('clean_html', $agency_values);

}

switch ($action) {
	case 'update':
		if($_POST['pwd'] == '') unset($user_values['pwd']);
		save_user($id, $user_values, $agency_values);
		$msg = __('Information has been saved');
		break;
}

$user = get_user($id);
$agency = get_agency($id);

if ( empty($action) ) {
	$action = 'new';
}
	
if ($user != null) {
	$action = 'update';
}

if(isset($msg)) $smarty->assign('msg', $msg);

$smarty->assign ('user', $user);
$smarty->assign ('agency', $agency);
$smarty->assign ('countries', get_countries());
$smarty->assign ('action', $action);
$smarty->assign ('file', $file);
$smarty->assign ('policy', $smarty->fetch(pg_file_exists('accountprivacy.txt')));
$smarty->assign ('section_title', __('My Account') . ' - ' . $user['name']);
$smarty->display ('index.html');

?>
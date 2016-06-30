<?php
require_once('home.php');

$id = ! empty($_REQUEST['id']) ? abs($_REQUEST['id']) : 0;

// rewrite
if(isset($_GET['title'])) $id = get_tour_by_link($_GET['title']);
// end rewrite

$postback = (isset($_POST['rcomm']));

if ($tour = get_tour($id, $lang)) {
	// Update stats
	update_visit($id);
}

if($postback) {
	extract($_POST);
	$id = ! empty($_POST['id']) ? abs($_POST['id']) : 0;
	
	if(!$tour) {
		safe_redirect(BASE_URL);
	}
	$date = strtotime($r_Year."-".$r_Month."-".$r_Day, time());
	
	if ( $date < time()) {
		$date = time();
	}
	$reserve_values = array(
		'tourid' => intval($id),
		'name' => $rname,
		'email' => $remail,
		'city' => $rcity,
		'country' => $rctry,
		'phone' => $rphone,
		'fax' => $rfax,
		'adate' => date('Y-m-d', $date),
		'adults' => $radults,
		'childrens' => $rchilds,
		'students' => $rstudents,
		'comments' => $rcomm,
		'lang_code' => $lang,
		'wprice' => $price,
		'freserve' => 'now()',
		'lang_code' => $lang,
		'status' => 0
	);
	$reserve_values = array_map('clean_html', $reserve_values);
	
	$reserve_values['comments'] = autop( 
		preg_replace('`\\\[rn]`is', '<br />', $reserve_values['comments']) );
	
	if(isset($session_active)) $reserve_values['userid'] = $_SESSION['loginuser']['userid'];
	if(isset($_SESSION['referuser'])) $reserve_values['userid'] = $_SESSION['referuser']['userid'];
	
	if ( reserve_tour($reserve_values) ) {
	
		$smarty->assign('reserv', true);
		$file = "thankyou.html";
		$smarty->assign('rname', $reserve_values['name']);
		$smarty->assign('rctry', get_country($reserve_values['country']));
		$smarty->assign('rcomm', $reserve_values['comments']);
		$cuerpo = $smarty->fetch('stmt/reserve-mail.html');
		$section_title = __('Thank You!');
		
		if ( get_option('send_book_notification') ) {		
			
			send_mail(
				get_option('site_mail'), 
				'Nueva reserva en ' . get_option('name'),
				make_clickable($cuerpo)
			);
		}
	}	
} 
if (empty($file)) {
	$file = "reserve.html";
	$prices = get_lodge_prices($id);
	
	for($i=1;$i<=20;$i++) $radults[$i] = $i;
	for($i=0;$i<=10;$i++) $rchildstudents[$i] = $i;	
	
	if ( ! $tour ) {		
		$tours = search_tours(get_qs_as_search(), $lang);
		$smarty->assign ('tours', $tours);
	}
	else {
		$smarty->assign ('tour', $tour);
	}
	if (!empty($_GET['error']) && $_GET['error'] == 'date') {
		$msg = __('You can not book this tour with past departure date');
	}
	
	$smarty->assign ('prices', $prices);
	$smarty->assign ('radults', $radults);
	$smarty->assign ('rchildstudents', $rchildstudents);
	$smarty->assign ('countries', get_countries());
	$smarty->assign ('default_country', get_option('default_country'));
	$section_title = __('Book');
}

$smarty->assign ('file', $file);
$smarty->assign ('section_title', $section_title);
$smarty->display ('index.html');

?>
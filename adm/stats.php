<?php
include dirname(__FILE__) . '/admin.php';

$pager = true;
$comment_order = empty($_GET['comment']) ? 'desc' : 'asc';
$visit_order = empty($_GET['visit']) ? 'desc' : 'asc';

if ( isset($_GET['comment']) ) {
	$orderby = "comment_count $comment_order";
	$bcrs->set_qs_val('comment', $_GET['comment'] & 0x1);
}
else {
	$orderby = "visit_count $visit_order";
	if (isset($_GET['visit'])) {
		$bcrs->set_qs_val('visit', $_GET['visit'] & 0x1);
	}
}

$comment_order = (int)(isset($_GET['comment']) ? !(boolean)$_GET['comment'] : 0);
$visit_order = (int)(isset($_GET['visit']) ? !(boolean)$_GET['visit'] : 0);

$tours = get_tours(null, 'pop', $orderby);

$bcrs->set_qs_val('lang', $lang);

$smarty->assign('comment_order', $comment_order);
$smarty->assign('visit_order', $visit_order);
$smarty->assign ('RESULTS', $bcrs->get_navigation());
$smarty->assign('tours', $tours);
$smarty->assign('section_title', __('Tours más visitados'));
$smarty->assign('file', 'adm/stats.html');
$smarty->display('adm/index.html');
?>
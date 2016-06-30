<?php

require_once('admin.php');

$id = ! empty($_REQUEST['id']) ? abs($_REQUEST['id']) : 0;
$action = ! empty($_REQUEST['action']) ? strtolower( $_REQUEST['action'] ) : '';

$has_tabs = true;
$pager = true;

if ( isset($_GET['remove']) && !empty($_GET['id']) && 
	check_admin_referer('remove-comment') && remove_comment((int)$_GET['id'])) {
	$msg = sprintf(__('%s eliminado satisfactoriamente'), __('Comentario'));
}

$comments = get_comments(1, $lang);

if($comments) {
	foreach ($comments as $k => $v) {
		$comments[$k]['tour_name'] = get_tour_name_locale($comments[$k]['tourid'], $lang);
	}
}

$smarty->assign('comment_count', get_comment_count(0));
$smarty->assign('spam_filter', get_spam_method());
$smarty->assign ('RESULTS', $bcrs->get_navigation());
$smarty->assign ('comments', $comments);
$smarty->assign ('file', 'adm/comment-list.html');
$smarty->assign ('section_title', __('Comentarios'));
$smarty->display ('adm/index.html');

?>
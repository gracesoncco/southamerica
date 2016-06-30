<?php

require_once('admin.php');

$id = ! empty($_REQUEST['id']) ? abs($_REQUEST['id']) : 0;
$action = ! empty($_REQUEST['action']) ? strtolower( $_REQUEST['action'] ) : '';

if (! get_comment($id) ) {
	safe_redirect('comment-list.php');
}

$pager = true;
$has_tabs = true;

extract($_POST);

if (isset($remove) && $id > 0 && check_admin_referer('comment')) { // Remove single locale
	if (remove_comment($id) && empty($msg)) {
		safe_redirect('comment-list.php');
	}
	elseif (empty($msg))
		$msg = sprintf(__('No se ha podido eliminar este %s'), __('Comentario'));
}
elseif ( isset($_POST['id']) &&
		validate_required(array(__('Name') => $name, __('Email') => $email, __('Description') => $description)) && check_admin_referer('comment') ) {
	
	$comment_values = array(
		'name' => $name,
		'email' => $email,
		'description' => $description,
	);
	
	save_comment($id, $comment_values);
}

$comment = get_comment($id);

if ($comment != null) {
	$comment['tour_name'] = get_tour_name_locale($comment['tourid'], $lang);
	$comment['ip'] = long2ip($comment['ip']);
}

$smarty->assign ('comment', $comment);
$smarty->assign ('file', 'adm/comment.html');
$smarty->assign ('section_title', __('Comments'));
$smarty->display ('adm/index.html');

?>
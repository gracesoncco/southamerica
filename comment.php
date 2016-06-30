<?php
require_once('home.php');

$r = BASE_URL;
if ( ! empty($_REQUEST['r']) )
	$r = $_REQUEST['r'];	
elseif ( ! empty($_SERVER['HTTP_REFERER']) )
	$r =  $_SERVER['HTTP_REFERER'];	
$r = preg_replace('/#.*$/', '', $r);

if ( $_SERVER['REQUEST_METHOD'] == 'POST' && wp_verify_nonce() )  {
	
	$comment_values = array(
		'name' => $_POST['name'],
		'tourid' => intval($_POST['id']),
		'lang_code' => $lang,
		'email' => $_POST['email'],
		'description' => $_POST['description'],
		'pdate' => 'now()',
		'approved' => 1,
		'ip' => get_ip(true)
	);	
	$comment_values = array_map('clean_html', $comment_values);
	$comment_values['description'] = autop( 
		preg_replace('`\\\[rn]`is', '<br />', $comment_values['description']) );
	
	if ( ( $id = save_comment( 0, $comment_values ) ) && $comment_values['approved'] ) {
		$comment = get_comment($id);
		$r .= '#comment-' . $id;
		
		if (get_option('send_comment_notification')) {	
			$smarty->assign('name', $comment_values['name']);
			$smarty->assign('tour', get_tour_locale($comment_values['tourid'], $lang));
			$smarty->assign('lang', $lang);
			$cuerpo = $smarty->fetch('stmt/comment-mail.html');
			
			send_mail(
				get_option('site_mail'), 
				'Nuevo comentario en ' . get_option('name'),
				make_clickable($cuerpo)
			);
		}
	}
	elseif ( !$id ) {
		die($msg);
	}
	else {
		if ( ! preg_match('/\?moderation/', $r) )
			$r .= '?moderation#commentsform';
	}
}

safe_redirect($r);

?>
<?php

include_once dirname( __FILE__ ) . '/admin.php';

if ( isset( $_POST['delete-all'] ) )	
		unset($_POST['comments']);
		
if ( isset($_POST['delete-all']) || ( (isset($_POST['approve']) || isset( $_POST['delete'] )) && 
	!empty($_POST['comments']) && is_array($_POST['comments']) ) ) {
	$spam_control = get_spam_method();
	
	if ( $spam_control['method'] == 'akismet' && class_exists('Akismet') ) {
		$akismet = new Akismet(BASE_URL, $spam_control['value']);
		
		$sql = "SELECT * FROM $bcdb->comment WHERE approved = 0";
		if (!empty( $_POST['comments'] )) {
			$_POST['comments'] = array_map('intval', $_POST['comments']);
			$sql .= " AND commentid IN (" . join(',', $_POST['comments']) . ")";
		}
		
		$comments = $bcdb->get_results($sql);
		
		$spam = isset( $_POST['delete'] ) || isset( $_POST['delete-all'] );
		foreach ($comments as $comment) {
			$akismet->setAuthor($comment['name']);
			$akismet->setAuthorEmail($comment['email']);
			$akismet->setContent($comment['description']);
			$akismet->setUserIP($comment['ip']);
			
			if ( $spam )
				$akismet->submitSpam();
			else
				$akismet->submitHam();
		}
	}
		
	if ( isset( $_POST['approve'] ) ) {
		$sql ="UPDATE $bcdb->comment 
				SET approved = 1
				WHERE approved = 0";
	}
	elseif ( isset( $_POST['delete'] ) || isset( $_POST['delete-all'] ) ) {
		$sql ="	DELETE FROM	$bcdb->comment 
				WHERE 	approved = 0";
	}	
	if ( ! empty( $_POST['comments'] ) )
		$sql .= " AND commentid IN (" . join(',', $_POST['comments']) . ")";
		
	$bcdb->query($sql);
}

$comments = get_comments(0);

$smarty->assign('section_title', __('Moderación de Comentarios'));
$smarty->assign ('comments', $comments);
$smarty->assign('file', 'adm/moderation.html');
$smarty->display('adm/index.html');
?>
<?php

function get_comment($commentid) {
	global $bcdb;
	return $bcdb->get_row("SELECT * FROM $bcdb->comment WHERE commentid = $commentid");
}

function save_comment($commentid, &$comment_values) {
	global $bcdb, $msg;
	
	unset($comment_values['commentid']);
	if ( ! $commentid ) {
		
		if ( ( empty($comment_values['name']) ) || 
			empty($comment_values['description']) || 
			empty($comment_values['ip']) ||
			empty($comment_values['tourid'])) {
			$msg = __('You need to fill all required fields');
			return false;
		}
		
		$dup = "SELECT commentid 
			FROM $bcdb->comment
			WHERE 	LOWER(name) = '". strtolower(trim($comment_values['name'])) . "' AND 
					LOWER(email) = '" . strtolower(trim($comment_values['email'])) . "'AND
					LOWER(description) = '" . strtolower(trim($comment_values['description'])) . "' LIMIT 1";
		
		if ($bcdb->get_var($dup)) {
			die(__('Duplicate comment detected!'));
			return false;
		}
		
		$spam_flood = "SELECT count(*)
			FROM $bcdb->comment
			WHERE	ip = '$comment_values[ip]' AND
					pdate > date_sub(now(), interval 30 second) ";
		if ($bcdb->get_var($spam_flood)) {
			die(__('Sorry, you can post only one comment every 30 seconds'));
			return false;
		}
		
		if ( !filter_comment($comment_values) ) {
			return false;
		}

		if ( $bcdb->query(insert_query($bcdb->comment, $comment_values)) ) {
			$msg = __('Los datos han sido guardados satisfactoriamente');
			
			update_comment_count($comment_values['tourid'], $comment_values['lang_code']);
			
			return $bcdb->insert_id;			
		}
	}
	elseif ( $bcdb->query(update_query($bcdb->comment, $comment_values, "commentid = '$commentid'")) !== false ) {
		$msg = __('Los datos han sido guardados satisfactoriamente');
		return $commentid;
	}
	$msg = sprintf(__('Hubo un problema al intentar guardar un nuevo %s'), __('Comentario'));
	return false;
}

function filter_comment(& $comment_values) {
	global $bcdb, $msg;	
		
	return true;
}

function remove_comment($commentid) {
	global $bcdb;
	if ( $fila = $bcdb->get_row("SELECT tourid, lang_code FROM $bcdb->comment WHERE commentid = '$commentid'")) {
		$bcdb->query("DELETE FROM $bcdb->comment WHERE commentid = '$commentid'");
		update_comment_count($fila['tourid'], $fila['lang_code']);
	}
}

function get_comments( $approved = 1, $lang = '' ) {
	global $bcdb, $bcrs, $pager;
	
	$aditional = '';
	if (!empty($lang))
		$aditional = " AND c.lang_code = '$lang'";
		
	$sql = "SELECT 	c.*, tl.name as tour_name 
			FROM 	$bcdb->comment c, $bcdb->tour_locale tl
			WHERE 	approved = $approved AND
					c.tourid = tl.tourid AND
					c.lang_code = tl.lang_code
					$aditional
			ORDER BY pdate DESC";
	
	return ($pager) ? $bcrs->get_results($sql) : $bcdb->get_results($sql);
}

function get_comment_count ( $approved = false, $tourid = false ) {
	global $bcdb;
	
	$where = '';
	if ( $approved !== false )
		$where = " approved = " . intval($approved);
	if ( $tourid !== false )
		$where = " AND tourid = " . intval($tourid);
		
	if ( !empty($where) )	
		$where = 'WHERE ' . preg_replace('/^ AND/', '', $where);
		
	$sql = "SELECT count(*)
			FROM $bcdb->comment
			$where";
	
	return $bcdb->get_var($sql);
}

function get_comments_by_tour($tourid) {
	global $bcdb, $lang;
	return $bcdb->get_results("
		SELECT 	* 
		FROM 	$bcdb->comment 
		WHERE 	tourid = '$tourid' AND 
				lang_code = '$lang' AND 
				approved = 1 
		ORDER BY pdate ASC");
}

?>
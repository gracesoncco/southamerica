<?php

function get_destination($destid, $lang) {
	global $bcdb;

	return $bcdb->get_row("
		SELECT 	d.destid, name, link, lang_code, description
		FROM 	$bcdb->destination d LEFT JOIN $bcdb->destination_locale dl
		ON 		d.destid = dl.destid AND
				lang_code = '$lang'
		WHERE	d.destid = '$destid' OR link = '$destid'");
}

function get_destination_locale ($destid, $lang) {
	global $bcdb;
	return $bcdb->get_row("SELECT * FROM $bcdb->destination_locale WHERE destid = '$destid' AND lang_code = '$lang'");
}


function save_destination($destid, $destination_values, $destination_locale) {
	global $bcdb, $msg;

	if (isset($destination_values['link'])) {
		$destination_values['link'] =
			get_correct_link($destination_values, $bcdb->destination, false, "destid != '$destid'");
		
		if (empty($destination_values['link'])) {
			$msg = sprintf(__('Ya existe otro %s con el mismo %s'), 'Destino', 'nombre');
			return false;
		}
	}

	// Save destination
	if ( 	($query = insert_update_query($bcdb->destination, $destination_values)) !== false &&
			$bcdb->query($query) ) {
				
		if ( empty($destid))
			$destid = $bcdb->insert_id;

		$destination_locale['destid'] = $destid;
		
		// Save locale
		if ( 	($query = insert_update_query($bcdb->destination_locale, $destination_locale )) !== false &&
				$bcdb->query($query) ) {					
				$msg = __('Los datos han sido guardados satisfactoriamente');

				return $destid;
		}
	}
	$msg = sprintf(__('Hubo un problema al intentar guardar un nuevo %s'), __('Destino'));

	return false;
}

function remove_destination($destid) {
	global $bcdb, $msg;

	$default = get_option('default_destination');
	if ($default == $destid) {
		$msg = sprintf(__('No puedes eliminar este %s'), __('Destino'));
		return false;
	}
	
	if ($bcdb->query("DELETE FROM $bcdb->destination_locale WHERE destid = $destid") &&
		$bcdb->query("DELETE FROM $bcdb->destination WHERE destid = $destid"))
	{
		return true;
	}
	$msg = sprintf(__('No se pudo eliminar este %s'), __('Destino'));

	return false;
}

function remove_destination_locale($destid, $lang)
{
	global $bcdb, $msg;
	
	$default = get_option('default_destination');
	if ( $bcdb->get_var("SELECT COUNT(*) FROM $bcdb->destination_locale WHERE destid = '$default'") == 1 ) {
		$msg = sprintf(__('No puedes eliminar este %s'), __('Destino'));
		return  false;
	}

	$res = $bcdb->query("
			DELETE FROM $bcdb->destination_locale
			WHERE destid = '$destid' AND lang_code = '$lang'");

	$bcdb->query("DELETE FROM $bcdb->destination
			WHERE destid = '$destid' AND
			NOT EXISTS (SELECT destid
					FROM $bcdb->destination_locale
					WHERE destid = '$destid')");
	return $res;
}

function get_destinations($fields = 'basic', $orderby = null, $limit = false) {
	global $bcdb, $bcrs, $pager, $lang;

	$all = $fields != 'full' && $fields != 'full-desc';
	switch ($fields) {
		case 'full-desc':
			$fields = 'd.*, dl.lang_code, dl.description';
			break;
		default:
			$fields = 'd.*';	
	}
	$orderby = preg_replace('/^ORDER\s+BY/i', '', trim($orderby));
	if ( empty($orderby) ) {
		$orderby = 'name ASC';
	}
	
	if ( $all ) {
		$sql = "SELECT $fields
			FROM $bcdb->destination d
			ORDER BY name ASC";
	} else {
		$sql = "SELECT 	DISTINCT $fields
			FROM 	$bcdb->destination d JOIN $bcdb->destination_locale dl
				ON	d.destid = dl.destid, $bcdb->tour_locale tl, $bcdb->tour t
			WHERE t.tourid = tl.tourid AND tl.lang_code = dl.lang_code
				AND tl.lang_code = '$lang'
				AND FIND_IN_SET( d.destid, t.destid )
				ORDER BY $orderby";
	}
	
	if ( !empty($limit) ) {
		$sql .= ' LIMIT ' . (int)abs($limit);
		return $bcdb->get_results($sql);
	}

	return ($pager) ? $bcrs->get_results($sql) : $bcdb->get_results($sql);
}

function get_destination_name($destid) {
	global $bcdb;
	return $bcdb->get_var("SELECT name
						FROM $bcdb->destination
						WHERE destid = $destid");
}

function get_destination_link($destid) {
	global $bcdb;
	return $bcdb->get_var("SELECT link
						FROM $bcdb->destination
						WHERE destid = $destid");
}

function get_destinations_for_tour($destid) {
	global $bcdb, $lang;	
	
	$destid = preg_replace('/[^\d,]/', '', $destid);
	if (empty($destid))
		return false;		
	/*Fix me: Sql Injection?*/
	return $bcdb->get_results("
		SELECT 	d.destid, name, link, lang_code, description
		FROM 	$bcdb->destination d LEFT JOIN $bcdb->destination_locale dl
		ON 		d.destid = dl.destid AND
				lang_code = '$lang'
		WHERE	d.destid IN ($destid)");
}

function get_destination_by_link($link) {
	global $bcdb;
	return $bcdb->get_var("SELECT destid FROM $bcdb->destination WHERE link = '$link'");
}

function get_random_destinations($limit = 10) {
	global $bcdb, $lang;
	
	return get_destinations('full', 'RAND()', $limit);
}

function get_destinations_filled_langs($destid) {
	global $bcdb, $lang, $active_langs;
	$i = 0;

	$results = $bcdb->get_results("SELECT lang_code FROM $bcdb->destination_locale WHERE destid = '$destid'");

	return get_filled_langs($results);
}

function get_destination_pictures ($destid, $limit = 3) {
	global $bcdb;
	
	$limit = (int)abs($limit);
	$destid = (int)$destid;
	
	$sql = "SELECT p.* 
		FROM 	$bcdb->picture p, $bcdb->tour t
		WHERE 	FIND_IN_SET( $destid, t.destid ) AND
				FIND_IN_SET( p.picid, t.picid )
		ORDER BY RAND()
		LIMIT 	$limit";
	
	if ( $limit == 1 ) {
		return $bcdb->get_row($sql);
	}
	return $bcdb->get_results($sql);
}

?>
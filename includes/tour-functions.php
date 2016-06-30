<?php

// TODO: We need to add lodges & prices
function save_tour($tourid, $tour_values, $tour_locale) {
	global $bcdb, $msg;
	
	if (isset($tour_locale['link'])) {
		$tour_locale['link'] = get_correct_link($tour_locale['link'], $bcdb->tour_locale, false, "tourid != '$tourid'");

		if (empty($tour_locale['link'])) {
			$msg = __('Datos no válidos, por favor ingrese un valor adecuado a los campos requeridos');
			return false;
		}
	}	

	if ( 	($query = insert_update_query($bcdb->tour, $tour_values)) !== false &&
			$bcdb->query($query) ) {

		if ( empty($tourid))
			$tourid = $bcdb->insert_id;
			
		$msg = ''; // Just to be sure
		$success = upload_pdfs($tourid);
		
		$tour_locale['tourid'] = $tourid;
		
		fix_tour_relations($bcdb->picture, $tourid, $tour_values['picid']);
		fix_tour_relations($bcdb->destination, $tourid, $tour_values['destid']);
		
		// Save locale
		if ( 	($query = insert_update_query($bcdb->tour_locale, $tour_locale )) !== false &&
				$bcdb->query($query) ) {				
				if (empty($msg))
					$msg = __('Los datos han sido guardados satisfactoriamente');

				return $tourid;
		}
	}
	$msg = sprintf(__('Hubo un problema al intentar guardar un nuevo %s'), __('Tour'));

	return false;
}

// Lame function to fix tour->picture and tour->destination relations
function fix_tour_relations(& $table, $tourid, $array_ids = null) {
	global $bcdb;
	
	if ( $table == $bcdb->picture ) {
		$field = 'picid';
	}
	else {
		$table = $bcdb->destination;
		$field = 'destid';
	}
	if (!is_array($array_ids)) {
		$array_ids = trim($array_ids);
	}
	
	if (empty($array_ids)) {
		$array_ids = $bcdb->get_var("SELECT $field FROM $bcdb->tour WHERE tourid = '$tourid'");
	}
	
	if ( !empty($array_ids) ) {
		$old = array_map('intval', is_array($array_ids) ? $array_ids : explode(',', $array_ids));
		sort($old);
		$current = $bcdb->get_col("SELECT $field FROM $table WHERE $field IN (" . join(',', $old) . ") ORDER BY $field ASC");
		$current = array_intersect($old, $current);
		return update_query($bcdb->tour, array($field => join(',', $current)), "tourid = '$tourid'", true);
	}
	
	return false;
}

function get_tour($tourid, $lang) {
	global $bcdb;
	if (empty($tourid))
		return false;
		
	$where = "t.tourid = '$tourid'";
	if ( ! is_numeric($tourid) ) 
		$where = "tl.link = '$tourid'";
		
	return $bcdb->get_row("
			SELECT 	t.*, tl.lang_code, tl.name, tl.resume,
					tl.itinerary, tl.include, tl.notinclude, 
					tl.notes, tl.link
			FROM 	$bcdb->tour t LEFT JOIN $bcdb->tour_locale tl
			ON		t.tourid = tl.tourid AND lang_code = '$lang'
			WHERE 	$where");
}

function tour_search_clause($fields = '*', $what, $lang, $where = '', $limit = '') {
	global $bcdb;
	
	return "SELECT 	$fields,
					MATCH (name, resume, itinerary, include, notinclude, notes) 
						AGAINST ('$what' IN BOOLEAN MODE) as hits
			FROM 	$bcdb->tour_locale tl, $bcdb->tour t
			WHERE 	tl.tourid = t.tourid AND
					lang_code = '$lang' AND					
					MATCH (name, resume, itinerary, include, notinclude, notes) 
						AGAINST ('$what' IN BOOLEAN MODE)
					$where
			
			ORDER BY hits DESC";
}

function search_tours($what, $lang) {
	global $bcdb, $bcrs;	
	
	$what = $bcdb->escape($what);
	$query = tour_search_clause(
		get_tour_fields('basic'), 
		$what, 
		$lang);

	return $bcrs->get_results($query);
}

function get_tour_price($tourid) {
	global $bcdb;
	$price = $bcdb->get_var("SELECT price FROM $bcdb->tour WHERE tourid = '$tourid'");
	return number_format($price, '2', '.', ',');
}

function get_tour_locale($tourid, $lang_code) {
	global $bcdb;
	return $bcdb->get_row("SELECT * FROM $bcdb->tour_locale WHERE tourid = '$tourid' AND lang_code = '$lang_code'");
}

function get_tour_name_locale($tourid, $lang_code) {
	global $bcdb;
	return $bcdb->get_var("SELECT name FROM $bcdb->tour_locale WHERE tourid = '$tourid' AND lang_code = '$lang_code'");
}

function get_tour_fields($fields = null) {
	$fields = trim(strtolower($fields));
	
	if (empty($fields)) {
		$fields = 'basic';
	}
	
	switch ($fields) {		
		case 'all':
			$fields = 't.*, tl.name, tl.resume, tl.link, 
				tl.itinerary, tl.include, tl.notinclude, tl.notes,
				tl.picid';
			break;
		case 'basic':
			$fields = 't.tourid, tl.name, tl.link, tl.resume, destid, typeid, picid';
			break;
		case 'pop':
			$fields = 't.tourid, tl.name, tl.link, visit_count, comment_count, picid';
			break;
	}
	return $fields;
}

function get_tours($where = '', $fields = null, $orderby = 'show_order DESC, tourid DESC', $limit = false) {
	global $bcdb, $bcrs, $pager, $lang;
	
	$fields = get_tour_fields($fields);
	
	if ( !empty($where) && ! preg_match('/^\s*AND|OR\s+/i', $where) ) {
		$where = 'AND (' . $where . ')';
	}
			
	$sql = "SELECT 	$fields
			FROM 	$bcdb->tour t, $bcdb->tour_locale tl
			WHERE 	t.tourid = tl.tourid AND lang_code = '$lang'
					$where
			ORDER BY $orderby";
	
	if ($limit && is_int($limit)) {
		$sql .= " LIMIT $limit";
	
		// Don't need pagination
		return $bcdb->get_results($sql);
	}

	return ($pager) ? $bcrs->get_results($sql) : $bcdb->get_results($sql);
}

function get_resumed_tours() {
	global $bcdb, $bcrs, $pager, $lang;
	$sql = "SELECT tourid, lang_code, name, resume, link 
			FROM $bcdb->tour_locale 
			WHERE lang_code = '$lang' ORDER BY tourid DESC";
	
	return ($pager) ? $bcrs->get_results($sql) : $bcdb->get_results($sql);
}

function get_related_tours($tourid, $title, $limit = 5) {
	global $bcdb, $lang;	
	
	$query = tour_search_clause(
		get_tour_fields('basic'), 
		$title, 
		$lang,
		" AND t.tourid != '$tourid'");

	return $bcdb->get_results($query . " LIMIT $limit");
}

function get_resumed_tour($tourid) {
	global $bcdb, $bcrs, $lang;
	$sql = "SELECT tourid, lang_code, name, resume, link 
			FROM $bcdb->tour_locale 
			WHERE lang_code = '$lang' AND tourid = '$tourid'";	
	return $bcdb->get_row($sql);
}

function get_tours_filled_langs($lang = null, $order = 't.tourid DESC') {
	global $bcdb, $bcrs, $pager;

	if (empty($lang)) {
		$lang = get_default_lang();
	}
	if ( !empty($order) && preg_match('|(\s*ORDER\s*BY\s*)?(.*)|', $order, $match) ) {
		$order = ' ORDER BY ' . $match[2];
	}
	
	$sql = "SELECT t.*, tl.name
			FROM $bcdb->tour t LEFT JOIN $bcdb->tour_locale tl
			ON	t.tourid = tl.tourid AND lang_code = '$lang'			
			$order";
	
	$tours = ($pager) ? $bcrs->get_results($sql) : $bcdb->get_results($sql);
	
	if ($tours) {
		foreach ($tours as $k => $v) {
			$tours[$k]['langs'] = get_tour_available_langs($v['tourid']);			
		}
	}
	return $tours;
}

function get_tour_available_langs($tourid) {
	global $bcdb;
	
	$results = $bcdb->get_results("SELECT lang_code FROM $bcdb->tour_locale WHERE tourid = '$tourid'");
	
	return get_filled_langs($results);
}

function remove_tour ($tourid) {
	global $bcdb;
	
	delete_pdf($tourid);
	//$bcdb->query("DELETE FROM $bcdb->lodges WHERE tourid = '$tourid'");
	$bcdb->query("DELETE FROM $bcdb->tour_locale WHERE tourid = '$tourid'");
	$bcdb->query("DELETE FROM $bcdb->tour WHERE tourid = '$tourid'");
}

function remove_tour_locale ($tourid, $lang) {
	global $bcdb, $msg;
	
	delete_pdf($tourid . '-' . $lang);
	$res = $bcdb->query("
			DELETE FROM $bcdb->tour_locale
			WHERE tourid = '$tourid' AND lang_code = '$lang'");
	// Eliminar los 'residuos'
	$bcdb->query("DELETE FROM $bcdb->tour
		WHERE tourid = '$tourid' AND
		NOT EXISTS (SELECT tourid
				FROM $bcdb->tour_locale
				WHERE tourid = '$tourid')");
	return $res;
}

function get_tour_in_other_langs() {
	global $bcdb, $lang, $id;
	
	$results = $bcdb->get_results("SELECT * FROM $bcdb->tour_locale WHERE tourid = '$id' AND lang_code != '$lang'");
	$i = 0;
	if($results) {
		foreach ($results as $k => $v) {
			$other_langs[$i]["lang_code"] = $v['lang_code'];
			$other_langs[$i]["lang_name"] = get_language_name($v['lang_code']);
			$other_langs[$i]["name"] = $v['name'];
			$i++;
		}
	}
	return (isset($other_langs)) ? $other_langs : false;
}

function complete_fields( & $tour ) {
	global $lang;
	
	$tour['destinations'] = get_destinations_for_tour($tour['destid']);
	$tour['tourtype'] = get_tourtype($tour['typeid'], $lang);
	$tour['pictures'] = get_pictures(false, $tour['picid']);
	$tour['price'] = get_tour_price($tour['tourid']);
	return $tour;
}

function get_tour_by_link($link) {
	global $bcdb;

	return $bcdb->get_var("SELECT tourid FROM $bcdb->tour_locale WHERE link = '$link'");	
}

// Shame for this!! due to database structure
function get_tours_by_destination ($destid) {
	global $bcdb, $bcrs, $pager, $lang;
	
	if ( ! ($destid = intval($destid)) )
		return array();
	
	return get_tours(" AND FIND_IN_SET($destid, destid)");
}

function get_tours_by_tourtype ($typeid) {
	global $bcdb, $bcrs, $pager, $lang;
	
	return get_tours(" AND typeid = '$typeid'", 'basic');
}

function update_comment_count( $tourid, $lang ) {
	global $bcdb;
	
	$where = "WHERE tourid = '$tourid' AND lang_code = '$lang'";
	$count = $bcdb->get_var("SELECT count(*) FROM $bcdb->comment $where");
	return $bcdb->query("UPDATE $bcdb->tour_locale SET comment_count = $count $where");
}
function update_visit( $tourid ) {
	global $bcdb, $lang;
	
	if ( empty($lang) || empty($tourid)) {
		return false;
	}
	
	$params = array('tourid' => $tourid, 'ip' => get_ip(), 'date' => date('Y-m-d'), 'lang_code' => $lang);
	
	if ( $bcdb->get_var("SELECT count(*) 
		FROM 	$bcdb->visits 
		WHERE 	tourid = '$tourid' AND ip = '$params[ip]' AND 
				`date`='$params[date]' AND lang_code = '$params[lang_code]'") )
	{
		return false;
	}
	
	if ( ($insert = insert_query($bcdb->visits, $params)) !== false &&
		$bcdb->query($insert)) {
			
		return $bcdb->query("UPDATE $bcdb->tour_locale SET visit_count = visit_count + 1 WHERE tourid = '$tourid' AND lang_code = '$params[lang_code]'");
	}
}

function reserve_tour($reserve_values) {
	global $bcdb;
	if ( ( $params = process_params_for_insert ( $reserve_values ) ) !== false ) {
		$bcdb->query("INSERT INTO $bcdb->reserve($params[fields]) VALUES ($params[values])");
		return $bcdb->insert_id;
	}
	return false;	
}

function set_reserve_status($reserveid, $status = 0) {
	global $bcdb;
	
	$reserveid = intval($reserveid);
	return $bcdb->query("UPDATE $bcdb->reserve SET status = $status WHERE reserveid = $reserveid");
}


function get_reserves() {
	global $bcdb, $bcrs, $pager;
	
	$sql = "SELECT 	r.reserveid, r.tourid, r.name, r.email, r.status, r.freserve, r.lang_code,
					r.userid, tl.name as tourname, c.country_name as country, u.name as username
			FROM	$bcdb->reserve r
				JOIN $bcdb->tour_locale tl ON r.tourid = tl.tourid AND tl.lang_code = r.lang_code
				LEFT JOIN $bcdb->user u ON r.userid = u.userid
				JOIN $bcdb->country c ON c.country_code=r.country
			ORDER BY freserve DESC";
		
	$results = ($pager) ? $bcrs->get_results($sql) : $bcdb->get_results($sql);
	
	if ($results) {
		foreach ($results as $k => $v) {
			if ($v['status'] == 1) {
				$results[$k]['status_desc'] = __('En preventa');
				$results[$k]['css_class'] = 'presell';
			}
			elseif ($v['status'] == 2) {
				$results[$k]['status_desc'] = __('Operado');
				$results[$k]['css_class'] = 'operated';
			}
			else {
				$results[$k]['status_desc'] = __('Pendiente');
				$results[$k]['css_class'] = 'pending';
			}
		}
	}
	return $results;
}

function get_reserve($reservid) {
	global $bcdb;
	return $bcdb->get_row("SELECT * FROM $bcdb->reserve WHERE reserveid = '$reservid'");
}

function remove_reserve($reserveid) {
	global $bcdb;
	
	if ( $bcdb->query("DELETE FROM $bcdb->reserve WHERE reserveid = '$reserveid'") &&
		$bcdb->query("DELETE FROM $bcdb->presell WHERE reserveid = '$reserveid'") ) {
		return true;	
	}
	return false;
}

function update_lodge_prices($lodge_prices, $tourid) {
	global $bcdb;
	foreach ($lodge_prices as $k => $v){
		$keys = array_keys($v);
		$sql = "UPDATE $bcdb->lodges 
				SET " . $keys[0] . " = '" . $v[$keys[0]] . "', " . $keys[1] . " = '" . $v[$keys[1]] . "' , " . $keys[2] . " = '" . $v[$keys[2]] . "' 
				WHERE tourid = '$tourid'";
		$bcdb->query($sql);
	}
}

function get_lodge_prices($tourid) {
	global $bcdb;
	return $bcdb->get_row("SELECT * FROM $bcdb->lodges WHERE tourid = '$tourid'");
}

function get_price_lodge($tourid, $price) {
	global $bcdb;
	return $bcdb->get_var("SELECT $price FROM $bcdb->lodges WHERE $tourid = '$tourid'");
}

function get_lodge_details($wprice, $tourid) {
	// This sucks!!!
	
	$lodge_details = array();
	switch($wprice) {
		case "price1":
			$lodge_details['lname'] = 'Sin Hotel';
			$lodge_details['lprice'] = get_tour_price($tourid);
		break;
		case "price2":
			$lodge_details['lname'] = 'Hotel 2 Estrellas';
			$lodge_details['lprice'] = get_price_lodge($tourid, 'price2');
		break;
		case "price3":
			$lodge_details['lname'] = 'Hotel 3 Estrellas';
			$lodge_details['lprice'] = get_price_lodge($tourid, 'price3');
		break;
		case "price4":
			$lodge_details['lname'] = 'Hotel 4 Estrellas';
			$lodge_details['lprice'] = get_price_lodge($tourid, 'price4');
		break;
		case "price5":
			$lodge_details['lname'] = 'Hotel 5 Estrellas';
			$lodge_details['lprice'] = get_price_lodge($tourid, 'price5');
		break;
	}
	
	if ( !empty($_POST['total']) )
		$lodge_details['lprice'] = abs($_POST['total']);

	return $lodge_details;
}

function upload_pdfs ($id, $upload_dir = PDFS_DIR) {
	global $msg;
	
	if ( !empty($_FILES) && ! is_writable($upload_dir) )
	{
		$msg = sprintf(__('No se puede guardar el archivo en \'%s\' por falta de permisos'), $upload_dir);
		return false;
	}
	
	if (!empty($_FILES)) {	
		$archivos = array();
		$msg = '<ul>';
		foreach ($_FILES as $k => $file) {
			if ($file["error"] == UPLOAD_ERR_OK) {
				$type = $file['type'];
				if($type == 'application/pdf') {
					$lang = explode('_', $k);
					$lang = $lang[1];
					$tmp_name = $file["tmp_name"];
					$name = str_replace('pdf', '', sanitize_title_with_dashes($file['name']));
					$normalname = "$id-$lang-$name.pdf";
					if (move_uploaded_file($tmp_name, $upload_dir . $normalname))
						$archivos[] = $name;
				} else  {
					$msg .= '<li>' . sprintf(__('Tipo de archivo no permitido: %s'), $file['name']) . '</li>';
					continue;					
				}
			}elseif (!empty($file['name'])) {
				$msg .= '<li>' . sprintf(__('Error al subir: %s'), $file['name']) . '</li>';
				continue;			
			}
		}
		$msg .= '</ul>';
		if ($msg != '<ul></ul>') // Fix me
			return false;
		else 
			$msg = null;
			
		return count($archivos) > 0 ? $archivos : false;
	}
	return false;
}

function get_pdfs ($tourid, $dir = PDFS_DIR) {
	global $active_langs;
	
	$filenames = array();
	$dir = str_replace('//', '/', $dir . '/');
	$pdfs = join('--||--', glob($dir . $tourid . '-*'));
	foreach ($active_langs as $k => $v) {
		$file = '';
		if (preg_match("/($tourid-$k-.*?\.pdf)/i", $pdfs, $match))
			$file = $match[1];
		$filenames[] = array('lang' => $k, 'file' => $file, 'lang_name' => $v['lang_name']);
	}
	return $filenames;
}

function get_pdfs_by_lang ($tourid, $lang, $dir = PDFS_DIR) {
	$dir = str_replace('//', '/', $dir . '/' .$tourid . '-' . $lang . '*');
	$files = glob($dir);
	
	$filenames = array();
	foreach ($files as $v) {
		$filenames[] = array('file' => basename($v));
	}
	return $filenames;		
}

function delete_pdf($pdf, $dir = PDFS_DIR) {	
	$dir = str_replace('//', '/', $dir . '/' .$pdf . '*');
	$files = glob($dir);

	$return = true;
	foreach ($files as $v) {
		
		$return &= unlink($v);
	}
	return $return;
}

?>
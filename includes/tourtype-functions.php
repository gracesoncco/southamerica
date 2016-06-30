<?php

function get_tourtype($typeid, $lang) {
	global $bcdb;

	return $bcdb->get_row("
		SELECT 	tt.typeid, name, link, lang_code
		FROM 	$bcdb->tourtype tt LEFT JOIN $bcdb->tourtype_locale ttl
		ON 		tt.typeid = ttl.typeid AND
				lang_code = '$lang'
		WHERE	tt.typeid = '$typeid' OR link = '$typeid'");
}

function get_tourtype_locale($typeid, $lang_code) {
	global $bcdb;
	return $bcdb->get_row("SELECT * FROM $bcdb->tourtype_locale WHERE typeid = '$typeid' AND lang_code = '$lang_code'");
}

function save_tourtype($typeid, $lang, $tourtype_values) {
	global $bcdb, $msg;

	if (isset($tourtype_values['link'])) {
		$tourtype_values['link'] =
			get_correct_link($tourtype_values, $bcdb->tourtype_locale, false, "typeid != '$typeid' AND lang_code != '$lang'");
		
		if (empty($tourtype_values['link'])) {
			$msg = __('Datos no válidos, por favor ingrese un valor adecuado a los campos requeridos');
			return false;
		}
	}
	
	if ($typeid == 0 && $bcdb->query("INSERT INTO $bcdb->tourtype VALUES (DEFAULT)"))
		$typeid = $bcdb->insert_id;
	elseif ( ! get_tourtype($typeid, $lang) )
	{
		$msg = sprintf(__('Error. %s desconocido'), __('Tipo'));
		return false;
	}	
	
	$tourtype_values['typeid'] = $typeid;

	if ( ( $query = insert_update_query( $bcdb->tourtype_locale, $tourtype_values ) ) !== false && 
			$bcdb->query($query) ) {
		$msg = __('Los datos han sido guardados satisfactoriamente');
		return $typeid;
	}
	$msg = sprintf(__('Hubo un problema al intentar guardar un nuevo %s'), __('Tipo'));
	return  false;
}

function get_tourtypes($lang = NULL, $include_nulls = true) {
	global $bcdb, $bcrs, $pager;

	if ( is_admin() ) {
		if (empty($lang)) {
			$lang = get_option('default_lang');
		}
		$where = '';
		if (!$include_nulls) {
			$where = ' WHERE ttl.name IS NOT NULL';
		}
		$sql = "SELECT tt.typeid, ttl.name, ttl.link 
				FROM $bcdb->tourtype tt LEFT JOIN $bcdb->tourtype_locale ttl
				ON tt.typeid = ttl.typeid AND ttl.lang_code = '$lang'
				$where";
	}
	else {
		$sql = "SELECT DISTINCT ttl.* 
			FROM $bcdb->tourtype_locale ttl, $bcdb->tour t, $bcdb->tour_locale tl
			WHERE ttl.lang_code = '$lang' AND ttl.typeid = t.typeid AND
					tl.tourid = t.tourid AND tl.lang_code = '$lang'";
	}
	
	return ($pager) ? $bcrs->get_results($sql) : $bcdb->get_results($sql);
}

function remove_tourtype ($typeid) {
	global $bcdb, $msg;
	// TODO
	$default = get_option('default_type');
	if ($default == $typeid) {
		$msg = sprintf(__('No puedes eliminar este %s'), __('Tipo'));
		return false;
	}
	if ( !$default ) {
		$default = $bcdb->get_var("SELECT typeid FROM $bcdb->tourtype LIMIT 1");
	}
	$bcdb->query("DELETE FROM $bcdb->tourtype_locale WHERE typeid = '$typeid'");
	$bcdb->query("DELETE FROM $bcdb->tourtype WHERE typeid = '$typeid'");
	$bcdb->query("UPDATE $bcdb->tour SET typeid = '$default' WHERE typeid = '$typeid'");
}

function remove_tourtype_locale ($typeid, $lang) {
	global $bcdb, $msg;

	$default = get_option('default_type');	
	
	if ($default == $typeid && $bcdb->get_var("SELECT COUNT(*) FROM $bcdb->tourtype_locale WHERE typeid = '$default'") == 1 ) {
		$msg = sprintf(__('No puedes eliminar este %s'), __('Tipo'));
		return  false;
	}

	$res = $bcdb->query("
			DELETE FROM $bcdb->tourtype_locale
			WHERE typeid = '$typeid' AND lang_code = '$lang'");
	// Eliminar los 'residuos'
	$bcdb->query("DELETE FROM $bcdb->tourtype
		WHERE typeid = '$typeid' AND
		NOT EXISTS (SELECT typeid
				FROM $bcdb->tourtype_locale
				WHERE typeid = '$typeid')");
	return $res;
}

function get_tourtype_filled_langs($typeid) {
	global $bcdb, $lang;

	$results = $bcdb->get_results("SELECT lang_code FROM $bcdb->tourtype_locale WHERE typeid = '$typeid'");

	return get_filled_langs($results);
}

function get_tourtype_by_link ($link) {
	global $bcdb, $lang;
	return $bcdb->get_var("SELECT typeid FROM $bcdb->tourtype_locale WHERE link = '$link' AND lang_code='$lang'");
}

?>
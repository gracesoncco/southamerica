<?php

function save_presell($presell_values ) {
	global $bcdb;
	
	if ( ( $query = insert_update_query( $bcdb->presell, $presell_values ) ) !== false ) {
		$bcdb->query($query);
		return $bcdb->insert_id;
	}
	return false;	
}

function get_presell ($presellid) {
	global $bcdb;
	return $bcdb->get_row("SELECT * FROM $bcdb->presell WHERE presellid = '$presellid'");
}

function get_presells() {
	global $bcdb, $bcrs, $pager;
	$sql = "SELECT * FROM $bcdb->presell ORDER BY presellid DESC";
	$results = ($pager) ? $bcrs->get_results($sql) : $bcdb->get_results($sql);

	if ($results) {
		foreach ($results as $k => $v) {
			if ($v['status'] == 1) {
				$results[$k]['status_desc'] = __('En proceso de pago');
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

function get_presell_by_reservecod($reservecod) {
	global $bcdb;
	return $bcdb->get_row("SELECT * FROM $bcdb->presell WHERE reservecod = '$reservecod'");
}

function remove_presell($presellid) {
	global $bcdb;
	$presellid = intval($presellid);
	return $bcdb->query("DELETE FROM $bcdb->presell WHERE presellid = '$presellid'");
}

?>
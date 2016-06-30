<?php

function smarty_function_form_token($params, &$smarty)
{
	static $action = -1, $html = true;
	
	if ( !empty($params['action']) ) {
		$action = (string)$params['action'];
	}
	$type = 'html';
	if ( !empty($params['type']) && $params['type'] == 'url' ) {
		$type = 'url';
	}
	$token = wp_create_nonce($action);
	
	if ($type == 'url') {
		return '_token=' . $token;
	}
	else {
		return sprintf('<input type="hidden" name="_token" id="_token" value="%s" />', $token);
	}
	return $token;
}

/* vim: set expandtab: */

?>

<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


function smarty_function_rewrite_link($params, &$smarty)
{	
	global $bcdb, $lang;
	
	if (empty($params['lang'])) {
		if (!empty($lang)) {
			$params['lang'] = $lang;
		}
		else  {
			$params['lang'] = get_default_lang();
		}
	}
	$url = '#';
	if (!empty( $params['data'] ) && !empty( $params['func'] ) && function_exists($params['func']))
		$url = call_user_func_array($params['func'], array(&$params['data'], &$params['lang']));

	return $url;
}

/* vim: set expandtab: */

?>

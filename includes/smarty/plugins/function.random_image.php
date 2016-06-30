<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


function smarty_function_random_image($params, &$smarty)
{	
	global $bcdb, $lang;	
	
	if ( !empty($params['pic']['picname']) && !empty($params['pic']['name']) )  {
		$pic = $params['pic'];
	} else {
		if ( !empty($params['picid']) ) {
			$params['pics'] = explode(',', (string)$params['picid']);		
		} elseif ( !empty($params['tourid']) ) {
				$params['pics'] = get_pictures(false, (int)$params['tourid']);
		}
		
		if ( empty( $params['pics'] ) || !is_array( $params['pics'] ) )
				return '';
				
		$index = array_rand($params['pics']);
		
		if ( !empty($params['picid']) ) {		
			$pic = get_picture($params['pics'][$index]);
		} else {
			$pic = $params['pics'][$index];
		}
	}
	
	if ( empty($pic) || !is_array($pic) ) {		
		return '';
	}
	
	$img = 	' src="' . PICS_URL . 'thumb_' . $pic['picname'] . 
			'" alt="' . $pic['name'] . '"' .
			' title = "' . $pic['name'] . '"';
			
	if ( !empty( $params['class'] ) )
		$img .= ' class="' . $params['class'] . '"';

	if ( !empty( $params['no_tag'] ) )
		return $img;

	return "<img $img />";
}

/* vim: set expandtab: */

?>

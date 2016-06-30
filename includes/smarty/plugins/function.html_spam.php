<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty {html_image} function plugin
 *
 * Type:     function<br>
 * Name:     html_image<br>
 * Date:     Feb 24, 2003<br>
 * Purpose:  format HTML tags for the image<br>
 * Input:<br>
 *         - file = file (and path) of image (required)
 *         - height = image height (optional, default actual height)
 *         - width = image width (optional, default actual width)
 *         - basedir = base directory for absolute paths, default
 *                     is environment variable DOCUMENT_ROOT
 *
 * Examples: {html_image file="images/masthead.gif"}
 * Output:   <img src="images/masthead.gif" width=400 height=23>
 * @link http://smarty.php.net/manual/en/language.function.html.image.php {html_image}
 *      (Smarty online manual)
 * @author   Monte Ohrt <monte at ohrt dot com>
 * @author credits to Duda <duda@big.hu> - wrote first image function
 *           in repository, helped with lots of functionality
 * @version  1.0
 * @param array
 * @param Smarty
 * @return string
 * @uses smarty_function_escape_special_chars()
 */
function smarty_function_html_spam($params, &$smarty)
{
	global $bcdb;
	
	$spam_control = get_option('spam_control');
	
	$ts_random = rand();
	$image_url = BASE_URL . 'ts_image.php?ts_random=' . $ts_random;
	$label = __('Please enter the code from the image in the field below');
	$output = '';	
	if ( $spam_control == 'captcha' ) {
		$output = <<<END
		<label for="ts_code" class="noblock">{$label}</label><br />
		<input type="text" name="ts_code" id="ts_code" />
		<input type="hidden" name="ts_random" id="ts_random" value="{$ts_random}" />
		<img src="{$image_url}" />
END;
	}
	return $output;
}

/* vim: set expandtab: */

?>

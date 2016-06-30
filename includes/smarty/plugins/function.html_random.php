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
function smarty_function_html_random($params, &$smarty)
{
	global $site_key;
	
	$time = substr(md5(time()), rand(0, 27), rand(1, 12));
	$md5 = md5($site_key . $_SERVER['SERVER_ADDR'] . $time);
	
	$md5 = substr($md5, 0, 3) . dechex(strlen($time)) . $time . substr($md5, 3);
	$html = <<<END
	<input type="hidden" name="randkey" id="randkey" value="{$md5}" />
END;
	
	return $html;
}

/* vim: set expandtab: */

?>

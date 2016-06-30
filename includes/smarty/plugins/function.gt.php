<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty {gettext} function plugin
 *
 * Type:     function<br>
 * Name:     gt<br>
 * Date:     May 21, 2002
 * Purpose:  Translate from .mo file using gettext
  * Input:<br>
  *         - s = String to translate
  *
 * Examples:
 * <pre>
 * {gt s="View site"}
 * </pre>
 * @link http://www.buayacorp.com/
 *          (None)
 * @version  0.1
 * @author   Braulio Soncco <braulio at buayacorp dot com>
 * @param    array
 * @param    Smarty
 * @return   string
 */
function smarty_function_gt($params, &$smarty)
{
    if (empty($params['s']) || !empty($smarty->required_fetch)) {
        $smarty->trigger_error("gt: missing 's' parameter");
        return;
    } else {
        $s = $params['s'];
    }    

    return __($s);
}

/* vim: set expandtab: */

?>
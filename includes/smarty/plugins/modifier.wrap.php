<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

function smarty_modifier_wrap($text)
{	
	$id = rand(1, 10000);
	$text = strip_tags($text);
	$hide = __('Hide');
	$url = preg_replace('/\?.*$/', '', $_SERVER['REQUEST_URI']);
	return <<<DIV
<div id="message-{$id}" class="updated fade">
	<p>
		<strong>{$text}<strong>
		[<a href="$url" onclick="document.getElementById('message-$id').style.display = 'none';return false;">{$hide}</a>]
	</p>
</div>	
DIV;
}

/* vim: set expandtab: */

?>
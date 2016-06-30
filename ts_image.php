<?php
	# Generates the same
	include dirname(__FILE__) . '/config.php';
	include INCLUDE_PATH . 'ts.php';
	
	if (empty($_GET['ts_random']))
		die('!');
	ts_gfx($_GET['ts_random']);
?>

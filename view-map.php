<?php
	require_once('init.php');
	
	$pic = empty($_GET['pic']) ? '' : preg_replace('/[^a-z0-9_.]/i', '', $_GET['pic']);
	
	if ( empty($pic) || !file_exists(PICS_DIR . 'normal_' . $pic) ) {
		safe_redirect(BASE_URL);
	}	
	$m = getimagesize(PICS_DIR. "normal_" . $pic);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo __('Map') ?></title>
	<style type="text/css">
		body {
			margin: 0;
			padding: 0;
		}
		
		img {border: 0;}
		
		#footer {
			font: 90%/1.5em Arial;
			padding: 4px;
			text-align: center;
			background: #FFF6D3;
		}
	</style>
	<script type="text/javascript">
		window.onload = function () {
			window.resizeTo (<?php echo $m[0]; ?>,<?php echo ($m[1]+30); ?>);
		}
	</script>
</head>
<body>
<div id="imagen">
	<a href="#" onclick="self.close();"><img src="<?php echo PICS_URL . "normal_" . $pic ?>" alt="<?php __('Map') ?>" /></a>
</div>
<div id="footer">
	<a href="#" onclick="self.close();"><?php echo __('Close') ?></a>
</div>
</body>
</html>
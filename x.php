<?php
require_once('home.php');
if(isset($_GET['paid']) && !isset($_SESSION['loginuser'])) {
	$refuser = @get_user((int)$_GET['paid']);
	if($refuser) $_SESSION['referuser'] = $refuser;
}
safe_redirect(BASE_URL);
?>
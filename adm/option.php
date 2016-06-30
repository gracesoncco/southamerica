<?php

require_once('admin.php');

$action = ! empty($_REQUEST['action']) ? strtolower( $_REQUEST['action'] ) : '';

$spam_methods = array(
	'none' => __('No controlar'),
	'moderate' => __('Moderar comentarios'),
	'captcha' => sprintf(__('Utilizar %s'), '<a href="http://es.wikipedia.org/wiki/Captcha">CAPTCHA</a>'),
	'akismet' => sprintf(__('Utilizar %s'), '<a href="http://akismet.com">Akismet</a>')
	);
	
if (!empty($_POST) && check_admin_referer('update-options')) {
	unset($_POST['save']);
	unset($_POST['_token']);
	
	$spam_control = array('none', 'moderate', 'captcha', 'akismet');
	if (empty($_POST['spam_control']))
		$_POST['spam_control'] = 'none';
	
	if ( ! in_array($_POST['spam_control'], array_keys($spam_methods)) ) {
		$_POST['spam_control'] = 'none';
	}
	
	if ($_POST['spam_control'] == 'akismet' && class_exists('Akismet'))
	{		
		$akismet = new Akismet(BASE_URL, $_POST['akismet_api']);
		if ( ! $akismet->verifyKey() ) {
			$msg = __('API no válido para Akismet, se desactivará el uso de este herramienta');
			$_POST['spam_control'] = 'none';
		}
		else 
			$_POST['spam_control'] = $_POST['akismet_api'];
	}
	
	unset($_POST['akismet_api']);
	$_POST['send_comment_notification'] = isset($_POST['send_comment_notification']);
	$_POST['send_book_notification'] = isset($_POST['send_book_notification']);
	$_POST['user_agent_language'] = isset($_POST['user_agent_language']);

	$_POST['spam_control'] = strtolower($_POST['spam_control']);
	
	if ( update_batch_options($_POST) && empty($msg) )
		$msg = __('Los datos han sido guardados satisfactoriamente');
	
}

$spam = get_spam_method();

$options = get_options();
$destinations = get_destinations();
$langs = get_active_langs();
$tourtypes = get_tourtypes();
$countries = get_countries();

$smarty->assign ('spam_methods', $spam_methods);
$smarty->assign ('spam', $spam);
$smarty->assign ('options', $options);
$smarty->assign ('langs', $langs);
$smarty->assign ('destinations', $destinations);
$smarty->assign ('tourtypes', $tourtypes);
$smarty->assign ('countries', $countries);
$smarty->assign ('file', 'adm/option.html');
$smarty->assign ('section_title', __('Opciones del Sitio'));
$smarty->assign ('js', true);
$smarty->assign ('cookiename', 'option');
$smarty->display ('adm/index.html');

?>
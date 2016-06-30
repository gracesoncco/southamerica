<?php
	require_once('../init.php');	

	$smarty->is_admin = true;
	$smarty->template_dir = INCLUDE_PATH . 'smarty/templates';
	
	if( !isset($_SESSION['loginuser']))  {
		safe_redirect(BASE_URL . 'login.php?r=' . $_SERVER['PHP_SELF']);
	}elseif ($_SESSION['loginuser']['usertype'] != 1) {
		safe_redirect(BASE_URL);
	}

	$smarty->assign('site_footer', get_option('site_footer'));
	$smarty->assign('cpanel', true);
	
	$has_tabs = false; // Muestra el listado o no
	
	$smarty->assign_by_ref('has_tabs', $has_tabs);		
	
	require_once dirname(__FILE__) . '/menu.php';
?>

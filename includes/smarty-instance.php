<?php
	
include_once (INCLUDE_PATH . 'smarty/Smarty.class.php'); 

class TawaSmarty extends Smarty {
	function TawaSmarty() {
		$this->__construct();
	}
	function __construct() {
		$this->template_dir = THEME_PATH . get_current_theme() . '/templates';
		$this->compile_dir = INCLUDE_PATH . "smarty/templates_c";
	}
	
	function fix_template_path($resource_name) {
		static $current_template, $default_template;
		
		if ( empty($this->is_admin) ) {		
			if ( empty($current_template) ) {
				$current_template = THEME_PATH . get_current_theme() . '/templates';
				$default_template = THEME_PATH . 'default/templates';
			}
			
			$this->template_dir = $current_template;
			if ( !$this->template_exists($resource_name) ) {
				$this->template_dir = $default_template;
			}
		}
		else {
			$smarty->template_dir = INCLUDE_PATH . 'smarty/templates';
		}
	}
	
	function clean_up() {
		$files = glob($this->compile_dir . '/*.php');
		foreach ($files as $v) {
			@unlink($v);
		}
	}
	
	function fetch($resource_name, $cache_id = null, $compile_id = null, $display = false)
	{
		$this->fix_template_path($resource_name);		
		return parent::fetch($resource_name, $cache_id, $compile_id, $display);		
	}
	function _smarty_include($params) {
		$this->fix_template_path($params['smarty_include_tpl_file']);
		parent::_smarty_include($params);
	}
}

$smarty = new TawaSmarty;

//$smarty = new Smarty;

$smarty->assign("baseurl", BASE_URL);
$smarty->assign("admurl", ADMIN_URL);

$smarty->assign('media_url', MEDIA_URL);
$smarty->assign('theme_url', get_current_theme_url());

$smarty->assign("picsurl", PICS_URL);
$smarty->assign("pdfsurl", PDFS_URL);

$_SERVER['PHP_SELF'] = htmlspecialchars(preg_replace('`(\.php).*$`', '$1', $_SERVER['PHP_SELF']), ENT_QUOTES, 'utf-8');
$smarty->assign("self", $_SERVER['PHP_SELF']);
	
?>
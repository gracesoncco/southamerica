<?php
define("BASE_PATH", dirname(__FILE__) . "/");
define("INCLUDE_PATH", BASE_PATH . "includes/");

// Load required functions
require_once INCLUDE_PATH . 'functions.php';

// Ruta
$site_path = '/';
define("BASE_URL", site_url());
define("ADMIN_URL", BASE_URL . "adm/");

define('MEDIA_URL', BASE_URL . 'media/');

define("PICS_URL", BASE_URL . "pictures/");
define("PICS_DIR", BASE_PATH . "pictures/");
define("PDFS_URL", BASE_URL . "pdf/");
define("PDFS_DIR", BASE_PATH . "pdf/");

/* Themes & File compilation */
define('THEME_PATH', BASE_PATH . 'themes/');
define('THEME_URL', BASE_URL . 'themes/');

define("LOCALE", INCLUDE_PATH . "locale/");
define("MAILER_PATH", INCLUDE_PATH . "phpmailer/");

define("CHARSET", "utf-8");
define("NUM_ITEMS", 8);
define('REWRITE_URL', true);

# Nivel de errores
error_reporting(E_ALL);
//error_reporting(0);

// Windows
setlocale(LC_TIME, 'esp_PER');
// Linux
//setlocale(LC_ALL, 'es_PE');

# Parámetros de la base de datos

$db_params = array(
		'db_host' => 'localhost',
		'db_name' => 'southamerica',
		'db_user' => 'root',
		'db_pass' => ''
	);
$mail_params = array();

$site_key = '0`@$_$@`0'; // change this
?>

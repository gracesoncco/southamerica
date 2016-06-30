<?php
include_once('config.php');

include_once(INCLUDE_PATH . 'ez_sql.php');
include_once(INCLUDE_PATH . 'template.php');

// Tablas
$table_prefix = "pg_";
$bcdb->country        = $table_prefix . 'country';
$bcdb->lang         = $table_prefix . 'lang';
$bcdb->option       = $table_prefix . 'option';
$bcdb->destination      = $table_prefix . 'destination';
$bcdb->destination_locale = $table_prefix . 'destination_locale';
$bcdb->user         = $table_prefix . 'user';
$bcdb->tourtype       = $table_prefix . 'tourtype';
$bcdb->tourtype_locale    = $table_prefix . 'tourtype_locale';
$bcdb->picture        = $table_prefix . 'picture';
$bcdb->tour         = $table_prefix . 'tour';
$bcdb->tour_locale      = $table_prefix . 'tour_locale';
$bcdb->reserve        = $table_prefix . 'reserve';
$bcdb->presell        = $table_prefix . 'presell';
$bcdb->lodges       = $table_prefix . 'lodges';
$bcdb->agencies       = $table_prefix . 'agencies';
$bcdb->comment        = $table_prefix . 'comment';
$bcdb->visits       = $table_prefix . 'visits';

include_once(INCLUDE_PATH . 'smarty-instance.php');

// Funciones independientes
include_once(INCLUDE_PATH . 'formatting-functions.php');
include_once(INCLUDE_PATH . 'pager.class.php');
include_once(INCLUDE_PATH . 'functions.php');

// Iniciamos
send_headers();

$lang = get_current_language();
$smarty->assign('lang', $lang);
$smarty->assign('default_lang', get_default_lang());

include_once(INCLUDE_PATH . 'translation.php');
include_once(INCLUDE_PATH . 'picture-functions.php');
include_once(INCLUDE_PATH . 'destination-functions.php');
include_once(INCLUDE_PATH . 'user-functions.php');
include_once(INCLUDE_PATH . 'tourtype-functions.php');
include_once(INCLUDE_PATH . 'tour-functions.php');
include_once(INCLUDE_PATH . 'presell-functions.php');
include_once(INCLUDE_PATH . 'comment-functions.php');
include_once(INCLUDE_PATH . 'validation.php');
include_once(INCLUDE_PATH . 'rewrite.php');

//spam control
include_once(INCLUDE_PATH . 'akismet.php');

global_sanitize();

$pager = false;

$active_langs = get_active_langs(); 
$smarty->assign('active_langs', $active_langs);

$msg = null;
$smarty->assign_by_ref('msg', $msg);

$usertypes = array(
  "0" => "Cliente",
  "1" => "Administrador"
);

if ( !empty($_SESSION['loginuser']) ) {
  $smarty->assign('user', $_SESSION['loginuser']);
  
  if (!empty($_SESSION['loginuser']['usertype'])) {
    $smarty->assign('is_admin', true);
  }
}

$smarty->assign('site_name', get_option('name'));

?>

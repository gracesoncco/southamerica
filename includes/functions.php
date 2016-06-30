<?php

function send_headers($mime = "text/html") {
	static $sent = false;
	if ( headers_sent() || $sent) return;
	
	$sent = true;
	session_start();

	header("Content-Type: $mime; charset=" . CHARSET);
	header("Vary: Accept");
	header("X-Client: " . get_license());
}

function download_file ($file, $download_name = NULL, $mimetype = 'application/octect-stream', $allow_insecure_paths = false)
{
	if (empty($download_name))
		$download_name = basename($file);
		
  	$status = 0;
  	$allowed_dirs = array(PDFS_DIR, PICS_DIR);
  	if (defined('DOWNLOAD_DIR')) {
  		$allowed_dirs[] = DOWNLOAD_DIR;
  	}
  	
  	if ( empty($file) || 
  		(!$allow_insecure_paths && !in_array(dirname($file), $allowed_dirs)) || 
  		!file_exists($file) ) {
  		die(__('File does not exists'));
  	}
  	
  	
	if(isset($_SERVER['HTTP_USER_AGENT']) &&
   		preg_match("/MSIE/", $_SERVER['HTTP_USER_AGENT']))
	{
		// IE Bug in download name workaround
		ini_set( 'zlib.output_compression','Off' );
	}

	header ('Content-type: ' . $mimetype);
	header ('Content-Disposition: attachment; filename="' . $download_name . '"');
	header ('Expires: '.gmdate("D, d M Y H:i:s", mktime(date("H")+2, date("i"), date("s"), date("m"), date("d"), date("Y"))).' GMT');
	header ('Accept-Ranges: bytes');

   	header("Cache-control: private");                 
   	header ('Pragma: private');

	$size = filesize($file);
	if(isset($_SERVER['HTTP_RANGE'])) {
		list($a, $range) = explode("=",$_SERVER['HTTP_RANGE']);
		//if yes, download missing part
		str_replace($range, "-", $range);
		$size2 = $size-1;
		$new_length = $size2-$range;
		header("HTTP/1.1 206 Partial Content");
		header("Content-Length: $new_length");
		header("Content-Range: bytes $range$size2/$size");
	} else {
		$size2=$size-1;
		header("Content-Range: bytes 0-$size2/$size");
		header("Content-Length: ".$size);
	}

	if ($file = fopen($file, 'r')) {
		while(!feof($file) and (connection_status()==0)) {
			print(fread($file, 1024*8));
			flush();
		}
		$status = (connection_status() == 0);
		fclose($file);
	}
	return($status);
}

function send_mail($to, $subject, $text, $to_name = '') {
	global $mail_params, $msg;
	
	require_once INCLUDE_PATH . 'phpmailer/class.phpmailer.php';
	
	$mail = new PHPMailer();
	
	if ( !empty($mail_params['user']) && !empty($mail_params['password']) ) {
		$mail->IsSMTP();
		$mail->Username = $mail_params['user'];
		$mail->Password = $mail_params['password'];
		$mail->SMTPAuth = true;
	}
	else {
		$mail->IsMail();
	}
	if (!empty($mail_params['host'])) {
		$mail->Host = $mail_params['host'];
	}
	if ( empty($mail_params['from']) ) {
		$mail -> From = get_option('site_mail');
	}
	else {
		$mail -> From = $mail_params['from'];
	}
	if ( empty($mail_params['from_name']) ) {
		$mail -> FromName = get_option('site_name');
	}
	else {
		$mail -> FromName = $mail_params['from_name'];
	}
	
	$mail -> AddAddress ($to, $to_name);
	$mail -> Subject = $subject;
	$mail -> Body = $text;
	$mail -> AltBody = strip_tags($text);
	$mail -> IsHTML (true);
	$mail -> Charset = CHARSET;
	
	if ( $mail->Send() ) {
		return true;		
	}
	else {
		$msg = $mail->ErrorInfo;
		return false;
	}
}

function get_default_lang() {	
	return get_option('default_lang');
}

function site_url() {
	global $site_path;
	$site_schema = ( isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on' ) ? 'https://' : 'http://';
	$site_server =  $_SERVER['HTTP_HOST'] . ( $_SERVER['SERVER_PORT'] == 80 ? '' : ':' . $_SERVER['SERVER_PORT'] );

	return $site_schema . $site_server . $site_path;
}

function safe_redirect($location) {
	$location = preg_replace('|[^a-z0-9-~+_.?#=&;,/:%]|i', '', $location);

	$strip = array('%0d', '%0a');
	$location = str_replace($strip, '', $location);

	if ( !$location )
		$location = BASE_URL; 
	header("Location: $location");
	exit();
}

function go_home($lang) {
	global $smarty;	
	
	require_once INCLUDE_PATH . 'rewrite.php'; // Just to be sure
	$url = template_normal_url('index', $lang);

	safe_redirect($url);
}

function get_reservation_code($id) {
	global $site_key;
	
	return md5( $id . $_SERVER['SERVER_NAME'] . $site_key );
}

function get_license() {
	$license = get_option('license');
	return strlen($license) > 0 ? $license : 'if 1.0';
}

// From wordpress
function wp_salt() {
	global $site_key, $dbparams;
	
	$salt = $site_key;
	if (empty($salt)) {
		$salt = join('', $dbparams);
	}
	return $salt;
}

function wp_hash($data) {
	$salt = wp_salt();
	
	return md5($data . $salt);
}

function current_user() {
	if (empty($_SESSION['loginuser'])) {
		return array('userid' => 0);
	}
	else {
		return $_SESSION['loginuser'];
	}
}
/* To avoid CSRF attacks on some actions, still wordpress code */
function wp_verify_nonce($nonce = false, $action = -1, $die_on_error = true) {
	$user = current_user();	
	$uid = $user['userid'];
	
	if (!empty($_SERVER['HTTP_USER_AGENT'])) {
		$uid .= $_SERVER['HTTP_USER_AGENT'];
	}
	
	if ( $nonce == false && isset($_REQUEST['_token']) ) {
		$nonce = $_REQUEST['_token'];
	}

	$i = ceil(time() / 43200);

	$valid = substr(wp_hash($i . $action . $uid), -12, 10) == $nonce || substr(wp_hash(($i - 1) . $action . $uid), -12, 10) == $nonce;
	
	if ( $die_on_error && !$valid ) {
		die(__('Invalid form key'));
	}
	
	return $valid;
}

function wp_create_nonce($action = -1) {
	$user = current_user();	
	$uid = $user['userid'];
	
	if (!empty($_SERVER['HTTP_USER_AGENT'])) {
		$uid .= $_SERVER['HTTP_USER_AGENT'];
	}

	$i = ceil(time() / 43200);

	return substr(wp_hash($i . $action . $uid), -12, 10);
}

function check_admin_referer($action = -1) {	
	$adminurl = strtolower(ADMIN_URL);
	$referer = strtolower(get_referer());
	
	if ( !wp_verify_nonce(false, $action) &&
		!(-1 == $action && strstr($referer, $adminurl)) ) {
		die();
	}
	return true;
}

function get_referer() {
	if ( !empty($_SERVER['HTTP_REFERER']) ) {
		return $_SERVER['HTTP_REFERER'];
	}
	return false;
}

// Lame function to strip some lines of code
function database_query($query, $execute) {
	global $bcdb;
	
	if (!empty($query)) {
		if ( $execute ) {
			return $bcdb->query($query);
		}
		else {
			return $query;
		}
	}
	return false;
}

function insert_query ($table, $params, $execute = false) {
	if ( ($insert = process_params_for_insert($params)) !== false )	{
		$query = @sprintf('INSERT INTO %s(%s) VALUES (%s)', $table, $insert['fields'], $insert['values']);
		
		return database_query($query, $execute);
	}
	return false;
}

function update_query($table, $params, $condition, $execute = false) {
	if ( ($update = process_params_for_update($params)) !== false )	{
		$query_fmt = 'UPDATE %s SET %s';
		if (!empty($condition))
			$query_fmt .= ' WHERE %s';
		elseif ($condition !== false)		
			die(__('No hay una condición para hacer el update'));
			
		$query = @sprintf($query_fmt, $table, $update, $condition);
		
		return database_query($query, $execute);
	}
	return false;
}

function insert_update_query ($table, $params, $execute = false) {
	$insert = process_params_for_insert($params);
	$update = process_params_for_update($params);
	
	if (!empty($insert) && !empty($update)) {
		$query_fmt = 'INSERT INTO %s (%s) VALUES (%s) ON DUPLICATE KEY UPDATE %s';
		
		$query = sprintf(
			$query_fmt, 
			$table, 
			$insert['fields'],
			$insert['values'],
			$update
			);
		
		return database_query($query, $execute);
	}
	return false;
}

function process_params_for_insert($array) {
	if (!is_array($array)) return false;

	$returnData['fields'] = implode(',', array_keys($array));
	foreach ($array as $k => $v) {
		if (is_array($v)) return false;

		$array[$k] = ($v == 'now()') ? $v : "'" . trim($v) . "'";
	}
	$returnData['values'] = implode(',', array_values($array));

	return $returnData;
}

function process_params_for_update($array) {
	if (!is_array($array)) return false;

	foreach ($array as $k => $v) {
		if (is_array($v)) return false;
		$array[$k] = "$k = " . ( ($v == 'now()') ? $v : "'" . trim($v) . "'" );
	}

	return implode(',', array_values($array));
}

function empty_vars() {
	global $id, $action;
	$id = 0; $action = '';
}

function get_spam_method() {
	global $bcdb;
	
	$spam_control = strtolower(trim(get_option('spam_control')));
	
	$value = '';
	$spam_method = 'none';
	if ( !empty( $spam_control ) ) {
		if ( preg_match('/[a-z0-9]{12}/', $spam_control) ) {
			$spam_method = 'akismet';
			$value = $spam_control;
		}
		elseif ( in_array( $spam_control, array('none', 'moderate', 'captcha') ) )
			$spam_method = $spam_control;
	}

	return array('method' => $spam_method, 'value' => $value);
}

function is_admin () {	
	static $is_admin;
	
	if ( !isset($is_admin) ) {
		send_headers();	
	
		$is_admin = !empty($_SESSION['loginuser']['usertype']) && 
			$_SESSION['loginuser']['usertype'] == 1 &&
			preg_match('`' . preg_quote(dirname($_SERVER['REQUEST_URI']), '`') . '/?$`i', ADMIN_URL);
	}
	return $is_admin;	
}

function get_current_language($params = null) {	
	global $bcdb, $site_path;
	
	$language = null;

	$in = array(&$params, &$_GET, &$_POST);
	
	if (!is_admin()) {
		$in[] = &$_SESSION;
		$in[] = &$_COOKIE;
	}	
	foreach ($in as $v) {
		if ( !empty($v['lang']) ) {
			$language = $v['lang'];
			break;
		}
	}
	
	if ( get_option('use_user_agent_language') ) {
		if ( !empty($_SERVER['HTTP_ACCEPT_LANGUAGE']) && empty($language) && !is_admin() ) {
			$language = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
		}
	}
	$language = preg_replace('/[^a-z]/', '', substr(strtolower($language), 0, 2));
	
	$active_langs = get_active_langs();
	
	if ( empty($active_langs) || !get_default_lang() ) {
		$language = 'es';
	}
	elseif ( !is_admin() && (strlen($language) != 2 || empty($active_langs[$language]))) {
		go_home(get_default_lang());
	}
	elseif ( empty($active_langs[$language]) ) {
		$language = get_default_lang();
	}
	
	if ( !is_admin() ) {
		set_current_language($language);
	}
	
	if ( $_SERVER['REQUEST_URI'] == $site_path && $language != get_default_lang() ) {
		go_home($language);
	}
	
	return $language;
}

function set_current_language($lang_code) {
	if ( empty($_COOKIE['lang']) || $_COOKIE['lang'] != $lang_code) {
		setcookie('lang', $lang_code, time()+60*60*24*365, '/'); // Cookie
	}
	if ( empty($_SESSION['lang']) || $_SESSION['lang'] != $lang_code ) {
		$_SESSION['lang'] = $lang_code;	 // If the user does not accept cookies
	}
}

function get_country($country) {
	global $bcdb;
	return $bcdb->get_var("SELECT country_name FROM $bcdb->country WHERE country_code = '$country'");
}

function get_countries() {
	global $bcdb;
	$results = $bcdb->get_results("SELECT * FROM $bcdb->country ORDER BY country_name");
	if ($results)
		foreach ($results as $v)
			$langs[$v['country_code']] = $v['country_name'];
	return $results ? $langs : null;
}

function get_languages() {
	global $bcdb;
	return $bcdb->get_results("SELECT * FROM $bcdb->lang ORDER BY lang_code ASC");
}

function get_language_name($lang_code) {
	global $bcdb;
	return $bcdb->get_var("SELECT lang_name FROM $bcdb->lang WHERE lang_code = '$lang_code'");
}

function get_active_langs () {
	global $bcdb;
	static $active;
	
	if ( empty($active) ) {
	
		$results = $bcdb->get_results("SELECT lang_code, lang_name FROM $bcdb->lang WHERE active = 1");
		
		if ($results) :	foreach ($results as $v) :
				$active[$v['lang_code']] = $v;
		endforeach; endif; 
	}

	return !empty($active) ? $active : false;
}

function update_active_langs ($llangs) {
	global $bcdb, $msg;

	if ( !is_array($llangs) ) {
		$llangs = array($llangs);
	}
	$llangs = array_map('sanitize_language', $llangs);
	if ( !in_array(get_default_lang(), $llangs) ) {
		$found = false;
		foreach ($llangs as $v) {
			if ( get_language_name($v) ) {
				save_option(0, array('name' => 'default_lang', 'value' => $v));
				$found = true;
				break;
			}
		}
		if ( !$found ) {
			$msg = __('Nombres de idioma no válidos');
			return false;
		}
	}
	/* Reset all langs */
	$bcdb->query("UPDATE $bcdb->lang SET active = 0");
	$sql = "UPDATE $bcdb->lang SET active = 1 WHERE lang_code IN ('" . join("','", $llangs) . "')";
	return $bcdb->query($sql);
}

function get_filled_langs(&$results) {
	global $active_langs;
	$langs = array();

	if (!empty($results) && is_array($results)) {
		foreach ($results as $v)
			$filled[$v['lang_code']] = true;
		$i = 0;
		foreach($active_langs as $v) {
			$langs[$i]['lang_code'] = $v['lang_code'];
			$langs[$i]['name'] = $v['lang_name'];
			$langs[$i]['filled'] = empty($filled[$v['lang_code']]) ? 'unfilled' : 'filled';
			$i++;
		}
		unset($filled);
	}
	return $langs;
}

// Devuelve el link adecuado, éste no se debe repetir y debe ser <= 255 caracteres
function get_correct_link($link, $table = null, $correct_repeated = true, $where_condition = NULL) {
	global $bcdb;

	if (is_array($link) && !empty($link['link']))
		$link = $link['link'];
	
	$link = substr(trim($link), 0, 255);

	if (!empty($table)) {
		if (!empty($where_condition)) {
			if ( ! preg_match('/^\s*AND|OR/i', $where_condition) ) {
				$where_condition = 'AND ' . $where_condition;			
			}
			$all = $bcdb->get_var("SELECT COUNT(link) 
				FROM $table 
				WHERE link REGEXP CONCAT('^$link', '(-[0-9]+)?$') $where_condition");
		}
		else 
			$all = $bcdb->get_var("SELECT COUNT(link) 
				FROM $table 
				WHERE link REGEXP CONCAT('$link', '(-[0-9]+)?')");

		if ( $all > 0 ) {
			if ($correct_repeated) {
				$link = substr($link, 0, 255 - strlen("-$all")) . "-$all";
			}
			else {
				return false;
			}
		}
	}

	return $link;
}

function get_option($option) {
	global $bcdb;
	static $options_hash;

	if ( empty($options_hash[$option]) ) {		
		$option = $bcdb->escape(preg_replace('/[^a-z\d_-]/i', '', $option));
		$options_hash[$option] = $bcdb->get_var("SELECT value FROM $bcdb->option WHERE name = '$option'");
	}
	
	return $options_hash[$option];
}

function get_options($type = 1) {
	global $bcdb;
	
	$results = $bcdb->get_results("SELECT * FROM $bcdb->option WHERE type = '$type'");
	
	$options = array();
	if ($results) : foreach ($results as $k => $v) :
		$options[$v['name']] = $v['value'];
	endforeach; endif;
	
	return $options;
}

function save_option ( $optionid, $option_values ) {
	global $bcdb;
	
	unset($option_values['optionid']);
	if (!empty($option_values['name'])) {
		$option_values['name'] = preg_replace('/[^a-z\d_-]/i', '', $option_values['name']);
	}
	if ( ($query = insert_update_query($bcdb->option, $option_values)) &&
		$bcdb->query($query) ) {
			
		return empty($optionid) ? $bcdb->insert_id : $optionid;		
	}
	return false;
}

function update_batch_options($options) {
	global $bcdb, $msg;	
	
	foreach ($options as $k => $v) {
		$k = strtolower(preg_replace('/[^a-z\d_-]/i', '', $k));
		if ( ! $bcdb->query("INSERT into $bcdb->option (name, value)
			VALUES ('$k', '$v')
			ON DUPLICATE KEY UPDATE value = '$v'") ) {
		
			$msg = sprintf(__('Hubo un problema al intentar guardar una nueva %s'), __('Opción'));
			return false;
		}
	}
	return true;
}

function pg_file_exists($file, $lang = null) {
	global $smarty;
	if ( empty($lang) ) {
		global $lang;
	}	
	$default = get_default_lang();
		
	$filename = "stmt/$lang-$file";	
	return (file_exists($smarty->template_dir . "/$filename")) ? $filename : "stmt/$default-$file";
}

function get_qs_as_search($strip_simple_words = false, $strip_extension = false) {
	global $site_path;
	
	$search_term = str_replace($site_path, '', urldecode($_SERVER['REQUEST_URI']));
	
	$strip = array('`[^\w]`', '`\s+|_`');
	$replace = array(' ', ' ', '', '');
	if ( $strip_extension && is_string($strip_extension) ) {		
		$strip[] = "`\." . preg_quote($strip_extension, '`') . "(\?.*)?$`i";
	}
	if ( $strip_simple_words ) {
		$strip[] = "`\b\w{0,3}\b`i";
	}
	$search_term = preg_replace($strip, $replace, strip_tags(trim($search_term)));

	return $search_term;
}

function get_random_image($path = 'head') {
	static $images;
	
	srand((float) microtime() * 10000000);
	$path = trim($path, '/') . '/';
	if ( !is_dir(PICS_DIR . $path) ) {
		return null;
	}
	elseif ( empty($images) ) {		
		$images = glob(PICS_DIR . $path . '*');
		if ( empty($images) ) {
			return null;
		}
		foreach ($images as $k => $v) {
			$images[$k] = basename($v);
			if ( !preg_match('/\.(jpe?g|gif|png)$/is', $v) )
				unset($images[$k]);
		}
	}
	return PICS_URL . $path . $images[array_rand($images)];
}

/*
	From: meneame.net
*/
function get_ip($as_long = true) {
	static $last_seen = '';

	if(empty($last_seen) ) {
		if (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
			$user_ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
		} else if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
			$user_ip = $_SERVER["HTTP_CLIENT_IP"];
		}
	
		if ( !empty($user_ip) ) {
			$ips = preg_split('/[, ]/', $user_ip);
			foreach ($ips as $ip) {
				if (preg_match('/^[1-9]\d{0,2}\.(\d{1,3}\.){2}[1-9]\d{0,2}$/s', $ip)) {
					$last_seen = $ip;
					break;
				}
			}
		}
	}
	if ( empty($last_seen) ) {
		$last_seen = $_SERVER["REMOTE_ADDR"];
	}
	
	if ($as_long) {		
		return sprintf('%u', ip2long($last_seen));
	}
	else {
		return $last_seen;
	}
}

// To do:
function include_site_script() {
	global $user_scripts;
	
	foreach (func_get_args() as $script) {
		$user_scripts[] = array('src' => MEDIA_URL . 'js/' . $script);
	}
}
function include_theme_script() {
	global $user_scripts;
	
	foreach (func_get_args() as $script) {
		$user_scripts[] = array('src' => THEME_URL . get_current_theme() . '/' . $script);
	}
}
function add_user_script($script_contents) {
	global $user_scripts;
	
	$user_scripts[] = array('contents' => $script_contents);
}

function not_found() {
	global $lang, $smarty;
	
	$terms = get_qs_as_search();
	$terms = str_replace('tour', '', $terms);
	$tours = search_tours($terms, $lang);
	$smarty->assign('tours', $tours);
	$smarty->assign('file', '404.html');	
	$smarty->display ('index.html');
	exit();
}
?>
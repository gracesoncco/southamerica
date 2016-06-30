<?php

function get_current_theme() {
	static $theme;
	
	if ( empty($theme) ) {
		if ( !($theme = get_option('theme')) ) {
			$theme = 'default';
		}
	}
	return $theme;
}

function get_current_theme_url() {
	return BASE_URL . 'themes/' . get_current_theme() . '/';
}

function get_theme_data($theme_file) {
	if ( !file_exists($theme_file) ) return ;
		
	$theme_data = implode('', file($theme_file));
	preg_match("|Theme Name:(.*)|i", $theme_data, $theme_name);
	preg_match("|Description:(.*)|i", $theme_data, $description);
	preg_match("|Author:(.*)|i", $theme_data, $author_name);

	$description = autop(trim($description[1]));

	$name = trim($theme_name[1]);
	$theme = $name;
	$author = $author_name[1];

	return array('Name' => $name, 'Title' => $theme, 'Description' => $description, 'Author' => $author);
}

function get_themes($exlude_theme = '') {
	$themes = glob(THEME_PATH . '*', GLOB_ONLYDIR);
	
	$valid_themes = array();
	foreach ($themes as $v) {
		if ( file_exists($v . '/metadata.txt') && basename($v) != $exlude_theme ) {
			$metadata = get_theme_data($v . '/metadata.txt');
			$metadata['Url'] = THEME_URL . basename($v) . '/';
			$metadata['Template'] = basename($v);
			$metadata = array_map('clean_html', $metadata);
			$valid_themes[] = $metadata;
		}
	}	
	return $valid_themes;
}

function get_template_files($base_path, $lang = '') {
	$current_theme = $templates_dir = str_replace('\\', '/', THEME_PATH . get_current_theme()) . '/templates/';	
	if ( is_file($current_theme . $base_path) ) {		
		if ( strpos($base_path, '/') === false ) {
			$base_path = '';
		}
		else {
			$base_path = dirname($base_path);
		}		
	}
	if ( is_dir($current_theme . $base_path) ) {
		$templates_dir .= trim($base_path, '/') . '/';
	}
	if ( !empty($lang) ) {
		$lang .= '-';
	}	
	$templates_dir = preg_replace('`/+`', '/', str_replace('\\', '/', $templates_dir));	
	$templates = glob($templates_dir . "$lang*");	
	$results = array();
	$i = 0;
	foreach ($templates as $k => $v) {
		$results[$i]['path'] = str_replace($current_theme, '', $v);
		$results[$i]['filename'] = basename($v);
		++$i;
	}
	
	return $results;
}

function sanitize_filename($file, $allowed_files = false) {	
	$file = preg_replace('/[\r\n]|(\.\.)/', '', $file);
	preg_match('|\.(.*)$|', $file, $match);
	
	if ( preg_match('|[^a-z\d-_/.]|i', $file) || false !== strpos( $file, './' ) || 
		(':' == substr( $file, 1, 1 )) || 
		(!empty($match[1]) && !in_array($match[1], array('htm', 'html', 'js', 'css')) )	) {
		die('Invalid filename');
	}	
	return $file;
}

function get_file_to_edit($file) {
	if ( is_file(THEME_PATH . get_current_theme() . '/templates/' . $file) ) {
		return array(
			'path' => $file,
			'contents' => file_get_contents(THEME_PATH . get_current_theme() . '/templates/' . $file),
			'parent' => str_replace('\\', '/', dirname($file))
			);
	}
	return array(
		'path' => $file,
		'parent' => $file
		);
}

?>
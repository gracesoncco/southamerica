<?php
	require_once (INCLUDE_PATH . 'streams.php');
	require_once (INCLUDE_PATH . 'gettext.php');

	$input = new FileReader(LOCALE . "$lang.mo");
	$l10n = new gettext_reader($input);

	# Wrapper for translate a text
	function __($text) {
		global $l10n;
		if ( !empty($text) )
  			return $l10n->translate($text);
  		else {
  			return null;
  		}
	}
	# Print the translated text
	function _e($text) {
		echo __($text);
	}
	# I don't know what it does
	function _n($single, $plural, $number) {
	  	global $l10n;
	  	return $l10n->ngettext($single, $plural, $number);
	}
?>
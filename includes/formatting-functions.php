<?php
function clean_pre($text) {
	$text = str_replace('<br />', '', $text);
	$text = str_replace('<p>', "\n", $text);
	$text = str_replace('</p>', '', $text);
	return $text;
}

function clean_html($text) {
	$text = specialchars(trim(strip_tags($text)));
	return $text;
}

function autop($pee, $br = 1) {
	$pee = $pee . "\n"; // just to make things a little easier, pad the end
	$pee = preg_replace('|<br />\s*<br />|', "\n\n", $pee);
	// Space things out a little
	$pee = preg_replace('!(<(?:table|thead|tfoot|caption|colgroup|tbody|tr|td|th|div|dl|dd|dt|ul|ol|li|pre|select|form|blockquote|math|p|h[1-6])[^>]*>)!', "\n$1", $pee); 
	$pee = preg_replace('!(</(?:table|thead|tfoot|caption|colgroup|tbody|tr|td|th|div|dl|dd|dt|ul|ol|li|pre|select|form|blockquote|math|p|h[1-6])>)!', "$1\n", $pee);
	$pee = str_replace(array("\r\n", "\r"), "\n", $pee); // cross-platform newlines 
	$pee = preg_replace("/\n\n+/", "\n\n", $pee); // take care of duplicates
	$pee = preg_replace('/\n?(.+?)(?:\n\s*\n|\z)/s', "\t<p>$1</p>\n", $pee); // make paragraphs, including one at the end 
	$pee = preg_replace('|<p>\s*?</p>|', '', $pee); // under certain strange conditions it could create a P of entirely whitespace 
    $pee = preg_replace('!<p>\s*(</?(?:table|thead|tfoot|caption|colgroup|tbody|tr|td|th|div|dl|dd|dt|ul|ol|li|hr|pre|select|form|blockquote|math|p|h[1-6])[^>]*>)\s*</p>!', "$1", $pee); // don't pee all over a tag
	$pee = preg_replace("|<p>(<li.+?)</p>|", "$1", $pee); // problem with nested lists
	$pee = preg_replace('|<p><blockquote([^>]*)>|i', "<blockquote$1><p>", $pee);
	$pee = str_replace('</blockquote></p>', '</p></blockquote>', $pee);
	$pee = preg_replace('!<p>\s*(</?(?:table|thead|tfoot|caption|colgroup|tbody|tr|td|th|div|dl|dd|dt|ul|ol|li|hr|pre|select|form|blockquote|math|p|h[1-6])[^>]*>)!', "$1", $pee);
	$pee = preg_replace('!(</?(?:table|thead|tfoot|caption|colgroup|tbody|tr|td|th|div|dl|dd|dt|ul|ol|li|pre|select|form|blockquote|math|p|h[1-6])[^>]*>)\s*</p>!', "$1", $pee); 
	if ($br) $pee = preg_replace('|(?<!<br />)\s*\n|', "<br />\n", $pee); // optionally make line breaks
	$pee = preg_replace('!(</?(?:table|thead|tfoot|caption|tbody|tr|td|th|div|dl|dd|dt|ul|ol|li|pre|select|form|blockquote|math|p|h[1-6])[^>]*>)\s*<br />!', "$1", $pee);
	$pee = preg_replace('!<br />(\s*</?(?:p|li|div|dl|dd|dt|th|pre|td|ul|ol)>)!', '$1', $pee);
	
	
	return $pee; 
}


function seems_utf8($Str) { # by bmorel at ssi dot fr
	for ($i=0; $i<strlen($Str); $i++) {
		if (ord($Str[$i]) < 0x80) continue; # 0bbbbbbb
		elseif ((ord($Str[$i]) & 0xE0) == 0xC0) $n=1; # 110bbbbb
		elseif ((ord($Str[$i]) & 0xF0) == 0xE0) $n=2; # 1110bbbb
		elseif ((ord($Str[$i]) & 0xF8) == 0xF0) $n=3; # 11110bbb
		elseif ((ord($Str[$i]) & 0xFC) == 0xF8) $n=4; # 111110bb
		elseif ((ord($Str[$i]) & 0xFE) == 0xFC) $n=5; # 1111110b
		else return false; # Does not match any model
		for ($j=0; $j<$n; $j++) { # n bytes matching 10bbbbbb follow ?
			if ((++$i == strlen($Str)) || ((ord($Str[$i]) & 0xC0) != 0x80))
			return false;
		}
	}
	return true;
}

function specialchars($text, $quotes = 1 ) {
	// Like htmlspecialchars except don't double-encode HTML entities
	$text = preg_replace('/&([^#])(?![a-z12]{1,8};)/', '&#038;$1', $text);-
	$text = str_replace('<', '&lt;', $text);
	$text = str_replace('>', '&gt;', $text);
	if ( $quotes ) {
		$text = str_replace('"', '&quot;', $text);
		$text = str_replace("'", '&#039;', $text);
	}
	return $text;
}

function utf8_uri_encode( $utf8_string ) {
  $unicode = '';        
  $values = array();
  $num_octets = 1;
        
  for ($i = 0; $i < strlen( $utf8_string ); $i++ ) {

    $value = ord( $utf8_string[ $i ] );
            
    if ( $value < 128 ) {
      $unicode .= chr($value);
    } else {
      if ( count( $values ) == 0 ) $num_octets = ( $value < 224 ) ? 2 : 3;
                
      $values[] = $value;
      
      if ( count( $values ) == $num_octets ) {
	if ($num_octets == 3) {
	  $unicode .= '%' . dechex($values[0]) . '%' . dechex($values[1]) . '%' . dechex($values[2]);
	} else {
	  $unicode .= '%' . dechex($values[0]) . '%' . dechex($values[1]);
	}

	$values = array();
	$num_octets = 1;
      }
    }
  }

  return $unicode;    
}

function remove_accents($string) {
	if (seems_utf8($string)) {
		$chars = array(// Decompositions for Latin-1 Supplement
									 chr(195).chr(128) => 'A', chr(195).chr(129) => 'A',
									 chr(195).chr(130) => 'A', chr(195).chr(131) => 'A',
									 chr(195).chr(132) => 'A', chr(195).chr(133) => 'A',
									 chr(195).chr(135) => 'C', chr(195).chr(136) => 'E',
									 chr(195).chr(137) => 'E', chr(195).chr(138) => 'E',
									 chr(195).chr(139) => 'E', chr(195).chr(140) => 'I',
									 chr(195).chr(141) => 'I', chr(195).chr(142) => 'I',
									 chr(195).chr(143) => 'I', chr(195).chr(145) => 'N',
									 chr(195).chr(146) => 'O', chr(195).chr(147) => 'O',
									 chr(195).chr(148) => 'O', chr(195).chr(149) => 'O',
									 chr(195).chr(150) => 'O', chr(195).chr(153) => 'U',
									 chr(195).chr(154) => 'U', chr(195).chr(155) => 'U',
									 chr(195).chr(156) => 'U', chr(195).chr(157) => 'Y',
									 chr(195).chr(160) => 'a', chr(195).chr(161) => 'a',
									 chr(195).chr(162) => 'a', chr(195).chr(163) => 'a',
									 chr(195).chr(164) => 'a', chr(195).chr(165) => 'a',
									 chr(195).chr(167) => 'c', chr(195).chr(168) => 'e',
									 chr(195).chr(169) => 'e', chr(195).chr(170) => 'e',
									 chr(195).chr(171) => 'e', chr(195).chr(172) => 'i',
									 chr(195).chr(173) => 'i', chr(195).chr(174) => 'i',
									 chr(195).chr(175) => 'i', chr(195).chr(177) => 'n',
									 chr(195).chr(178) => 'o', chr(195).chr(179) => 'o',
									 chr(195).chr(180) => 'o', chr(195).chr(181) => 'o',
									 chr(195).chr(182) => 'o', chr(195).chr(182) => 'o',
									 chr(195).chr(185) => 'u', chr(195).chr(186) => 'u',
									 chr(195).chr(187) => 'u', chr(195).chr(188) => 'u',
									 chr(195).chr(189) => 'y', chr(195).chr(191) => 'y',
									 // Decompositions for Latin Extended-A
									 // TODO: Finish me.
									 chr(197).chr(146) => 'OE', chr(197).chr(147) => 'oe',
									 chr(197).chr(160) => 'S', chr(197).chr(161) => 's',
									 chr(197).chr(189) => 'Z', chr(197).chr(190) => 'z',
									 // Euro Sign
									 chr(226).chr(130).chr(172) => 'E');

		$string = strtr($string, $chars);
	} else {
		// Assume ISO-8859-1 if not UTF-8
		$chars['in'] = chr(128).chr(131).chr(138).chr(142).chr(154).chr(158)
			.chr(159).chr(162).chr(165).chr(181).chr(192).chr(193).chr(194)
			.chr(195).chr(196).chr(197).chr(199).chr(200).chr(201).chr(202)
			.chr(203).chr(204).chr(205).chr(206).chr(207).chr(209).chr(210)
			.chr(211).chr(212).chr(213).chr(214).chr(216).chr(217).chr(218)
			.chr(219).chr(220).chr(221).chr(224).chr(225).chr(226).chr(227)
			.chr(228).chr(229).chr(231).chr(232).chr(233).chr(234).chr(235)
			.chr(236).chr(237).chr(238).chr(239).chr(241).chr(242).chr(243)
			.chr(244).chr(245).chr(246).chr(248).chr(249).chr(250).chr(251)
			.chr(252).chr(253).chr(255);

		$chars['out'] = "EfSZszYcYuAAAAAACEEEEIIIINOOOOOOUUUUYaaaaaaceeeeiiiinoooooouuuuyy";

		$string = strtr($string, $chars['in'], $chars['out']);
		$double_chars['in'] = array(chr(140), chr(156), chr(198), chr(208), chr(222), chr(223), chr(230), chr(240), chr(254));
		$double_chars['out'] = array('OE', 'oe', 'AE', 'DH', 'TH', 'ss', 'ae', 'dh', 'th');
		$string = str_replace($double_chars['in'], $double_chars['out'], $string);
	}

	return $string;
}

function make_clickable($ret) {
	$ret = ' ' . $ret;
	// in testing, using arrays here was found to be faster
	$ret = preg_replace(
		array(
			'#([\s>])([\w]+?://[\w\#$%&~/.\-;:=,?@\[\]+]*)#is',
			'#([\s>])((www|ftp)\.[\w\#$%&~/.\-;:=,?@\[\]+]*)#is',
			'#([\s>])([a-z0-9\-_.]+)@([^,< \n\r]+)#i'),
		array(
			'$1<a href="$2" rel="nofollow">$2</a>',
			'$1<a href="http://$2" rel="nofollow">$2</a>',
			'$1<a href="mailto:$2@$3">$2@$3</a>'),$ret);
	// this one is not in an array because we need it to run last, for cleanup of accidental links within links
	$ret = preg_replace("#(<a( [^>]+?>|>))<a [^>]+?>([^>]+?)</a></a>#i", "$1$3</a>", $ret);
	$ret = trim($ret);
	return $ret;
}

function sanitize_title($title) {
	$title = trim($title);
	$title = strip_tags($title);
	return $title;
}

function global_sanitize() {
	global $bcdb;
	
	$magic_quotes = get_magic_quotes_gpc();
	
	$in = array(&$_GET, &$_POST, &$_COOKIE);
    while (list($k,$v) = each($in)) {
            foreach ($v as $key => $val) {
                    if (!is_array($val)) {
                    		if ($magic_quotes) {
                    			$val = stripslashes($val);                    		
                    		}
                    		$in[$k][$key] = $bcdb->escape($val);
                            continue;
                    }
                    $in[] =& $in[$k][$key];
            }
    }
    unset($in);
}
	
function sanitize_title_with_dashes($title) {	
	$title = sanitize_title($title);
	// Preserve escaped octets.
	$title = preg_replace('|%([a-fA-F0-9][a-fA-F0-9])|', '---$1---', $title);
	// Remove percent signs that are not part of an octet.
	$title = str_replace('%', '', $title);
	// Restore octets.
	$title = preg_replace('|---([a-fA-F0-9][a-fA-F0-9])---|', '%$1', $title);

	$title = remove_accents($title);

	if (seems_utf8($title)) {
		if (function_exists('mb_strtolower')) {
			$title = mb_strtolower($title, 'UTF-8');
		}
		//$title = utf8_uri_encode($title);
	}

	$title = strtolower($title);
	$title = preg_replace('/&.+?;/', '', $title); // kill entities	
	//$title = preg_replace('/%[a-z0-9]{2}/i', '', $title);
	$title = preg_replace('/[^a-z0-9 _-]/', '', $title);
	$title = preg_replace('/\s+/', '-', $title);
	$title = preg_replace('|-+|', '-', $title);
	$title = trim($title, '-');	
	
	return $title;
}

function sanitize_tag($tag) {
	$tag = sanitize_title_with_dashes($tag);
	$tag = str_replace('-', '', $tag);
	return $tag;
}

function convert_chars($content, $flag = 'obsolete') { 
	// Translation of invalid Unicode references range to valid range
	$wp_htmltranswinuni = array(
	'&#128;' => '&#8364;', // the Euro sign
	'&#129;' => '',
	'&#130;' => '&#8218;', // these are Windows CP1252 specific characters
	'&#131;' => '&#402;',  // they would look weird on non-Windows browsers
	'&#132;' => '&#8222;',
	'&#133;' => '&#8230;',
	'&#134;' => '&#8224;',
	'&#135;' => '&#8225;',
	'&#136;' => '&#710;',
	'&#137;' => '&#8240;',
	'&#138;' => '&#352;',
	'&#139;' => '&#8249;',
	'&#140;' => '&#338;',
	'&#141;' => '',
	'&#142;' => '&#382;',
	'&#143;' => '',
	'&#144;' => '',
	'&#145;' => '&#8216;',
	'&#146;' => '&#8217;',
	'&#147;' => '&#8220;',
	'&#148;' => '&#8221;',
	'&#149;' => '&#8226;',
	'&#150;' => '&#8211;',
	'&#151;' => '&#8212;',
	'&#152;' => '&#732;',
	'&#153;' => '&#8482;',
	'&#154;' => '&#353;',
	'&#155;' => '&#8250;',
	'&#156;' => '&#339;',
	'&#157;' => '',
	'&#158;' => '',
	'&#159;' => '&#376;'
	);

	// Remove metadata tags
	$content = preg_replace('/<title>(.+?)<\/title>/','',$content);
	$content = preg_replace('/<category>(.+?)<\/category>/','',$content);

	// Converts lone & characters into &#38; (a.k.a. &amp;)
	$content = preg_replace('/&([^#])(?![a-z]{1,8};)/i', '&#038;$1', $content);

	// Fix Word pasting
	$content = strtr($content, $wp_htmltranswinuni);

	// Just a little XHTML help
	$content = str_replace('<br>', '<br />', $content);
	$content = str_replace('<hr>', '<hr />', $content);

	return $content;
}

function backslashit($string) {
	$string = preg_replace('/([a-z])/i', '\\\\\1', $string);
	return $string;
}

function trailingslashit($string) {
    if ( '/' != substr($string, -1)) {
        $string .= '/';
    }
    return $string;
}

function sanitize_email($email) {
	return preg_replace('/[^a-z0-9+_.@-]/i', '', $email);
}

function trim_excerpt( $text, $excerpt_length = 100 ) { // Fakes an excerpt if needed
	if ( !empty($text) ) {
		$text = strip_tags( $text );
		$blah = explode(' ', $text);

		if (count($blah) > $excerpt_length) {
			$k = $excerpt_length;
			$use_dotdotdot = 1;
		} else {
			$k = count($blah);
			$use_dotdotdot = 0;
		}
		$blah = array_slice($blah, 0, $k);
		$excerpt = preg_replace('/[,.\s]*$/', '', join(' ', $blah));
		$excerpt .= ($use_dotdotdot) ? '...' : '';
		$text = $excerpt;
	} // end if no excerpt
	return $text;
}

?>
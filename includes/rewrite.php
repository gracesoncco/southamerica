<?php

// Modification of 'nice' URLs, means than you have to update your .htaccess

function template_tour_url(& $tour, $lang) {
	return get_rewrite_link(
			"tour.php?title=$tour[link]&amp;lang=$lang",
			"tour-$tour[link].$lang.html"
		);
}

function template_tourtype_url( & $tourtype, $lang ) {
	return get_rewrite_link(
			"tours.php?title=$tourtype[link]&amp;lang=$lang&amp;tourtype",
			"$tourtype[link]-tour.$lang.html"
		);
}

function template_destination_url( & $destination, $lang ) {
	return get_rewrite_link(
			"tours.php?title=$destination[link]&amp;lang=$lang&amp;destination",
			"tours-in-$destination[link].$lang.html"
		);
}

function template_book_url ( & $tour, $lang ) {
	return get_rewrite_link(
			"book.php?title=$tour[link]&amp;lang=$lang",
			"book-$tour[link].$lang.html"
		);
}

function template_contact_url ( & $tour, $lang ) {
	return get_rewrite_link(
			"contact.php?title=$tour[link]&amp;lang=$lang",
			"contact-$tour[link].$lang.html"
		);
}

function template_recommend_url ( & $tour, $lang ) {
	return get_rewrite_link(
			"send-a-friend.php?title=$tour[link]&amp;lang=$lang",
			"recommend-$tour[link].$lang.html"
		);
}

function template_gallery_url ( & $tour, $lang ) {
	return get_rewrite_link(
			"gallery.php?title=$tour[link]&amp;lang=$lang",
			"gallery-$tour[link].$lang.html"
		);
}

function template_pdf_url ( & $tour, $lang ) {
	return get_rewrite_link(
			"pdf.php?title=$tour[link]&amp;lang=$lang",
			"$tour[link].$lang.pdf"
		);
}

function template_normal_url ( $page, $lang ) {	
	if ( empty($lang) ) {
		$lang = 'es';//dummy
	}
	
	return get_rewrite_link(
			"$page.php?lang=$lang",
			"$page.$lang.html"
		);
}

function get_rewrite_link($normal_link, $rewrite_link) {
	return BASE_URL . ( (defined('REWRITE_URL') && REWRITE_URL === true) ?
							$rewrite_link :
							$normal_link);
}

function template_search_url ( $search_term ) {
	global $lang, $bcrs;
	
	if ( REWRITE_URL ) {		
		$search_term = urlencode(preg_replace('/[\s+]+/', ' ', trim($search_term)));
		$_SERVER['REQUEST_URI'] = dirname($_SERVER['SCRIPT_NAME']) . "/$lang/search/$search_term";
	}
	else {
		$bcrs->set_qs_val('s', $search_term);
	}
}

?>
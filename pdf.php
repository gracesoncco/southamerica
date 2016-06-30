<?php
require_once('home.php');

$id = ! empty($_REQUEST['id']) ? abs($_REQUEST['id']) : 0;

// rewrite
if(!$id && isset($_GET['title'])) $id = get_tour_by_link($_GET['title']);
// end rewrite

$tour = get_tour($id, $lang);

$pdf = get_pdfs_by_lang($id, $lang);

if(!$tour || empty($pdf) || !file_exists(PDFS_DIR . $pdf[0]['file'])) {
	safe_redirect(BASE_URL);
}

$filename = "$tour[link].$lang.pdf";

download_file( PDFS_DIR . $pdf[0]['file'], $filename);

?>
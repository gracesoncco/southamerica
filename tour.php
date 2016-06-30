<?php
require_once('home.php');

$id = ! empty($_REQUEST['id']) ? abs($_REQUEST['id']) : 0;

// rewrite
if(isset($_REQUEST['title'])) $id = get_tour_by_link($_REQUEST['title']);
// end rewrite

$tour = get_tour($id, $lang);
if(!$tour) {
	not_found();
}

$prices = get_lodge_prices($id);

$pdf = get_pdfs_by_lang($id, $lang);

$comments = get_comments_by_tour($id);

complete_fields($tour);

// Update stats
update_visit($id);

$smarty->assign ('tour', $tour);
$smarty->assign ('related_tours', get_related_tours($id, $tour['name']));
$smarty->assign ('comments', $comments);
$smarty->assign ('moderation', isset($_REQUEST['moderation']));
$smarty->assign ('prices', $prices);
$smarty->assign ('pdf', $pdf);
$smarty->assign ('file', 'tour.html');
$smarty->assign ('lightbox', true);
$smarty->assign ('section_title', $tour['name']);
$smarty->display ('index.html');

?>
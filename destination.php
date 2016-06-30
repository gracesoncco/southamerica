<?php

require_once('home.php');

if ( $destinations = get_destinations('full-desc') ) {
	$cloud = array();
	
	$counter = 0;
	foreach ($destinations as $k => $v) {
		$destours = get_tours_by_destination($v['destid']);
		$destinations[$k]['picture'] = get_destination_pictures($v['destid'], 1);
		$cloud[$k]['count'] = count($destours);
		$cloud[$k]['destination'] = $v;
		$counter += $cloud[$k]['count'];
	}
	
	if($counter>0) {
		foreach ($cloud as $k => $v) {
			$tmpercent = round((100*$cloud[$k]['count'])/$counter);
			if($tmpercent >= 0) $percent = '100';
			if($tmpercent >= 5) $percent = '150';
			if($tmpercent >= 10) $percent = '200';
			if($tmpercent > 15) $percent = '250';
			$cloud[$k]['percent'] = $percent;
		}
	}
	$smarty->assign ('cloud', $cloud);
	$smarty->assign ('counter', $counter);

	$smarty->assign ('destinations', $destinations);
}

$site_name =  __('Destinations') . ' ' . __('in') . ' ' . get_option('name');
$smarty->assign ('file', 'destination.html');
$smarty->assign ('section_title', $site_name);
$smarty->display ('index.html');

?>
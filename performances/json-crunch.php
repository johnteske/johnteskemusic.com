<?php
// include '../util/get_json.php';

/*
	Treat "today" marker as tomorrow, as to not hide current shows.
	"Current" depends on performance time zone and time zone of viewer,
	which could be up to 24 hours.
*/
date_default_timezone_set('America/Los_Angeles');

$today = date('ymd', strtotime('-1 days'));
$perfpath = $_SERVER['DOCUMENT_ROOT'] . '/performances/';

if ($showevents == 'featured') {
	$json_files = glob($perfpath . '*.json');
}
elseif ($showevents == 'archive') {
	$json_files = glob($perfpath . 'archive/*.json'); //
}
else { // 'all': featured + archive
	$json_files = array_merge( glob($perfpath . '*.json'), glob($perfpath . 'archive/*.json') );
}

// custom compare, to maintain featured + archive file paths
function compare_basenames($a, $b) { return strcasecmp( basename($b), basename($a) ); }
usort($json_files, "compare_basenames");

function check_future($file) {
	global $today;
	return($today <= basename($file));
}
function check_past($file) {
	global $today;
	return($today > basename($file));
}

$upcoming_json = array_filter($json_files, "check_future");
sort($upcoming_json); // simple (chronological) sort
$past_json = array_filter($json_files, "check_past");

function extract_date($file, $end_date = NULL) {
	$file_date = basename($file, '.json'); // get filename without extension
	$file_date = substr($file_date, 0, 6); // keep YYMMDD date, not description
	$start_date = date_create_from_format('ymd', $file_date);
	$date = $start_date->format('M j'); // formatted date
	if($end_date) {
		$end_date = date_create_from_format('y-m-d', $end_date);
		if( date("m", $start_date) == date("m", $end_date) ) {
			$date .= "&ndash;" . $end_date->format('j');
		}
		else {
			$date .= "&ndash;" . $end_date->format('M j');
		}
		// also check if same year (would also have to modify start_date) // format('M j, Y')
	}
	$date_year = $start_date->format('Y'); // for grouping by year
	return array ($date, $date_year);
}
?>

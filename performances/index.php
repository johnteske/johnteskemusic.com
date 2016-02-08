<?php
	$title = 'Performances';
	$class = 'perf';
	include '../header.php';
	?>
<!-- content -->
<?php

	$showevents = !empty($_GET['events']) ? $_GET['events'] : 'featured';
	$showupcoming = !empty($_GET['upcoming']) ? $_GET['upcoming'] : 'full';
	$showpast = !empty($_GET['past']) ? $_GET['past'] : 'short';
	// echo $_SERVER["QUERY_STRING"];

	include 'archive/perf-filter.php'; // for filtering events

	/*
		Treat "today" marker as tomorrow, as to not hide current shows.
		"Current" depends on performance time zone and time zone of viewer,
		which could be up to 24 hours.
	*/
	$today = date('ymd', strtotime('+1 days'));

	if ($showevents == 'featured') {
		$json_files = glob('*.json');
	}
	elseif ($showevents == 'archive') {
		$json_files = glob('archive/*.json'); //
	}
	else { // 'all': featured + archive
		$json_files = array_merge( glob('*.json'), glob('archive/*.json') );
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

	function extract_date($file, $end_date) {
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

	function get_json($file) {
		$contents = file_get_contents($file);
		// encode utf-8 here?
		return json_decode($contents, true);
	}

	function full_json_perf($date, $perf) {
		echo "
			<div class=\"row\">
				<header class=\"2u 3u(2) 12u$(4) date\">
					<h3>" . $date . "</h3>
					<p>" . $perf['time'] . "</p>
				</header>
				<section class=\"7u$ 9u$(2) 12u$(4)\">
					<header>
						<h3>";
		if( $perf['url'] ) {
		echo "<a class=\"perf-title\" href=\"" . $perf['url'] . "\">" . $perf['title'] . "</a>";
		}
		else { echo $perf['title']; }
		echo "</h3>
						<p>" . $perf['short'] . "</p>
					</header>
					<p>" . $perf['long'] . "</p>
					<p>" . $perf['address'] . "</p>
					<p>" . $perf['price'] . "</p>
				</section>
			</div>
		";
	}

	function short_json_perf($date, $perf) {
		echo "
			<div class=\"row\">
				<header class=\"2u 3u(2) 12u$(4) date\">
					<h4>" . $date . "</h4>
				</header>
				<section class=\"7u$ 9u$(2) 12u$(4)\">
					<header>
						<h4>";
		if( $perf['url']) { echo "<a class=\"perf-title\" href=\"" . $perf['url'] . "\">" . $perf['title'] . "</a>"; } else { echo $perf['title']; }
		echo "</h4>
					</header>
				</section>
			</div>
		";
	}

	function display_dates($file_list, $display) {
		$current_year = "";
		foreach($file_list as $file)
		{
			$perf = get_json($file);
			if($perf) { // skip if error, won't break page
				$end = $perf['endDate'];
				list ($date, $date_year) = extract_date($file, $end);
				if ($date_year != $current_year) { echo "<h3>" . $date_year . "</h3>"; }
				$current_year = $date_year;
				if($display == 'full') {
					full_json_perf($date, $perf); }
				elseif($display == 'short') {
					short_json_perf($date, $perf); }
			}
		}
	}

	if($upcoming_json) {
		echo "<h2>Upcoming</h2>"; // put within if statement: if display and events > 0
		display_dates($upcoming_json, $showupcoming);
	}

	if($past_json) {
		// "Recent" until more dates and "see more" can be added
		echo "<h2>Recent Past Performances</h2>"; // put within if statement: if display and events > 0
		display_dates($past_json, $showpast);
	}

?>

<!-- content -->
<?php $photo = 'Photo by Blake Bumpus.';
	include '../footer.php';?>

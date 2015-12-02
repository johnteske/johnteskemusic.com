<?php
	$title = 'Performances';
	$class = 'perf';
	include '../header.php';
	?>
<!-- content -->
<?php
// phpinfo();
	// $upcoming = array();
	// $past = array();

	$showevents = !empty($_GET['events']) ? $_GET['events'] : 'all';
	$showupcoming = !empty($_GET['upcoming']) ? $_GET['upcoming'] : 'full';
	$showpast = !empty($_GET['past']) ? $_GET['past'] : 'short';
	// echo $_SERVER["QUERY_STRING"];

	$today = date('ymd'); // how do I get this to display local time?
	// echo date('O, P, T');

	// if ($showevents == 'featured') {
		// $files = glob('../*.perf');
	// }
	// elseif ($showevents == 'archive') {
		// $files = glob('*.perf'); //
	// }
	// else { // 'all': featured + archive
		// $files = array_merge( glob('*.perf'), glob('../*.perf') );
	// }

//////// JSON //////
// eventually most of this can be an *include* so it will work with index and archive pages

	// get all the .json files, for testing
	$json_files = glob('*.json');

	// simple reverse (chronological) sort, for testing
	// rsort($json_files);


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

	// echo "<p>" . "TODAY" . "</p>";
	// echo $today;

	// echo "<p>" . "UPCOMING" . "</p>";
	$upcoming_json = array_filter($json_files, "check_future");
	// print_r($upcoming_json);

	// echo "<p>" . "PAST" . "</p>";
	$past_json = array_filter($json_files, "check_past");
	// print_r($past_json);

	function extract_date($file, $end_date) {
		$file_date = basename($file, '.json'); // get filename without extension
		$file_date = substr($file_date, 0, 6); // keep YYMMDD date, not description
		$start_date = date_create_from_format('ymd', $file_date);
		$date = $start_date->format('M j'); // formatted date
		if($end_date) {
			$end_date = date_create_from_format('y-m-d', $end_date);
			// can check here if same month // format('j')
			// can check here if same year (would also have to modify start_date) // format('M j, Y')
			$date .= "&ndash;" . $end_date->format('M j');
		}
		$date_year = $start_date->format('Y'); // for grouping by year
		return array ($date, $date_year);
	}

	function get_json($file) {
		$contents = file_get_contents($file);
		// encode utf-8 here?
		return json_decode($contents, true);
	}

	function short_json_perf($date, $perf) {
		// global $curyear;
		// if ( $dateyear != $curyear) {
		// 	echo "<h3 style=\"color: #888; \">" . $dateyear . "</h3>";
		// }
		// $curyear = $dateyear; // save this year to check next date

echo $date . " ";
		foreach ($perf as $item) {
			echo $item . " "; }
		echo "<br /><br />";

		// echo "
		// 			<div class=\"row\">
		// 				<header class=\"2u 3u(2) 12u$(4) date\">
		// 					<h4>" . $date . "</h4>
		// 				</header>
		// 				<section class=\"7u$ 9u$(2) 12u$(4)\">
		// 				<header>
		// 					<h4>";
		// if( $perf['url']) { echo "<a class=\"perf-title\" href=\"" .$perf['url'] . "\">" . $perf['title'] . "</a>"; } else { echo $perf['title']; }
		// echo "				</h4>
		// 				</header>
		// 				</section>
		// 			</div>
		// ";
	}

	$current_year = "";
	// echo "<p>---UPCOMING---</p>";
	echo "<h2>Upcoming</h2>"; // put within if statement
	foreach($upcoming_json as $file)
	{
		// echo "//" . basename($file) . "<br />";
		$perf = get_json($file);
		if($perf) { // skip if error, won't break page
			$end = $perf['endDate'];
			list ($date, $date_year) = extract_date($file, $end);
			if ($date_year != $current_year) { echo "<h3>" . $date_year . "</h3>"; }
			$current_year = $date_year;
			short_json_perf($date, $perf);
		}
	}

	$current_year = "";
	// echo "<p>---PAST---</p>";
	echo "<h2>Past Performances</h2>"; // put within if statement
	foreach($past_json as $file)
	{
		// echo "//" . basename($file) . "<br />";
		$perf = get_json($file);
		if($perf) { // skip if error, won't break page
			$end = $perf['endDate'];
			list ($date, $date_year) = extract_date($file, $end);
			if ($date_year != $current_year) { echo "<h3>" . $date_year . "</h3>"; }
			$current_year = $date_year;
			short_json_perf($date, $perf);
		}
	}

?>

<!-- content -->
<?php $photo = 'Photo by Blake Bumpus.';
	include '../footer.php';?>

<?php
	include '../util/include_with.php';
	include '../util/get_json.php';

	include_with('../header.php', array(
		'title' => 'Performances',
		'class' => 'perf'
	));
?>

<?php

	$showevents = !empty($_GET['events']) ? $_GET['events'] : 'featured';
	$showupcoming = !empty($_GET['upcoming']) ? $_GET['upcoming'] : 'full';
	$showpast = !empty($_GET['past']) ? $_GET['past'] : 'short';
	// echo $_SERVER["QUERY_STRING"];

	// include 'archive/perf-filter.php'; // for filtering events

	include 'json-crunch.php';
	include 'performance-dates.php';

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

<?php
	include_with('../footer.php', array(
		'photo' => 'Photo by Blake Bumpus'
	));
?>

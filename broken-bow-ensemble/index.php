<?php
	include '../util/include_with.php';
	// include '../util/get_json.php';
	include '../performances/json-crunch.php';
	include '../performances/performance-dates.php';

	include_with('../header.php', array(
		'title' => 'Broken Bow Ensemble',
		'class' => 'comp'
	));

	$perfpath = $_SERVER['DOCUMENT_ROOT'] . '/performances/';
	$json_files = glob($perfpath . '*-broken-bow.json');
	rsort($json_files);
?>

<article class="row">
	<p>
		The Broken Bow Ensemble is a 26-piece orchestra dedicated to performing contemporary classical music.
		The bows are broken, as are the expectations&mdash;starting anew and moving forward with the fragments that remain.
	</p>
</article>

<h2>Past performances</h2>

<?php
display_dates($json_files, 'short');

// TODO more details
// <!-- <a href="../performances/100214.html"> -->
// <!-- <a href="../performances/092113.html"> -->
// <!-- <a href="../performances/092912.html"> -->
?>

<?php
// TODO
// Funded in part by the Seattle Office of Arts & Culture CityArtists Project.<br />
// <img src="OAC_logoforweb[gray].png">
// <br/ >
?>

<?php
	include_with('../footer.php', array(
		'photo' => 'Image: still from <em>mer</em>, recorded by Ian Bell'
	));
?>

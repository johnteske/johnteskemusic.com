<?php
	$title = 'Performances';
	$class = 'perf';
	include '../header.php';?>
<!-- content -->
<?php
	$upcoming = array();
	$past = array();

	$showevents = !empty($_GET['events']) ? $_GET['events'] : 'all';
	$showupcoming = !empty($_GET['upcoming']) ? $_GET['upcoming'] : 'full';
	$showpast = !empty($_GET['past']) ? $_GET['past'] : 'short';
//  	echo $_SERVER["QUERY_STRING"];

	$today = date('ymd');
	
	if ($showevents == 'featured') {
		$files = glob('../*.perf');
	}
	elseif ($showevents == 'archive') {
		$files = glob('*.perf');
	}
	else { // 'all': featured + archive
		$files = array_merge( glob('*.perf'), glob('../*.perf') );
	}

	//rsort($files); // could work for featured only
	function cmp($a, $b) { return strcasecmp( basename($b), basename($a) ); }
	usort($files, "cmp"); // to maintain featured + archive file paths
	
	foreach($files as $item)
	{
		$filedate = basename($item);
//		$filedate = basename($item, ".perf");
	    if ( $today > $filedate ) {
	       array_push($past, $item);
// 	       echo "past" . "<br />";
	    } else {
			// better is I could pop from original array and push to upcoming
			// since I'm bound to have far more past events than upcoming
	    	//array_pop($files, $item);
	    	//unset( $files[$item] );
	        array_unshift($upcoming, $item);
// 	       echo "upcoming" . "<br />";
    	}
	};

?>

<?php
	function dateCrunch($file) {
// 		echo "<p>$file</p>";// just for debug
		$lines = file($file);
		$filedate = basename($file, ".perf");
		$filedate = substr($filedate, 0, 6); // date only, trim notes
		$startdate = date_create_from_format('ymd', $filedate );
		$dateyear = $startdate->format('Y');
		$enddate = trim( $lines[1] );
		if ( $enddate != "" ) {
			$enddate = date_create_from_format('y-m-d', $enddate );
			// at this point, check for same month, day, (year)
			$startdate = $startdate->format('M j'); 
			$enddate = $enddate->format('M j');
			$enddate = "&ndash;".$enddate;
		}
		else {
			$startdate = $startdate->format('M j');
		}
		return array ($lines, $startdate, $enddate, $dateyear);
	}
	
	function fullPerf($file) {
		global $curyear;
		list ($lines, $startdate, $enddate, $dateyear) = dateCrunch($file);
		// if this event is in a diff year, post the header first
		if ( $dateyear != $curyear) {
			echo "<h2 style=\"color: #888; \">" . $dateyear . "</h2>";
		}
		$curyear = $dateyear; // save this year to check next date

		echo "
					<div class=\"row\">
						<header class=\"2u 3u(2) 12u$(4) date\">
 							<h3>" . $startdate . $enddate . "</h3>
							<p>$lines[2]</p>
						</header>
						<section class=\"7u$ 9u$(2) 12u$(4)\">
						<header>
							<h3>";
		if( $lines[8] != '') { echo "<a class=\"perf-title\" href=\"$lines[8]\">$lines[3]</a>"; } else { echo $lines[3]; }
		echo "				</h3>						
							<p>
								$lines[4]
							</p>
						</header>
							<p>
								$lines[5]
							</p>
							<p>
								$lines[6]
							</p>
							<p>
								$lines[7]
							</p>
						</section>
					</div> 
		";
	}

	function shortPerf($file) {
		global $curyear;
		list ($lines, $startdate, $enddate, $dateyear) = dateCrunch($file);
		if ( $dateyear != $curyear) {
			echo "<h3 style=\"color: #888; \">" . $dateyear . "</h3>";
		}
		$curyear = $dateyear; // save this year to check next date

		echo "
					<div class=\"row\">
						<header class=\"2u 3u(2) 12u$(4) date\">
 							<h4>" . $startdate . $enddate . "</h4>
						</header>
						<section class=\"7u$ 9u$(2) 12u$(4)\">
						<header>
							<h4>";
		if( $lines[8] != '') { echo "<a class=\"perf-title\" href=\"$lines[8]\">$lines[3]</a>"; } else { echo $lines[3]; }
		echo "				</h4>						
						</header>
						</section>
					</div> 
		";
	}
	
	// do the loop
	$curyear = 0;
	if ($showupcoming != 'none' && sizeof($upcoming) > 0) { // also checks if any upcoming shows
		echo "<h2>Upcoming</h2>";
		foreach ($upcoming as $file_num => $file):
			if($showupcoming == 'full') {
				fullPerf($file);
			}
			elseif($showupcoming == 'short') {
				shortPerf($file);
			}
		endforeach;
	}
	// do the loop
	$curyear = 0;
	if ($showpast != 'none') {
	echo "<h2>Past Performances</h2>";
		foreach ($past as $file_num => $file):
			if($showpast == 'full') {
				fullPerf($file);
			}
			elseif($showpast == 'short') {
				shortPerf($file);
			}
		endforeach;
	}
?>
				</div> <!-- upcoming -->
<!-- content -->
<?php $photo = 'Photo by Blake Bumpus.';
	include '../footer.php';?>
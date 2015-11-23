<?php
	$title = 'Performances';
	$class = 'perf';
	include '../header.php';?>
<!-- content -->
<?php
	$today = date('ymd');
	$files = glob('*.perf');
	$upcoming = array();
	$past = array();
	rsort($files);

	foreach($files as $item)
	{
	    if ( $today > $item ) {
	       array_push($past, $item);
	    } else {
// better is I could pop from original array and push to upcoming
	    	//array_pop($files, $item);
	    	//unset( $files[$item] );
	        array_unshift($upcoming, $item);
    	}
	};
	//sort($upcoming);
?>
				<div class="row">
					<section class="9u$ 12u$(2)">
					<header>
						<h2>Upcoming Performances</h2>
					</header>
					</section>
				</div>
				<div class="upcoming">
<?php
	foreach ($upcoming as $file_num => $file):
		$lines = file($file);
		$thisdate = date_create_from_format('y-m-d', chop($lines[0]) );
		?>
					<div class="row">
						<header class="2u 3u(2) 12u$(4) date">
 							<h3><?php echo $thisdate->format('M j'); ?><?php echo $lines[1]; ?></h3> <!-- if end date -->
 							<!-- <h3><?php echo $lines[0]; ?><?php echo $lines[1]; ?></h3> -->
							<p><?php echo $lines[2]; ?></p>
						</header>
						<section class="7u$ 9u$(2) 12u$(4)">
						<header>
							<h3><a class="perf-title" href="<?php echo $lines[8]; ?>"><?php echo $lines[3]; ?></a></h3>						
							<p><?php echo $lines[4]; ?></p>
						</header>
							<p>
								<?php echo $lines[5]; ?>
							</p>
							<p>
								<?php echo $lines[6]; ?>
							</p>
							<p>
								<?php echo $lines[7]; ?>
							</p>
						</section>
					</div> 
<?php endforeach; ?>
				</div>
				<div class="row">
					<section class="9u$ 12u$(2)">
					<header>
						<h2>Notable Past Performances</h2>
					</header>
					</section>
				</div>
				<div class="past">
<?php
	foreach ($past as $file_num => $file):
		$lines = file($file);
		$thisdate = date_create_from_format('y-m-d', chop($lines[0]) );
		$enddate = date_create_from_format('y-m-d', chop($lines[1]) );
		if ( get_class($enddate) == 'DateTime' ) {
			// echo '<p>is a date</p>';
			// echo get_class($enddate) . "<br />";
			// print_r($enddate);
			echo $enddate->format('M j, Y');
		}
		?>
					<div class="row">
						<header class="2u 3u(2) 12u$(4) date">
 							<!-- <h4><?php echo $thisdate->format('M j, Y'); ?><?php echo $thisdate->format('M j, Y'); ?></h4> -->
 							<h4><?php echo $thisdate->format('M j, Y'); ?><?php echo $lines[1]; ?></h4>
						</header>
						<section class="7u$ 9u$(2) 12u$(4)">
						<header>
							<h4><a class="perf-title" href="<?php echo $lines[8]; ?>"><?php echo $lines[3]; ?></a></h4>
						</header>
 					</section>
					</div> 
<?php endforeach; ?>
				</div>

<!-- content -->
<?php $photo = 'Photo by Blake Bumpus.';
	include '../footer.php';?>
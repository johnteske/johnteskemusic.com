<?php
	$title = 'John Teske';
	$class = 'home';
	include 'header.php';?>
<!-- content -->
				<div class="row 200%">
					<div class="6u 12u$(2) 12u$(3)">
<!-- 					<div class="4u 12u$(2) 12u$(3)"> -->
						<header class="not-medium">
							<h2>
								<a href="about.php">
								About
								</a>
							</h2>
						</header>
						<p>
							Seattle-based composer John Teske writes contemporary concert music for soloists, chamber groups, and chamber orchestra.
							He focuses on enhancing the listener experience, utilizing extended techniques and guided improvisation to create pieces that are crafted while maintaining an organic feel.
						</p>
					</div>
<?php
	$upcoming = array();
	$today = date('ymd');
	$files = glob('performances/*.perf');
	rsort($files);

	foreach($files as $item)
	{
		$filedate = basename($item, ".perf");
		$filedate = substr($filedate, 0, 6); // date only, trim notes
	    if ( $today > $filedate ) {
	    } else {
	        array_unshift($upcoming, $item);
    	}
	};

function upcomingPerf($pindex=0) {
		global $upcoming;
		$file = $upcoming[$pindex];
		$lines = file($file); 
		$filedate = basename($file, ".perf");
		$filedate = substr($filedate, 0, 6); // date only, trim notes
		$startdate = date_create_from_format('ymd', $filedate );

$content = $lines[5];
// this assumes there is at least 100 char
// $pos=strpos($content, '. ', 100);
// $shortstring = substr($content,0,$pos ); 
// . "." // add punctuation here, if any
$shortstring = $content; // fix for now

		echo "
						<h3>
							<a href=\"performances/\">" . $startdate->format('F j') . " | " . $lines[3] . "</a>
						</h3>
						<p>
							" . $lines[4] . "
							<br />
							<br />
							" . $shortstring . "
						</p>" . PHP_EOL;
};
?>

					<div class="6u 12u$(2) 12u$(3)">
<!-- 					<div class="4u 6u(2) 12u$(3)"> -->
<?php if(count($upcoming) > 0): ?>
						<header>
							<h2>
								<a href="performances/">
								Upcoming
								</a>
							</h2>
						</header>
						<?php upcomingPerf() ?>
					</div>
<?php else: ?>
						<header>
	 					<h2>Featured Work</h2>
						</header>
						<div class="embed">
							<iframe src="http://player.vimeo.com/video/103194193?byline=0&amp;portrait=0&amp;color=B3B3B3" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
						</div>
<?php endif ?>

<!--
					<div class="4u 6u(2) 12u$(3)">
						<header class="not-small">
							<h2>&nbsp;</h2>
						</header>
						<?php // upcomingPerf(1) ?>
						<p>
<em>&ldquo;Teske is quickly revealing himself as one of the city's most innovative experimental young artists.&rdquo;</em>
						</p>
						<p style="text-align:right">
							&mdash; Kaia Chessen, <em>The Stranger</em>
						</p>
					</div>
				</div>
-->
<script>
	$(window).scroll(function() {
	    if ($(document).scrollTop() > 85 && !(skel.isActive('medium')))
	    {
	        $('#logo').addClass("min").addClass("anim");
	        $('#nav').addClass("min").addClass("anim").removeClass("animdown");
	    }
	    else {
	        $('#logo').removeClass("min");
	        $('#nav').removeClass("min").addClass("animdown");            
	    }
	});
</script>

<!-- content -->
<?php $photo = 'Image: still from <em>mer</em>, recorded by Ian Bell.';
	include 'footer.php';?>
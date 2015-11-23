<?php
	$title = 'John Teske';
	$class = 'home';
	include 'header_hometest.php';?>
<!-- content -->
<script>
		// $(function() {
		// var	$window = $(window),
		// 	$body = $('body'),
		// 	$header = $('#header'),
		// 	$all = $body.add($header);

		// 	$all
		// 		.addClass('is-loading')
		// 		.fadeTo(0, 0.0001);
			
		// 	$window.load(function() {
		// 		window.setTimeout(function() {
		// 			$all
		// 				.fadeTo(1000, 1, function() {
		// 					$body.removeClass('is-loading');
		// 					$all.fadeTo(0, 1);
		// 				});
		// 		}, 1000);
		// 	});
		// });
</script>
				<div class="row">
					<div class="4u 12u$(2) 12u$(3)">
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
							<!-- <span class="not-medium"><br /><br /></span> -->
							<!-- <a href="about.php">Read more&hellip;</a> -->
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

		echo "
						<h3>
							<a href=\"performances/\">" . $startdate->format('F j') . ", " . $lines[2] . "</a>
						</h3>
						<p>
							" . $lines[3] . "
							<br />
							" . $lines[4] . "
						</p>" . PHP_EOL;
};
?>

					<div class="4u 6u(2) 12u$(3)">
						<header>
							<h2>
								<a href="performances/">
								Upcoming
								</a>
							</h2>
						</header>
						<?php upcomingPerf(0) ?>
					</div>
					<div class="4u 6u(2) 12u$(3)">
						<header class="not-small">
							<h2>&nbsp;</h2>
						</header>
<!-- 						<?php // upcomingPerf(1) ?> -->
					</div>
				</div>

				<!-- recent press -->
				<article class="row">
<!--
					<header class="12u$">
						<h2>Recent press</h2>
					</header>
-->
					<section class="12u">
<!-- 					<section class="8u 8u(2) 12u$(3)"> -->
						<p>
							<em>&ldquo;Teske is quickly revealing himself as one of the city's most innovative experimental young artists.&rdquo;</em>
							<br />
							&mdash; Kaia Chessen, The Stranger
						</p>
<!--
						<p>
							<a href="press/" class="button">Read more</a>
						</p>
-->
					</section>
				</article>	
				
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
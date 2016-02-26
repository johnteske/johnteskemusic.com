<?php
	$title = 'John Teske';
	$class = 'home';
	include 'header.php';?>
<!-- content -->
				<div class="row 200%">
					<div class="6u 12u$(2) 12u$(3)">
<!-- 				<div class="4u 12u$(2) 12u$(3)"> -->
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
	$showevents = 'featured';
	include 'performances/json-crunch.php';

	function home_json_perf($date, $perf) {
		echo "
			<div class='12u'>
				<header>
				<h4>";
// 				if( $perf['url']) { echo "<a class=\"perf-title\" href=\"" . $perf['url'] . "\">"; }
				echo "<a class='perf-title' href='/performances/'>";
					echo $date . " | " . $perf['title'];
				echo "</a>";
// 				if( $perf['url']) { echo "</a>"; }
				echo "</h4>
				</header>
				<section>
					<p>" . $perf['short'] . "</p>
				</section>
			</div>
		";
	}

	function display_home($file_list) {
		// $current_year = "";
		foreach($file_list as $file)
		{
			$perf = get_json($file);
			if($perf) { // skip if error, won't break page
				$end = $perf['endDate'];
				list ($date, $date_year) = extract_date($file, $end);
				// if ($date_year != $current_year) { echo "<h3>" . $date_year . "</h3>"; }
				// $current_year = $date_year;
				// if($display == 'full') {
					home_json_perf($date, $perf); //}
				// elseif($display == 'short') {
					// short_json_perf($date, $perf); }
			}
		}
	}

	if(count($upcoming_json) > 0) {
		echo "<div class='6u 12u$(2) 12u$(3)'>";
		echo "<h2><a href='performances/'>Upcoming</a></h2>";
		display_home(array_slice($upcoming_json, 0, 2)); // show next TWO performances
		echo "</div>";
	}
	else {
		echo "
			<div class='6u 12u$(2) 12u$(3)'>
			<!-- <div class='4u 6u(2) 12u$(3)'> -->
				<header>
					<h2>Featured Work</h2>
				</header>
				<div class='embed'>
					<iframe src='http://player.vimeo.com/video/103194193?byline=0&amp;portrait=0&amp;color=B3B3B3' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				</div>
			</div>
		";
	}

 ?>
				</div><!-- end row -->
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

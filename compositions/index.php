<?php
	$title = 'Compositions';
	$class = 'comp';
	include '../header.php';?>
<!-- content -->
<?php
	// same as compositions
	function get_json($file) {
		$contents = file_get_contents($file);
		// encode utf-8 here?
		return json_decode($contents, true);
	}

	function display_works($file_loc) {
		$file_list = glob($file_loc . '/*.json');
		rsort($file_list);
		$current_year = "";
		foreach($file_list as $file)
		{
			$work = get_json($file);
			if($work) { // skip if error, won't break page
				$file_date = basename($file, '.json'); // get filename without extension
				$file_date = substr($file_date, 0, 4); // keep date
				if ($file_date != $current_year) { echo '<div class="row piece">'; } else { echo '<div class="row piece sameyear">'; }
					echo '<div class="1u 2u(3)">' . $file_date . '</div>';
					echo '<div class="3u 5u(3) title">' . $work['title'] . '</div>';
					echo '<div class="3u 5u(3)">' . $work['instrumentation']['short'] . '</div>';
					// '<span id="full-inst" style="display: initial; min-height:0;">' . $work['instrumentation']['long'] . '</span>';
					echo '<div class="1u not-small">';
						if($work['duration']['minutes']){echo $work['duration']['minutes'] . '&prime;';}
						if($work['duration']['seconds']){echo $work['duration']['seconds'] . '&Prime;';}
					echo '</div>';
					echo '<div class="2u not-small">';
						if($work['links']['audio']){echo '<a href="' . $work['links']['audio'] . '">audio</a>';}
					echo '</div>';
					echo '<div class="2u not-small">' ;
						if($work['links']['audio']){echo '<a href="' . $work['links']['video'] . '">video</a>';}
					echo '</div>';
					// echo '<div class="1u 2u(3) not-small">' ;
					// 	if($work['links']['score']){echo '<a href="' . $work['links']['score'] . '">score</a>';}
					// echo '</div>';
					// echo '<div class="1u 2u(3) not-small">' .
					// 	'<a href="#">listen</a>' .
					// '</div>';
				echo '</div>';
				$current_year = $file_date;
			}
		}
	}
?>

<div class="row">
	<div class="12u$">
		<h2>Featured Works</h2>
	</div>
	<div class="6u 12u$(2) 12u$(3)">
		<div class="embed">
			<iframe src="http://player.vimeo.com/video/103194193?byline=0&amp;portrait=0&amp;color=B3B3B3" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		</div>
	</div>
	<div class="6u 12u$(2) 12u$(3)">
		<div class="embed">
			<iframe src="http://player.vimeo.com/video/78482902?byline=0&amp;portrait=0&amp;color=B3B3B3" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		</div>
	</div>
</div>

<section class="complist">
	<header>
		<h2>Large Ensemble</h2>
		<p>7+ players</p>
	</header>
	<?php display_works('large-ensemble'); ?>
</section>
<section class="complist">
	<header>
		<h2>Any Ensemble</h2>
	</header>
	<?php display_works('any-ensemble'); ?>
</section>
<section class="complist">
	<header>
		<h2>Small Ensemble</h2>
		<p>2&ndash;6 players</p>
	</header>
	<?php display_works('small-ensemble'); ?>
</section>
<section class="complist">
	<header>
		<h2>Solo</h2>
	</header>
	<?php display_works('solo'); ?>
</section>
<section class="complist">
	<header>
		<h2>Electroacoustic and Sound Design</h2>
	</header>
	<?php display_works('electroacoustic'); ?>
</section>
<section class="complist">
	<header>
		<h2>Collaborations</h2>
	</header>
	<?php display_works('collaborations'); ?>
</section>

<!--
				<p id="bio-but" class="button">Full instrumentation</p>
				<script>
					$( "#bio-but" ).click(function() {
				      if ( $( "#full-inst" ).is( ":hidden" ) ) {
					    $( "#full-inst" ).slideDown(500);
					  $( "#bio-but" ).text("Less info");
					  } else {
					    $( "#full-inst" ).slideUp(500);
					  $( "#bio-but" ).text("Full instrumentation");
					  }
					});
				</script>
 -->
<!-- 				<section>
					<header>
						<h2>Discography</h2>
					</header>
				</section>
 --><!--
Space Weather Listening Booth (2013)
Our Century 21 (2012)
Embers of Discontent (2012)
wheel (2011)
Honeymoon (2011)
Unused Lexical Variable (2008)
 -->
				<section>
					<header>
						<h2>More recordings</h2>
					</header>
						<ul class="fa-ul">
							<li><a href="http://vimeo.com/johnteske"><i class="fa-li fa fa-vimeo-square"></i>Vimeo</a></li>
							<li><a href="https://soundcloud.com/johnteske"><i class="fa-li fa fa-soundcloud"></i>Soundcloud</a></li>
							<li><a href="http://www.youtube.com/JohnTeske"><i class="fa-li fa fa-youtube-play"></i>YouTube</a></li>
							<!-- <li><a href="#"><i class="fa-li fa fa-soundcloud"></i>Bandcamp</a></li> -->
						</ul>
				</section>

<!-- content -->
<?php $photo = 'Image: still from <em>mer</em>, recorded by Ian Bell';
	include '../footer.php'; ?>

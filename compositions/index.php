<?php
	$title = 'Compositions';
	$class = 'comp';
	include '../header.php';
?>

<?php
	// TODO create common get_json function?
	function get_json($file) {
		$contents = file_get_contents($file);
		// TODO encode utf-8?
		return json_decode($contents, true);
	}

	function display_works($file_loc, $section_title, $section_subtitle) {
		echo '<section class="complist">' .
			'<header>' .
				'<h2>' . $section_title . '</h2>' .
				'<p>' . $section_subtitle . '</p>' .
			'</header>';

		$file_list = glob($file_loc . '/*.json');
		rsort($file_list);

		$current_year = "";

		foreach($file_list as $file) {
			$work = get_json($file);

			// Guard against invalid JSON errors
			if ($work) {
				// Extract date from filename
				$file_date = substr(basename($file, '.json'), 0, 4);

				if ($file_date != $current_year) { echo '<div class="row piece">'; } else { echo '<div class="row piece sameyear">'; }
					echo '<div class="1u 2u(3)">' . $file_date . '</div>';
					echo '<div class="3u 5u(3) title">' . $work['title'] . '</div>';
					echo '<div class="3u 5u(3)">' . $work['instrumentation']['short'] . '</div>';
					// TODO long instrumentation

					echo '<div class="2u not-small">';
						if ($work['duration']['minutes']){echo $work['duration']['minutes'] . '&prime;';}
						if ($work['duration']['seconds']){echo $work['duration']['seconds'] . '&Prime;';}
						echo '&#8203;';
					echo '</div>';

					echo '<div class="1u not-small comp-link">';
						if ($work['links']['audio']){echo '<a href="' . $work['links']['audio'] . '"><i class="fa fa-volume-up"></i></a>';}
					echo '</div>';

					echo '<div class="1u not-small comp-link">' ;
						if ($work['links']['video']){echo '<a href="' . $work['links']['video'] . '"><i class="fa fa-youtube-play"></i></a>';}
					echo '</div>';

					// TODO add score links
				echo '</div>';
				$current_year = $file_date;
			}
		}

		echo '</section>';
	}
?>

<div class="row">
	<div class="12u$">
		<h2>Featured Works</h2>
	</div>
	<div class="6u 12u$(3)">
		<div class="embed">
			<iframe src="http://player.vimeo.com/video/103194193?byline=0&amp;portrait=0&amp;color=B3B3B3" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		</div>
	</div>
	<div class="6u 12u$(3)">
		<div class="embed">
			<iframe src="http://player.vimeo.com/video/78482902?byline=0&amp;portrait=0&amp;color=B3B3B3" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		</div>
	</div>
</div>

<?php
	display_works('large-ensemble', 'Large Ensemble', '7+ players');
	display_works('any-ensemble', 'Any Ensemble');
	display_works('small-ensemble', 'Small Ensemble', '2&ndash;6 players');
	display_works('solo', 'Solo');
	display_works('electroacoustic', 'Electroacoustic and Sound Design');
	display_works('collaborations', 'Collaborations');
?>

<?php
// TODO Discography
// Space Weather Listening Booth (2013)
// Our Century 21 (2012)
// Embers of Discontent (2012)
// wheel (2011)
// Honeymoon (2011)
// Unused Lexical Variable (2008)
?>

<section>
	<header>
		<h2>More recordings</h2>
	</header>
		<ul class="fa-ul">
			<li><a href="http://vimeo.com/johnteske"><i class="fa-li fa fa-vimeo-square"></i>Vimeo</a></li>
			<li><a href="https://soundcloud.com/johnteske"><i class="fa-li fa fa-soundcloud"></i>Soundcloud</a></li>
			<li><a href="http://www.youtube.com/JohnTeske"><i class="fa-li fa fa-youtube-play"></i>YouTube</a></li>
			<?php // <li><a href="#"><i class="fa-li fa fa-soundcloud"></i>Bandcamp</a></li> ?>
		</ul>
</section>

<?php
	$photo = 'Image: still from <em>mer</em>, recorded by Ian Bell';
	include '../footer.php';
?>

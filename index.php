<?php
include 'util/include_with.php';
include 'util/get_json.php';
$showevents = 'featured';
include 'performances/json-crunch.php';

include_with('header.php', array(
	'title' => 'John Teske',
	'class' => 'home'
));
?>

<div class="row 200%">
	<div class="6u 12u$(2) 12u$(3)">
		<header class="not-medium">
			<h2>
				<a href="about.php">About</a>
			</h2>
		</header>
		<p><?php echo get_json('bio.json')['short'] ?></p>
	</div>

<?php

// TODO display year if needed
// TODO date range if needed
function home_json_perf($date, $perf) {
	return <<<EOT
		<div class="12u">
			<header>
				<h4>
					<a class="perf-title" href="/performances/">
						{$date} | {$perf['title']}
					</a>
				</h4>
			</header>
			<section>
				<p>{$perf['short']}</p>
			</section>
		</div>
EOT;
}

	function display_home($file_list) {
		foreach($file_list as $file) {
			$perf = get_json($file);
			if ($perf) { // skip if error, won't break page
				list ($date, $date_year) = extract_date($file);
				echo home_json_perf($date, $perf);
			}
		}
	}
?>

<?php if (count($upcoming_json) > 0) { ?>
	<div class="6u 12u$(2) 12u$(3)">
		<h2><a href="performances/">Upcoming</a></h2>
		<?php display_home(array_slice($upcoming_json, 0, 2)) ?>
	</div>
<?php } else { ?>
	<div class="6u 12u$(2) 12u$(3)">
		<header>
			<h2>Featured Work</h2>
		</header>
		<div class="embed">
			<iframe src="http://player.vimeo.com/video/103194193?byline=0&amp;portrait=0&amp;color=B3B3B3" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
		</div>
	</div>
<?php } ?>

</div><!-- end row -->

<script>
	$(window).scroll(function() {
		if (skel.isActive('medium')) {
			return;
		}

		var shouldAnimate = $(document).scrollTop() > 85;
		$('#logo, #nav').toggleClass('min', shouldAnimate).toggleClass('anim', shouldAnimate);
		$('#nav').toggleClass('animdown', !shouldAnimate);
	});
</script>

<?php
	include_with('footer.php', array(
		'photo' => 'Image: still from <em>mer</em>, recorded by Ian Bell'
	));
?>

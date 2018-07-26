<?php
	include '../forest-show-ravenna.php';

	$title = 'Forest Show';
	$class = 'perf';
	include '../../header.php';?>

<div class="row">
	<header class="2u 3u(2) 12u$(4) date">
		<h3>Jul 30, 2016</h3>
		<p>7:30&ndash;8:46 pm
		</p>
	</header>
	<section class="7u$ 9u$(2) 12u$(4)">
	<header>
		<h3>secret forest show
		</h3>
		<p>
			John Teske and Neil Welch
		</p>
	</header>
		<p>
Neil Welch and I present our sixth 'secret forest show' among the trees in Seattle.

John will present a version of <em>nomadic patterns</em>, where he leads the performer-audience in an exploratory sonic investigation of the environment.

Neil will present a solo piece, followed by <em>Concepcion Picciotto</em>, for 10 musicians, birds, and orator. Featuring Kate Olson, Ivan Arteaga, Evan Smith, Heather Bentley, Aria Peters, David Balatero, John Teske, Janna Webbon, Sarah Pyle, and Jen Gilleran.
		</p>
		<p>
			Seattle, WA
		</p>
	</section>
</div>

<style>
	.centerd {
		text-align: center;
		font-style: italic;
		margin-bottom: 1em;
	}
	.forest h3 {
		margin: 0 0 0.5em 0;
	}
</style>

<!-- <link rel="stylesheet" href="glob/score.css"> -->
<!-- <link rel="stylesheet" href="glob/styles.css"> -->

<h2>Location and Directions</h2>
<div class="row centerd">
	<div class="-4u 4u$">
		<img src="../forest-show-5/grey.jpg" class="image fit">
		<p>The walk takes about 15&nbsp;minutes.</p>
	</div>
</div>
<div class="forest">
	<div class="row">
	<?php
			$map_directions = 'Begin at the Cowen Park entrance on ' .
				'<a href="https://goo.gl/maps/XDLt7" target="_blank" title="View on Google maps" style="text-decoration: underline;">' .
					'NE 61st and Brooklyn Ave NE' .
				'</a>';
		?>
		<?php echo_direction(
			$map_directions,
			'150718-1.jpg')
		?>

		<?php echo_direction(
			'Take a left at the sign, head down into the ravine',
			'150718-2.jpg')
		?>

		<?php echo_direction(
			'Continue straight on the trail, pass under the 15th Ave bridge',
			'150718-3.jpg')
		?>
	</div>
	<div class="row centerd">
		<div class="-4u 4u$">
	        <!-- <svg class="main image fit"></svg> -->
			<img src="../forest-show-5/cloud.png" class="image fit">
			<p>Listen to the path.</p>
		</div>
	</div>
	<div class="row">	
	<?php echo_direction(
			'Continue straight across the footbridge',
			'150718-4.jpg')
		?>

		<?php echo_direction(
			'Pass the wooden steps on the left',
			'150718-5.jpg')
		?>

		<?php echo_direction(
			'Notice the clearing to the left',
			'150718-6.jpg')
		?>
	</div>
	<div class="row centerd">
		<div class="-4u 4u$">
			<img src="../forest-show-5/phrase.png" class="image fit">
		</div>
	</div>	
	<div class="row">	
		<?php echo_direction(
			'Enter, walk toward the wooden bridge',
			'150718-7.jpg')
		?>

		<?php echo_direction(
			'Cross the small stream',
			'150718-8.jpg')
		?>

		<?php echo_direction(
			'Take a left into the performance area',
			'150718-9.jpg')
		?>
	</div>
	<div class="row centerd">
		<div class="-4u 4u$">
			<img src="../forest-show-5/stacc.png" class="image fit">
		</div>
	</div>
</div>
<!-- <script src="//d3js.org/d3.v3.min.js" charset="utf-8"></script> -->
<!-- <script src="glob/script.js" charset="utf-8"></script> -->

<?php $photo = 'Photo by Blake Bumpus.';
	include '../../footer.php';?>
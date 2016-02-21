<?php
	$title = 'Compositions';
	$class = 'comp';
	include '../header.php';?>
<!-- content -->
<?php
	$cyear = '<div class="1u 2u(3)">';
	$ctitle = '<div class="3u 4u(3) 5u(4) title">';
	// $cinst = '<div class="3u 4u(3) not-xsmall">';
	// handle this a different way
	$cinst = '<div class="3u 4u(3) 5u(4)">';
	$cdur = '<div class="1u 2u(3) not-xsmall">';
	$link1 = '<div class="1u 2u(3) -2u(3) not-small">';
	$link2 = '<div class="1u 2u(3) not-small">';
	$link3 = $link2;
	$link4 = $link2;
?>
<?php
	// same as compositions
	function get_json($file) {
		$contents = file_get_contents($file);
		// encode utf-8 here?
		return json_decode($contents, true);
	}

	$json_files = glob('large-ensemble/*.json');
	// print_r($json_files);

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
				// if ($file_date != $current_year) { echo '<div class="year">'; }
				if ($file_date != $current_year) { echo '<div class="row piece">'; } else { echo '<div class="row piece sameyear">'; }
				echo '<div class="1u 2u(3)">';
				// if ($file_date != $current_year) { echo $file_date; } else { echo '&nbsp;'; }
				echo $file_date;
				echo '</div>';
				echo '<div class="3u 4u(3) 5u(4) title">';
				// echo '<a href="#">';
				echo $work['title'];
				// echo '</a>';
				echo '</div>';
				echo '<div class="3u 4u(3) 5u(4)">' . $work['instrumentation']['short'];
				// echo '<br />' .
				// 	'<span id="full-inst" style="display: initial; min-height:0;">' . $work['instrumentation']['long'] . '</span>';
				echo '</div>';
				echo '<div class="1u 2u(3) not-xsmall">';
					if($work['duration']['minutes']){echo $work['duration']['minutes'] . '&prime;';}
					if($work['duration']['seconds']){echo $work['duration']['seconds'] . '&Prime;';}
				echo '</div>';
				echo '<div class="1u 2u(3) -2u(3) not-small">';
					if($work['links']['audio']){echo '<a href="' . $work['links']['audio'] . '">audio</a>';}
				echo '</div>';
				echo '<div class="1u 2u(3) not-small">' ;
					if($work['links']['audio']){echo '<a href="' . $work['links']['video'] . '">video</a>';}
				echo '</div>';
				echo '<div class="1u 2u(3) not-small">' ;
					if($work['links']['score']){echo '<a href="' . $work['links']['score'] . '">score</a>';}
				echo '</div>';
				// echo '<div class="1u 2u(3) not-small">' .
				// 	'<a href="#">listen</a>' .
				// '</div>';
				echo '</div>';
				// if ($file_date != $current_year) { echo '</div>'; }
				$current_year = $file_date;
			}
		}
	}
?>
<section class="complist">
	<header>
		<h2>Large Ensemble</h2>
		<p>7+ players</p>
	</header>
	<?php display_works('large-ensemble/'); ?>
</section>
<section class="complist">
	<header>
		<h2>Any Ensemble</h2>
	</header>
	<?php display_works('any-ensemble/'); ?>
</section>
<!--  -->
<!--  -->
<!--  -->
				<div class="row">
					<div class="12u$">
	 					<h2>Featured Works</h2>
					</div>
					<div class="6u 12u$(2) 12u$(3)">
<!-- 						<header>
							<h2><em>facets</em></h2>
						</header>
 -->						<!-- <p>And embedded audio/video content. Amet accumsan magna etiam orci faucibus interdum et lorem ipsum dolor sit amet nullam consequat volutpat.</p> -->
						<div class="embed">
							<iframe src="http://player.vimeo.com/video/103194193?byline=0&amp;portrait=0&amp;color=B3B3B3" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
						</div>
					</div>
					<div class="6u 12u$(2) 12u$(3)">
<!-- 						<header>
							<h2><em>mer</em></h2>
						</header>
 -->						<!-- <p>And embedded audio/video content. Amet accumsan magna etiam orci faucibus interdum et lorem ipsum dolor sit amet nullam consequat volutpat.</p> -->
						<div class="embed">
							<iframe src="http://player.vimeo.com/video/78482902?byline=0&amp;portrait=0&amp;color=B3B3B3" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
						</div>
					</div>
				</div>

<!--
				<div class="row">
					<div class="4u 12u$(2) 12u$(3)">
						<header>
							<h2><em>mer</em></h2>
						</header>
						<p>And embedded audio/video content. Amet accumsan magna etiam orci faucibus interdum et lorem ipsum dolor sit amet nullam consequat volutpat.</p>
						<div class="embed">
							<iframe src="http://player.vimeo.com/video/78482902?byline=0&amp;portrait=0&amp;color=B3B3B3" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
						</div>
					</div>
					<div class="4u 6u(2) 12u$(3)">
						<header>
							<h2>Featured work</h2>
						</header>
						<p>And embedded audio/video content. Amet accumsan magna etiam orci faucibus interdum et lorem ipsum dolor sit amet nullam consequat volutpat.</p>
						<span class="image fit"><img src="images/pic01.jpg" alt="" /></span>
					</div>
					<div class="4u 6u$(2) 12u$(3)">
						<header>
							<h2>Featured work</h2>
						</header>
						<p>And embedded audio/video content. Amet accumsan magna etiam orci faucibus interdum et lorem ipsum dolor sit amet nullam consequat volutpat.</p>
						<span class="image fit"><img src="images/pic01.jpg" alt="" /></span>
					</div>
				</div>
 -->
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
 				<!-- <h2>All Works</h2> -->
 				<!-- <p>click to see inst</p> -->
 				<section class="complist">
					<header>
						<!-- <h3>Large Ensemble</h3> -->
						<h2>Large Ensemble</h2>
						<p>7+ players</p>
					</header>

					<div class="year">
						<div class="row piece">
							<?php echo $cyear; ?>
								2014
							</div>
							<?php echo $ctitle; ?>
		 						<!-- <a href="min.php"> -->
		 							min
		 						<!-- </a> -->
		 					</div>
							<?php echo $cinst; ?>
								chamber orchestra<br />
								<em id="full-inst" style="display: none; min-height:0;">ALL THE INSTZ</em>
							</div>
							<?php echo $cdur; ?>
								45&prime;
							</div>
							<?php echo $link1; ?>
								<!-- <a href="#">audio</a> -->&nbsp;
							</div>
							<?php echo $link2; ?>
								<!-- <a href="#">video</a> -->&nbsp;
							</div>
							<?php echo $link3; ?>
								<!-- <a href="#">score</a> -->&nbsp;
							</div>
							<?php echo $link4; ?>
								<!-- <a href="#">listen</a> -->&nbsp;
							</div>
						</div>
					</div>
					<div class="year">
						<div class="row piece">
							<?php echo $cyear; ?>
								2013
							</div>
							<?php echo $ctitle; ?>
		 						<!-- <a href="mer.php"> -->
		 							mer
		 						<!-- </a> -->
		 					</div>
							<?php echo $cinst; ?>
								chamber orchestra
							</div>
							<?php echo $cdur; ?>
								45&prime;
							</div>
							<?php echo $link1; ?>
								<!-- <a href="#">audio</a> -->&nbsp;
							</div>
							<?php echo $link2; ?>
								<!-- <a href="#">video</a> -->&nbsp;
							</div>
							<?php echo $link3; ?>
								<!-- <a href="#">score</a> -->&nbsp;
							</div>
							<?php echo $link4; ?>
								<!-- <a href="#">listen</a> -->&nbsp;
							</div>
						</div>
					</div>
					<div class="year">
						<div class="row piece">
							<?php echo $cyear; ?>
								2012
							</div>
							<?php echo $ctitle; ?>
		 						<!-- <a href="murmur.php"> -->
		 							murmur
		 						<!-- </a> -->
		 					</div>
							<?php echo $cinst; ?>
								chamber orchestra
							</div>
							<?php echo $cdur; ?>
								45&prime;
							</div>
							<?php echo $link1; ?>
								<!-- <a href="#">audio</a> -->&nbsp;
							</div>
							<?php echo $link2; ?>
								<!-- <a href="#">video</a> -->&nbsp;
							</div>
							<?php echo $link3; ?>
								<!-- <a href="#">score</a> -->&nbsp;
							</div>
							<?php echo $link4; ?>
								<!-- <a href="#">listen</a> -->&nbsp;
							</div>
						</div>
						<div class="row piece">
							<?php echo $cyear; ?>
								2012
							</div>
							<?php echo $ctitle; ?>
		 						<!-- <a href="ffiinniiss.php"> -->
		 							ffiinniiss
		 						<!-- </a> -->
		 					</div>
							<?php echo $cinst; ?>
								chamber orchestra
							</div>
							<?php echo $cdur; ?>
								5&prime;30&Prime;
							</div>
							<?php echo $link1; ?>
								<!-- <a href="#">audio</a> -->&nbsp;
							</div>
							<?php echo $link2; ?>
								<!-- <a href="#">video</a> -->&nbsp;
							</div>
							<?php echo $link3; ?>
								<!-- <a href="#">score</a> -->&nbsp;
							</div>
							<?php echo $link4; ?>
								<!-- <a href="#">listen</a> -->&nbsp;
							</div>
						</div>
					</div>
					<div class="year">
						<div class="row piece">
							<?php echo $cyear; ?>
								2003
							</div>
							<?php echo $ctitle; ?>
		 						<!-- <a href="music-to-die-to.php"> -->
		 							Music To Die To
		 						<!-- </a> -->
		 					</div>
							<?php echo $cinst; ?>
								chamber orchestra
							</div>
							<?php echo $cdur; ?>
								4&prime;
							</div>
							<?php echo $link1; ?>
								<!-- <a href="#">audio</a> -->&nbsp;
							</div>
							<?php echo $link2; ?>
								<!-- <a href="#">video</a> -->&nbsp;
							</div>
							<?php echo $link3; ?>
								<!-- <a href="#">score</a> -->&nbsp;
							</div>
							<?php echo $link4; ?>
								<!-- <a href="#">listen</a> -->&nbsp;
							</div>
						</div>
					</div>
				</section>
 				<section class="complist">
					<header>
						<h2>Any Ensemble</h2>
					</header>
					<div class="year">
						<div class="row piece">
							<?php echo $cyear; ?>
								2014
							</div>
	  	 					<?php echo $ctitle; ?>
		 						<!-- <a href="topographies.php"> -->
		 							topographies
		 						<!-- </a> -->
		 					</div>
		 					<?php echo $cinst; ?>
								any ensemble
							</div>
							<?php echo $cdur; ?>
								variable
							</div>
							<?php echo $link1; ?>
								<!-- <a href="#">audio</a> -->&nbsp;
							</div>
							<?php echo $link2; ?>
								<!-- <a href="#">video</a> -->&nbsp;
							</div>
							<?php echo $link3; ?>
								<!-- <a href="#">score</a> -->&nbsp;
							</div>
							<?php echo $link4; ?>
								<!-- <a href="#">listen</a> -->&nbsp;
							</div>
						</div>
					</div>
					<div class="year">
						<div class="row piece">
							<?php echo $cyear; ?>
								2013
							</div>
	  	 					<?php echo $ctitle; ?>
		 						<!-- <a href="swell.php"> -->
		 							swell
		 						<!-- </a> -->
		 					</div>
		 					<?php echo $cinst; ?>
								any ensemble (4+)
							</div>
							<?php echo $cdur; ?>
								variable
							</div>
							<?php echo $link1; ?>
								<!-- <a href="#">audio</a> -->&nbsp;
							</div>
							<?php echo $link2; ?>
								<!-- <a href="#">video</a> -->&nbsp;
							</div>
							<?php echo $link3; ?>
								<!-- <a href="#">score</a> -->&nbsp;
							</div>
							<?php echo $link4; ?>
								<!-- <a href="#">listen</a> -->&nbsp;
							</div>
						</div>
					</div>
					<div class="year">
						<div class="row piece">
							<?php echo $cyear; ?>
								2012
							</div>
	  	 					<?php echo $ctitle; ?>
		 						<!-- <a href="susurrus.php"> -->
		 							susurrus
		 						<!-- </a> -->
		 					</div>
		 					<?php echo $cinst; ?>
								any ensemble (4+)
							</div>
							<?php echo $cdur; ?>
								variable
							</div>
							<?php echo $link1; ?>
								<!-- <a href="#">audio</a> -->&nbsp;
							</div>
							<?php echo $link2; ?>
								<!-- <a href="#">video</a> -->&nbsp;
							</div>
							<?php echo $link3; ?>
								<!-- <a href="#">score</a> -->&nbsp;
							</div>
							<?php echo $link4; ?>
								<!-- <a href="#">listen</a> -->&nbsp;
							</div>
						</div>
					</div>
					<div class="year">
						<div class="row piece">
							<?php echo $cyear; ?>
								2010
							</div>
	  	 					<?php echo $ctitle; ?>
		 						<!-- <a href="six-graphic-scores.php"> -->
		 							six graphic scores
		 						<!-- </a> -->
		 					</div>
		 					<?php echo $cinst; ?>
								any ensemble
							</div>
							<?php echo $cdur; ?>
								variable
							</div>
							<?php echo $link1; ?>
								<!-- <a href="#">audio</a> -->&nbsp;
							</div>
							<?php echo $link2; ?>
								<!-- <a href="#">video</a> -->&nbsp;
							</div>
							<?php echo $link3; ?>
								<!-- <a href="#">score</a> -->&nbsp;
							</div>
							<?php echo $link4; ?>
								<!-- <a href="#">listen</a> -->&nbsp;
							</div>
						</div>
					</div>
					<div class="year">
						<div class="row piece">
							<?php echo $cyear; ?>
								2005
							</div>
	  	 					<?php echo $ctitle; ?>
		 						<!-- <a href="two-characters.php"> -->
		 							two characters for three parts
		 						<!-- </a> -->
		 					</div>
		 					<?php echo $cinst; ?>
								any ensemble (3+)
							</div>
							<?php echo $cdur; ?>
								variable
							</div>
							<?php echo $link1; ?>
								<!-- <a href="#">audio</a> -->&nbsp;
							</div>
							<?php echo $link2; ?>
								<!-- <a href="#">video</a> -->&nbsp;
							</div>
							<?php echo $link3; ?>
								<!-- <a href="#">score</a> -->&nbsp;
							</div>
							<?php echo $link4; ?>
								<!-- <a href="#">listen</a> -->&nbsp;
							</div>
						</div>
						<div class="row piece">
							<?php echo $cyear; ?>
								2005
							</div>
	  	 					<?php echo $ctitle; ?>
		 						<!-- <a href="paint-music.php"> -->
		 							paint music for three parts
		 						<!-- </a> -->
		 					</div>
		 					<?php echo $cinst; ?>
								any ensemble (3+)
							</div>
							<?php echo $cdur; ?>
								variable
							</div>
							<?php echo $link1; ?>
								<!-- <a href="#">audio</a> -->&nbsp;
							</div>
							<?php echo $link2; ?>
								<!-- <a href="#">video</a> -->&nbsp;
							</div>
							<?php echo $link3; ?>
								<!-- <a href="#">score</a> -->&nbsp;
							</div>
							<?php echo $link4; ?>
								<!-- <a href="#">listen</a> -->&nbsp;
							</div>
						</div>
					</div>
				</section>
				<section class="complist">
					<header>
						<h2>Small Ensemble</h2>
						<p>2&ndash;6 players</p>
					</header>
					<div class="year">
						<div class="row piece">
							<?php echo $cyear; ?>
								2011
							</div>
	  	 					<?php echo $ctitle; ?>
		 						<!-- <a href="phrala.php"> -->
		 							phrala
		 						<!-- </a> -->
		 					</div>
		 					<?php echo $cinst; ?>
								two double basses
							</div>
							<?php echo $cdur; ?>
								2&prime;30&Prime;
							</div>
							<?php echo $link1; ?>
								<!-- <a href="#">audio</a> -->&nbsp;
							</div>
							<?php echo $link2; ?>
								<!-- <a href="#">video</a> -->&nbsp;
							</div>
							<?php echo $link3; ?>
								<!-- <a href="#">score</a> -->&nbsp;
							</div>
							<?php echo $link4; ?>
								<!-- <a href="#">listen</a> -->&nbsp;
							</div>
						</div>
						<div class="row piece">
							<?php echo $cyear; ?>
								2011
							</div>
	  	 					<?php echo $ctitle; ?>
		 						<!-- <a href="biguine.php"> -->
		 							biguine
		 						<!-- </a> -->
		 					</div>
		 					<?php echo $cinst; ?>
								B<i class="flat"></i> clarinet and double bass
							</div>
							<?php echo $cdur; ?>
								3&prime;
							</div>
							<?php echo $link1; ?>
								<!-- <a href="#">audio</a> -->&nbsp;
							</div>
							<?php echo $link2; ?>
								<!-- <a href="#">video</a> -->&nbsp;
							</div>
							<?php echo $link3; ?>
								<!-- <a href="#">score</a> -->&nbsp;
							</div>
							<?php echo $link4; ?>
								<!-- <a href="#">listen</a> -->&nbsp;
							</div>
						</div>
						<div class="row piece">
							<?php echo $cyear; ?>
								2011
							</div>
	  	 					<?php echo $ctitle; ?>
		 						<!-- <a href="ethereal-tide.php"> -->
		 							ethereal tide
		 						<!-- </a> -->
		 					</div>
		 					<?php echo $cinst; ?>
								violoncello and double bass
							</div>
							<?php echo $cdur; ?>
								6&prime;
							</div>
							<?php echo $link1; ?>
								<!-- <a href="#">audio</a> -->&nbsp;
							</div>
							<?php echo $link2; ?>
								<!-- <a href="#">video</a> -->&nbsp;
							</div>
							<?php echo $link3; ?>
								<!-- <a href="#">score</a> -->&nbsp;
							</div>
							<?php echo $link4; ?>
								<!-- <a href="#">listen</a> -->&nbsp;
							</div>
						</div>
					</div>
					<div class="year">
						<div class="row piece">
							<?php echo $cyear; ?>
								2007
							</div>
	  	 					<?php echo $ctitle; ?>
		 						<!-- <a href="horn-trio.php"> -->
		 							horn trio
		 						<!-- </a> -->
		 					</div>
		 					<?php echo $cinst; ?>
								horn, violin and piano
							</div>
							<?php echo $cdur; ?>
								12&prime;
							</div>
							<?php echo $link1; ?>
								<!-- <a href="#">audio</a> -->&nbsp;
							</div>
							<?php echo $link2; ?>
								<!-- <a href="#">video</a> -->&nbsp;
							</div>
							<?php echo $link3; ?>
								<!-- <a href="#">score</a> -->&nbsp;
							</div>
							<?php echo $link4; ?>
								<!-- <a href="#">listen</a> -->&nbsp;
							</div>
						</div>
					</div>
					<div class="year">
						<div class="row piece">
							<?php echo $cyear; ?>
								2005
							</div>
	  	 					<?php echo $ctitle; ?>
		 						<!-- <a href="rain.php"> -->
		 							rain
		 						<!-- </a> -->
		 					</div>
		 					<?php echo $cinst; ?>
								violin, viola, violoncello, and double bass
							</div>
							<?php echo $cdur; ?>
								9&prime;30&Prime;
							</div>
							<?php echo $link1; ?>
								<!-- <a href="#">audio</a> -->&nbsp;
							</div>
							<?php echo $link2; ?>
								<!-- <a href="#">video</a> -->&nbsp;
							</div>
							<?php echo $link3; ?>
								<!-- <a href="#">score</a> -->&nbsp;
							</div>
							<?php echo $link4; ?>
								<!-- <a href="#">listen</a> -->&nbsp;
							</div>
						</div>
						<div class="row piece">
							<?php echo $cyear; ?>
								2005
							</div>
	  	 					<?php echo $ctitle; ?>
		 						<!-- <a href="lament.php"> -->
		 							lament
		 						<!-- </a> -->
		 					</div>
		 					<?php echo $cinst; ?>
								violin, viola, and violoncello
							</div>
							<?php echo $cdur; ?>
								6&prime;
							</div>
							<?php echo $link1; ?>
								<!-- <a href="#">audio</a> -->&nbsp;
							</div>
							<?php echo $link2; ?>
								<!-- <a href="#">video</a> -->&nbsp;
							</div>
							<?php echo $link3; ?>
								<!-- <a href="#">score</a> -->&nbsp;
							</div>
							<?php echo $link4; ?>
								<!-- <a href="#">listen</a> -->&nbsp;
							</div>
						</div>
					</div>
					<div class="year">
						<div class="row piece">
							<?php echo $cyear; ?>
								2004
							</div>
	  	 					<?php echo $ctitle; ?>
		 						<!-- <a href="#"> -->
		 							Song Without Words
		 						<!-- </a> -->
		 					</div>
		 					<?php echo $cinst; ?>
								soprano, guitar, and piano
							</div>
							<?php echo $cdur; ?>
								6&prime;
							</div>
							<?php echo $link1; ?>
								<!-- <a href="#">audio</a> -->&nbsp;
							</div>
							<?php echo $link2; ?>
								<!-- <a href="#">video</a> -->&nbsp;
							</div>
							<?php echo $link3; ?>
								<!-- <a href="#">score</a> -->&nbsp;
							</div>
							<?php echo $link4; ?>
								<!-- <a href="#">listen</a> -->&nbsp;
							</div>
						</div>
						<div class="row piece">
							<?php echo $cyear; ?>
								2004
							</div>
	  	 					<?php echo $ctitle; ?>
		 						<!-- <a href="#"> -->
		 							noir
		 						<!-- </a> -->
		 					</div>
		 					<?php echo $cinst; ?>
								string quartet and flute
							</div>
							<?php echo $cdur; ?>
								5&prime;
							</div>
							<?php echo $link1; ?>
								<!-- <a href="#">audio</a> -->&nbsp;
							</div>
							<?php echo $link2; ?>
								<!-- <a href="#">video</a> -->&nbsp;
							</div>
							<?php echo $link3; ?>
								<!-- <a href="#">score</a> -->&nbsp;
							</div>
							<?php echo $link4; ?>
								<!-- <a href="#">listen</a> -->&nbsp;
							</div>
						</div>
						<div class="row piece">
							<?php echo $cyear; ?>
								2004
							</div>
	  	 					<?php echo $ctitle; ?>
		 						<!-- <a href="ocean-love-scene.php"> -->
		 							Ocean Love Scene in Two Keys
		 						<!-- </a> -->
		 					</div>
		 					<?php echo $cinst; ?>
								violoncello and double bass
							</div>
							<?php echo $cdur; ?>
								6&prime;
							</div>
							<?php echo $link1; ?>
								<!-- <a href="#">audio</a> -->&nbsp;
							</div>
							<?php echo $link2; ?>
								<!-- <a href="#">video</a> -->&nbsp;
							</div>
							<?php echo $link3; ?>
								<!-- <a href="#">score</a> -->&nbsp;
							</div>
							<?php echo $link4; ?>
								<!-- <a href="#">listen</a> -->&nbsp;
							</div>
						</div>
					</div>
				</section>
 				<section class="complist">
					<header>
						<h2>Solo</h2>
					</header>
					<div class="year">
						<div class="row piece">
							<?php echo $cyear; ?>
								2013
							</div>
	  	 					<?php echo $ctitle; ?>
		 						<!-- <a href="facets.php"> -->
		 							facets
		 						<!-- </a> -->
		 					</div>
		 					<?php echo $cinst; ?>
								violoncello
							</div>
							<?php echo $cdur; ?>
								7&prime;
							</div>
							<?php echo $link1; ?>
								<!-- <a href="#">audio</a> -->&nbsp;
							</div>
							<?php echo $link2; ?>
								<!-- <a href="#">video</a> -->&nbsp;
							</div>
							<?php echo $link3; ?>
								<!-- <a href="#">score</a> -->&nbsp;
							</div>
							<?php echo $link4; ?>
								<!-- <a href="#">listen</a> -->&nbsp;
							</div>
						</div>
					</div>
					<div class="year">
						<div class="row piece">
							<?php echo $cyear; ?>
								2011
							</div>
	  	 					<?php echo $ctitle; ?>
		 						<!-- <a href="five-pieces-for-double-bass.php"> -->
		 							five pieces for double bass
		 						<!-- </a> -->
		 					</div>
		 					<?php echo $cinst; ?>
								double bass
							</div>
							<?php echo $cdur; ?>
								15&prime;
							</div>
							<?php echo $link1; ?>
								<!-- <a href="#">audio</a> -->&nbsp;
							</div>
							<?php echo $link2; ?>
								<!-- <a href="#">video</a> -->&nbsp;
							</div>
							<?php echo $link3; ?>
								<!-- <a href="#">score</a> -->&nbsp;
							</div>
							<?php echo $link4; ?>
								<!-- <a href="#">listen</a> -->&nbsp;
							</div>
						</div>
						<div class="row piece">
							<?php echo $cyear; ?>
								2011
							</div>
	  	 					<?php echo $ctitle; ?>
		 						<!-- <a href="summer-hot-slow.php"> -->
		 							summer. hot. slow.
		 						<!-- </a> -->
		 					</div>
		 					<?php echo $cinst; ?>
								double bass
							</div>
							<?php echo $cdur; ?>
								5&prime;
							</div>
							<?php echo $link1; ?>
								<!-- <a href="#">audio</a> -->&nbsp;
							</div>
							<?php echo $link2; ?>
								<!-- <a href="#">video</a> -->&nbsp;
							</div>
							<?php echo $link3; ?>
								<!-- <a href="#">score</a> -->&nbsp;
							</div>
							<?php echo $link4; ?>
								<!-- <a href="#">listen</a> -->&nbsp;
							</div>
						</div>
					</div>
					<div class="year">
						<div class="row piece">
							<?php echo $cyear; ?>
								2006
							</div>
	  	 					<?php echo $ctitle; ?>
		 						<!-- <a href="10-short-piano-pieces.php"> -->
		 							10 short piano pieces
		 						<!-- </a> -->
		 					</div>
		 					<?php echo $cinst; ?>
								piano
							</div>
							<?php echo $cdur; ?>
								12&prime;
							</div>
							<?php echo $link1; ?>
								<!-- <a href="#">audio</a> -->&nbsp;
							</div>
							<?php echo $link2; ?>
								<!-- <a href="#">video</a> -->&nbsp;
							</div>
							<?php echo $link3; ?>
								<!-- <a href="#">score</a> -->&nbsp;
							</div>
							<?php echo $link4; ?>
								<!-- <a href="#">listen</a> -->&nbsp;
							</div>
						</div>
						<div class="row piece">
							<?php echo $cyear; ?>
								2006
							</div>
	  	 					<?php echo $ctitle; ?>
		 						<!-- <a href="music-for-solo-clarinet.php"> -->
		 							music for solo clarinet
		 						<!-- </a> -->
		 					</div>
		 					<?php echo $cinst; ?>
								B<i class="flat"></i> clarinet
							</div>
							<?php echo $cdur; ?>
								4&prime;30&Prime;
							</div>
							<?php echo $link1; ?>
								<!-- <a href="#">audio</a> -->&nbsp;
							</div>
							<?php echo $link2; ?>
								<!-- <a href="#">video</a> -->&nbsp;
							</div>
							<?php echo $link3; ?>
								<!-- <a href="#">score</a> -->&nbsp;
							</div>
							<?php echo $link4; ?>
								<!-- <a href="#">listen</a> -->&nbsp;
							</div>
						</div>
					</div>
				</section>

 				<section class="complist">
					<header>
						<h2>Electroacoustic and Sound Design</h2>
						<!-- <p></p> -->
					</header>
					<div class="year">
						<div class="row piece">
							<?php echo $cyear; ?>
								2009
							</div>
	  	 					<?php echo $ctitle; ?>
		 						<!-- <a href="tempest.php"> -->
		 							The Tempest
		 						<!-- </a> -->
		 					</div>
		 					<?php echo $cinst; ?>
								electroacoustic sound design
							</div>
							<?php echo $cdur; ?>
								&nbsp;<!-- 7&prime; -->
							</div>
							<?php echo $link1; ?>
								<!-- <a href="#">audio</a> -->&nbsp;
							</div>
							<?php echo $link2; ?>
								<!-- <a href="#">video</a> -->&nbsp;
							</div>
							<?php echo $link3; ?>
								<!-- <a href="#">score</a> -->&nbsp;
							</div>
							<?php echo $link4; ?>
								<!-- <a href="#">listen</a> -->&nbsp;
							</div>
						</div>
					</div>
					<div class="year">
						<div class="row piece">
							<?php echo $cyear; ?>
								2007
							</div>
	  	 					<?php echo $ctitle; ?>
		 						<!-- <a href="rarefaction.php"> -->
		 							rarefaction
		 						<!-- </a> -->
		 					</div>
		 					<?php echo $cinst; ?>
								electroacoustic
							</div>
							<?php echo $cdur; ?>
								5&prime;46&Prime;
							</div>
							<?php echo $link1; ?>
								<!-- <a href="#">audio</a> -->&nbsp;
							</div>
							<?php echo $link2; ?>
								<!-- <a href="#">video</a> -->&nbsp;
							</div>
							<?php echo $link3; ?>
								<!-- <a href="#">score</a> -->&nbsp;
							</div>
							<?php echo $link4; ?>
								<!-- <a href="#">listen</a> -->&nbsp;
							</div>
						</div>
					</div>
				</section>

 				<section class="complist">
					<header>
						<h2>Collaborations</h2>
					</header>
					<div class="year">
						<div class="row piece">
							<?php echo $cyear; ?>
								2015
							</div>
	  	 					<?php echo $ctitle; ?>
		 						<!-- <a href="#"> -->
		 							sustain what remains<br />(with Nat Evans)
		 						<!-- </a> -->
		 					</div>
		 					<?php echo $cinst; ?>
								&nbsp;
							</div>
							<?php echo $cdur; ?>
								variable<!-- 7&prime; -->
							</div>
							<?php echo $link1; ?>
								<!-- <a href="#">audio</a> -->&nbsp;
							</div>
							<?php echo $link2; ?>
								<!-- <a href="#">video</a> -->&nbsp;
							</div>
							<?php echo $link3; ?>
								<!-- <a href="#">score</a> -->&nbsp;
							</div>
							<?php echo $link4; ?>
								<!-- <a href="#">listen</a> -->&nbsp;
							</div>
						</div>
					</div>
					<div class="year">
						<div class="row piece">
							<?php echo $cyear; ?>
								2014
							</div>
	  	 					<?php echo $ctitle; ?>
		 						<!-- <a href="#"> -->
		 							Antiphonal Location<br />(with Nat Evans)
		 						<!-- </a> -->
		 					</div>
		 					<?php echo $cinst; ?>
								any ensemble of brass
							</div>
							<?php echo $cdur; ?>
								variable<!-- 7&prime; -->
							</div>
							<?php echo $link1; ?>
								<!-- <a href="#">audio</a> -->&nbsp;
							</div>
							<?php echo $link2; ?>
								<!-- <a href="#">video</a> -->&nbsp;
							</div>
							<?php echo $link3; ?>
								<!-- <a href="#">score</a> -->&nbsp;
							</div>
							<?php echo $link4; ?>
								<!-- <a href="#">listen</a> -->&nbsp;
							</div>
						</div>
					</div>
					<div class="year">
						<div class="row piece">
							<?php echo $cyear; ?>
								2013
							</div>
	  	 					<?php echo $ctitle; ?>
		 						<!-- <a href="space-weather.php"> -->
		 							Space Weather Listening Booth<br />(with Nat Evans)
		 						<!-- </a> -->
		 					</div>
		 					<?php echo $cinst; ?>
								4-channel sound with optional any ensemble
							</div>
							<?php echo $cdur; ?>
								48&prime;
							</div>
							<?php echo $link1; ?>
								<!-- <a href="#">audio</a> -->&nbsp;
							</div>
							<?php echo $link2; ?>
								<!-- <a href="#">video</a> -->&nbsp;
							</div>
							<?php echo $link3; ?>
								<!-- <a href="#">score</a> -->&nbsp;
							</div>
							<?php echo $link4; ?>
								<!-- <a href="#">listen</a> -->&nbsp;
							</div>
						</div>
					</div>
					<div class="year">
						<div class="row piece">
							<?php echo $cyear; ?>
								2012
							</div>
	  	 					<?php echo $ctitle; ?>
		 						<!-- <a href="#"> -->
		 							Our Century 21<br />(with Unused Lexical Variable)
		 						<!-- </a> -->
		 					</div>
		 					<?php echo $cinst; ?>
								site-specific installation and performance
							</div>
							<?php echo $cdur; ?>
								&nbsp;
							</div>
							<?php echo $link1; ?>
								<!-- <a href="#">audio</a> -->&nbsp;
							</div>
							<?php echo $link2; ?>
								<!-- <a href="#">video</a> -->&nbsp;
							</div>
							<?php echo $link3; ?>
								<!-- <a href="#">score</a> -->&nbsp;
							</div>
							<?php echo $link4; ?>
								<!-- <a href="#">listen</a> -->&nbsp;
							</div>
						</div>
					</div>
				</section>

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

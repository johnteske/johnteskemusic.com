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

					<div class="6u 12u$(2) 12u$(3)">
<!-- 				<div class="4u 6u(2) 12u$(3)"> -->
						<header>
	 					<h2>Featured Work</h2>
						</header>
						<div class="embed">
							<iframe src="http://player.vimeo.com/video/103194193?byline=0&amp;portrait=0&amp;color=B3B3B3" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
						</div>
					</div>
<!--
					<div class="4u 6u(2) 12u$(3)">
					</div>
-->
				</div>
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

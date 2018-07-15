<?php
include 'util/include_with.php';
include 'util/get_json.php';

include_with('header.php', array(
	'title' => 'About',
	'class' => 'about'
));
?>

<article class="row">
	<header class="12u$">
		<h2>About</h2>
	</header>
	<section class="8u 12u$(3)">
		<p>
			<?php echo get_json('bio.json')[long] ?>
		</p>
	</section>
	<figure class="4u$ not-small">
		<span class='image fit not-medium'><img src='images/teske-600p-sq.jpg' alt='John Teske' /></span>
		<span class='image fit only-medium'><img src='images/teske-600p.jpg' alt='John Teske' /></span>
	</figure>
</article>

<article class="row">
	<header class="12u$">
		<h2>Statement</h2>
	</header>
	<section class="8u 8u(2) 12u$(3)">
		<p>
			My recent work has been exploring the nature of human consciousness, awareness, and sensation. As our culture becomes more interconnected, the experience of time seems to be accelerating and the average attention span is diminishing. Through altering the experience of time through music, I hope to bring to attention greater subtleties of sound.
		</p>
	</section>
</article>

<article class="row">
	<header class="12u$">
		<h2>Double bass trailer</h2>
	</header>
	<section class="8u 8u(2) 12u$(3)">
		<p>
			During the warm months, I travel to rehearsals and performances by bicycle, towing my bass in a custom-made trailer. In the winter, I park the trailer and focus on composing new works.
		</p>
		<p>
			<a href="bass-trailer/" class="button">Read more</a>
		</p>
	</section>
</article>

<?php
	$contactsItems = array(
		array('http://twitter.com/johnteske', 'twitter', '@johnteske'),
		array('http://eepurl.com/c3rmw', 'envelope', 'Email list'),
		array('https://www.facebook.com/johnteskemusic', 'facebook', 'Facebook Page'),
		array('http://vimeo.com/johnteske', 'vimeo-square', 'Vimeo'),
		array('https://soundcloud.com/johnteske', 'soundcloud', 'Soundcloud'),
		array('http://www.youtube.com/JohnTeske', 'youtube-play', 'YouTube')
	);
	$li = function($item) {
		return '<li><a href="' . $item[0] . '"><i class="fa-li fa fa-' . $item[1] . '"></i>' . $item[2] . '</a></li>';
	}
?>

<article class="row" id="contact">
	<header class="12u$">
		<h2>Contact</h2>
	</header>
	<section class="8u 12u$(3)">
		<ul class="fa-ul">
			<li><i class="fa-li fa fa-envelope-o"></i>john [at] johnteskemusic.com</li>
			<?php echo join('', array_map($li, $contactsItems)) ?>
		</ul>
	</section>
</article>

<?php
	include_with('footer.php', array(
		'photo' => 'Header photo by Sonia Honeydew. <span class="not-small">Headshot by Heather Ratcliff.</span>'
	));
?>

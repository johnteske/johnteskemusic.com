<?php
include '../util/include_with.php';
include '../util/press.php';

include_with('../header.php', array(
	'title' => 'Bass Trailer',
	'class' => 'about'
));
?>

<div class="row">
	<section class="8u 12u$(3)">
		<p>
			In the summer of 2010, I commissioned a bicycle trailer to transport my double bass, custom-built by <a href="http://www.haulincolin.com/">Haulin&rsquo; Colin</a>.
			The project was funded with community support in exchange for recordings, commissioned works and house shows. The trailer is a continual work in progress, as I am constantly refining my routine.
		</p>

		<h4>Press</h4>
		<?php
			$press_path = $_SERVER['DOCUMENT_ROOT'] . '/press/';

			$press_file = $press_path . '100705-bass-trailer.json';

			echo '<p>' . press_html($press_file) . '</p>';
		?>
	</section>
</div>
<h2>Thank you for support from</h2>

<?php
$supporters = array_chunk(array(
	'Adam Stoeckle',
	'Amelia K. Bowler',
	'Bernard Sanders',
	'Bookman Wallingford',
	'Brent Williamson',
	'Carma Williams',
	'Chris McGill',
	'Darryl Miller',
	'David Seerveld',
	'David Teske',
	'Derek Nixon',
	'EFFALO',
	'Ellen Pepin',
	'Emily Ann Peterson',
	'Emily Mrazek',
	'Hannah Hoose',
	'Haulin\' Colin',
	'Ian Williams',
	'India Susanne Holden',
	'Jayme Aumann',
	'Jesse Card',
	'Jimmie Girganoff',
	'Liz Nixon',
	'Nancy Ward',
	'Nicola Reilly',
	'Mara Sedlins',
	'Margaret Carter',
	'Michael Berk',
	'Mike Belknap',
	'Paula Cunningham',
	'Peter Abrahamsen',
	'Qamuuqin Maxwell',
	'Scott Teske',
	'Steve Bradford',
	'Stuart Wolferman',
	'Susan Massar',
	'Terri Sandys',
	'Tim Scearce',
	'Wayne Thurman',
	'William Eddins',
	'Whitman Dewey-Smith',
), 21);
?>

<div class="row">
	<ul class="6u">
		<?php
			foreach ($supporters[0] as $supporter) {
				echo '<li>' . $supporter . '</li>';
			}
		?>
	</ul>
	<ul>
		<?php
			foreach ($supporters[1] as $supporter) {
				echo '<li>' . $supporter . '</li>';
			}
		?>
	</ul>
</div>

<?php
include_with('../footer.php', array(
	'title' => 'Photo by Sonia Honeydew'
));
?>

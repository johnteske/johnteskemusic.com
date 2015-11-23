<?php
	$title = 'Performances';
	$class = 'perf';
	include '../../header.php';?>
<!-- content -->
<?php
	$thisfile = !empty($_GET['file']) ? $_GET['file'] : '../150605-FrictionQt.perf';
	$lines = file($thisfile);

if(isset($_POST['submit']))
{
    $title = $_POST['title'];
    $file = fopen("emaillist.txt","w+");
    fwrite($file,$title);
    fclose($file); 
    print_r(error_get_last());
}

?>
<form method="POST" action="" name="form">
<!-- <form method="GET" action="index.php"> -->
	<fieldset class="row">
		<div class="3u 12u(2)">
			Start Date YY-MM-DD (soon to be deprecated)
		</div>
		<div class="3u 4u(2)">
			<label for="line0">0:</label>
			<input type="textarea" id="line0" name="startdate" value="<?php echo $lines[0]; ?>">
		</div>
	</fieldset>
	<fieldset class="row">
		<div class="3u 12u(2)">
			End Date YY-MM-DD
		</div>
		<div class="3u 4u(2)">
			<label for="line1">1:</label>
			<input type="textarea" id="line1" name="enddate" value="<?php echo $lines[1]; ?>">
		</div>
	</fieldset>
	<fieldset class="row">
		<div class="3u 12u(2)">
			Time
		</div>
		<div class="3u 4u(2)">
			<label for="line2">2:</label>
			<input type="textarea" id="line2" name="time" value="<?php echo $lines[2]; ?>">
		</div>
	</fieldset>
	<fieldset class="row">
		<div class="3u 12u(2)">
			Title
		</div>
		<div class="3u 4u(2)">
			<label for="line3">3:</label>
			<input type="textarea" id="line3" name="title" value="<?php echo $lines[3]; ?>">
		</div>
	</fieldset>
	<fieldset class="row">
		<div class="3u 12u(2)">
			Short description
		</div>
		<div class="3u 4u(2)">
			<label for="line4">4:</label>
			<input type="textarea" id="line4" name="short" value="<?php echo $lines[4]; ?>">
		</div>
	</fieldset>
	<fieldset class="row">
		<div class="3u 12u(2)">
			Long description
		</div>
		<div class="12u">
			<label for="line5">5:</label>
			<input type="textarea" rows="8" cols="50" id="line5" name="long" value="<?php echo $lines[5]; ?>">
		</div>
	</fieldset>
	<fieldset class="row">
		<div class="3u 12u(2)">
			Address
		</div>
		<div class="3u 4u(2)">
			<label for="line6">6:</label>
			<input type="textarea" id="line6" name="address" value="<?php echo $lines[6]; ?>">
		</div>
	</fieldset>
	<fieldset class="row">
		<div class="3u 12u(2)">
			Price / Tickets
		</div>
		<div class="3u 4u(2)">
			<label for="line7">7:</label>
			<input type="textarea" id="line7" name="price" value="<?php echo $lines[7]; ?>">
		</div>
	</fieldset>
	<fieldset class="row">
		<div class="3u 12u(2)">
			Link
		</div>
		<div class="3u 4u(2)">
			<label for="line8">8:</label>
			<input type="textarea" id="line8" name="link" value="<?php echo $lines[8]; ?>">
		</div>
	</fieldset>
	<fieldset class="12u$">
		<ul class="actions">
			<li><input type="submit" name="submit" value="Save" /></li>
			<li><a href="./" class="button alt">Cancel</a></li>
		</ul>
	</fieldset>
</form>

				</div> <!-- upcoming -->
<!-- content -->
<?php $photo = 'Photo by Blake Bumpus.';
	include '../../footer.php';?>
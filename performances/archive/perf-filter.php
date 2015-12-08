<form method="GET" action="json-test1.php">
	<fieldset class="row">
		<div class="3u 12u(2)">
			Show Events
		</div>
		<div class="3u 4u(2)">
			<input type="radio" id="events-all" name="events" value="all" <?php if($showevents == 'all') {echo "checked";} ?>>
			<label for="events-all">All</label>
		</div>
		<div class="3u 4u(2)">
			<input type="radio" id="events-featuredonly" name="events" value="featured" <?php if($showevents == 'featured') {echo "checked";} ?>>
			<label for="events-featuredonly">Featured Only</label>
		</div>
		<div class="3u 4u(2)">
			<input type="radio" id="events-archiveonly" name="events" value="archive" <?php if($showevents == 'archive') {echo "checked";} ?>>
			<label for="events-archiveonly">Archive Only</label>
		</div>
	</fieldset>
	<fieldset class="row">
		<div class="3u 12u(2)">
			Upcoming
		</div>
		<div class="3u 4u(2)">
			<input type="radio" id="upcoming-full" name="upcoming" value="full" <?php if($showupcoming == 'full') {echo "checked";} ?>>
			<label for="upcoming-full">Full</label>
		</div>
		<div class="3u 4u(2)">
			<input type="radio" id="upcoming-short" name="upcoming" value="short" <?php if($showupcoming == 'short') {echo "checked";} ?>>
			<label for="upcoming-short">Short</label>
		</div>
		<div class="3u 4u(2)">
			<input type="radio" id="upcoming-none" name="upcoming" value="none" <?php if($showupcoming == 'none') {echo "checked";} ?>>
			<label for="upcoming-none">None</label>
		</div>
	</fieldset>
	<fieldset class="row">
		<div class="3u 12u(2)">
			Past
		</div>
		<div class="3u 4u(2)">
			<input type="radio" id="past-full" name="past" value="full" <?php if($showpast == 'full') {echo "checked";} ?>>
			<label for="past-full">Full</label>
		</div>
		<div class="3u 4u(2)">
			<input type="radio" id="past-short" name="past" value="short" <?php if($showpast == 'short') {echo "checked";} ?>>
			<label for="past-short">Short</label>
		</div>
		<div class="3u 4u(2)">
			<input type="radio" id="past-none" name="past" value="none" <?php if($showpast == 'none') {echo "checked";} ?>>
			<label for="past-none">None</label>
		</div>
	</fieldset>
	<fieldset class="12u$">
		<ul class="actions">
			<li><input type="submit" value="View" /></li>
			<li><a href="./" class="button alt">Reset</a></li>
		</ul>
	</fieldset>
</form>

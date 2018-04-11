<?php
include '../util/include_with.php';
include '../util/get_json.php';

include_with('../header.php', array(
	'title' => 'Press',
	'class' => 'subpage'
));
?>

<?php
	function press_html($file) {
		$press = get_json($file);
		$press_date = date_create_from_format('ymd', get_date_from_basename($file));

		return '<a href="' . $press['url'] . '">' .
			$press['author'] . '. ' . '"' . $press['title'] . '."' . ' <em>' . $press['publication'] . '</em>. ' . $press_date->format('j F, Y.') .
		'</a>';
	}

	$press_path = $_SERVER['DOCUMENT_ROOT'] . '/press/';

	$press_files = glob($press_path . '*.json');
	rsort($press_files);

	foreach($press_files as $file) {
		echo press_html($file);
		echo '<br /><br />'; // TODO
	}
?>

<?php include '../footer.php' ;?>

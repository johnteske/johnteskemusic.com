<?php
include '../util/include_with.php';
include '../util/press.php';

include_with('../header.php', array(
	'title' => 'Press',
	'class' => 'subpage'
));
?>

<?php
	$press_path = $_SERVER['DOCUMENT_ROOT'] . '/press/';

	$press_files = glob($press_path . '*.json');
	rsort($press_files);

	echo '<ul>';
	foreach($press_files as $file) {
		echo '<li>' . press_html($file) . '</li>';
	}
	echo '</ul>';
?>

<?php include '../footer.php' ;?>

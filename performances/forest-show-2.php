<?php
$image_path = '../../images/forest-show-directions/ravenna-park/';

function echo_direction($text, $image_basename) {
    global $image_path;
    echo '<li>' .
        '<img data-src="' . $image_path . $image_basename . '" />' .
        '<p>' . $text . '</p>' .
    '</li>';
}
?>

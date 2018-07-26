<?php
$image_path = '../../images/forest-show-directions/ravenna-park/';

function echo_direction($text, $image_basename) {
    global $image_path;
    echo '<h3 class="6u 12u(3)">' . $text . '</h3>' .
        '<div class="6u 12u(3)"><img src="' . $image_path . $image_basename . '" class="image fit"></div>';
}
?>
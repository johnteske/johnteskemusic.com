<?php
include '../util/get_json.php';

function press_html($file) {
    $press = get_json($file);
    $press_date = date_create_from_format('ymd', get_date_from_basename($file));

    return '<a href="' . $press['url'] . '">' .
        $press['author'] . '. ' . '"' . $press['title'] . '."' . ' <em>' . $press['publication'] . '</em>. ' . $press_date->format('j F, Y.') .
    '</a>';
}
?>

<?php
function get_json($file) {
    $contents = file_get_contents($file);
    // TODO encode utf-8?
    return json_decode($contents, true);
}
?>

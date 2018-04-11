<?php
// TODO rename file json.php

function get_json($file) {
    $contents = file_get_contents($file);
    // TODO encode utf-8?
    return json_decode($contents, true);
}

// Get YYMMDD date from file basename
function get_date_from_basename($file) {
    return substr(basename($file, '.json'), 0, 6);
}
?>

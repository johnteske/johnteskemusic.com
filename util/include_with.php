<?php
// Adapted from: https://stackoverflow.com/questions/11905140/php-pass-variable-to-include
function include_with($file_path, $variables = array()) {
    $output = NULL;

    if(file_exists($file_path)){
        // Extract the variables to a local namespace
        extract($variables);

        // Start output buffering
        ob_start();

        // Include the template file
        include $file_path;

        // End buffering and return its contents
        $output = ob_get_clean();
    }

    print $output;

    return $output;
}
?>

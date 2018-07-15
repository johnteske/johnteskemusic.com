<?php

function perf_title($title, $url) {
    if ($url) {
        $title = "<a class=\"perf-title\" href=\"" . $url . "\">" . $title . "</a>";
    }

    return $title;
}

function full_json_perf($date, $perf) {
    return "
        <div class=\"row\">
            <header class=\"2u 3u(2) 12u$(4) date\">
                <h3>" . $date . "</h3>
                <p>" . $perf['time'] . "</p>
            </header>
            <section class=\"7u$ 9u$(2) 12u$(4)\">
                <header>
                    <h3>" . perf_title($perf['title'], $perf['url']) . "</h3>
                    <p>" . $perf['short'] . "</p>
                </header>
                <p>" . $perf['long'] . "</p>
                <p>" . $perf['address'] . "</p>
                <p>" . $perf['price'] . "</p>
            </section>
        </div>
    ";
}

function short_json_perf($date, $perf) {
    return "
        <div class=\"row\">
            <header class=\"2u 3u(2) 12u$(4) date\">
                <h4>" . $date . "</h4>
            </header>
            <section class=\"7u$ 9u$(2) 12u$(4)\">
                <header>
                    <h4>" . perf_title($perf['title'], $perf['url']) . "</h4>
                </header>
            </section>
        </div>
    ";
}

function display_dates($file_list, $display) {
    $current_year = "";

    foreach($file_list as $file) {
        $perf = get_json($file);
        if ($perf) { // skip if error, won't break page
            $end = array_key_exists('endDate', $perf) ? $perf['endDate'] : NULL;
            list ($date, $date_year) = extract_date($file, $end);
            if ($date_year != $current_year) { echo "<h3>" . $date_year . "</h3>"; }
            $current_year = $date_year;
            if ($display == 'full') {
                echo full_json_perf($date, $perf);
            } elseif ($display == 'short') {
                echo short_json_perf($date, $perf);
            }
        }
    }
}
?>

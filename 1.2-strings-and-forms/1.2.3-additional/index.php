<?php
    $url = 'https://test.com';

    if (substr($url, 0, 5) === 'https') {
        echo 'да';
    } else {
        echo 'нет';
    }

    if (strpos($url, 'https') !== false) {
        echo '<br> да';
    } else {
        echo '<br> нет';
    }

    $date = '05-29-1993';
    $date_second = (explode('-', $date));

    echo '<br>' . substr($date, 3, 2) . '.' . substr($date, 0, 2) . '.' . substr($date, 6);
    echo "<br> ${date_second[1]}.${date_second[0]}.${date_second[2]}";

    $sum = '10536000';

    echo '<br>' . number_format($sum, 0, '', ' ') . ' руб.';
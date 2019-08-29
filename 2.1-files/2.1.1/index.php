<?php
header('Content-Type: text/html; charset=utf-8');

$csv = array_map('str_getcsv', file('data.csv'));
$keys = str_getcsv($csv[0][0], ';');

foreach ($csv as $key) {
    $str = str_getcsv($key[0], ';');
    
    foreach ($str as $key_str => $value_str) {
        if (mb_detect_encoding($value_str) !== "UTF-8") {
            $str[$key_str] = iconv(mb_detect_encoding($value_str), "UTF-8", $value_str);
        }
    }

    $arr[] = array_combine($keys, $str);
}

array_shift($arr);
file_put_contents('arr.json', json_encode($arr));
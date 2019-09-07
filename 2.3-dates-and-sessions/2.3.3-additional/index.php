<?php
$formatOne = '02-11-1998 15:26:38';
$formatToTimestamp = strtotime($formatOne);
$formatTwo = date('H:i y.d.m', $formatToTimestamp);

print_r($formatTwo);

$now = date_create('now');
$NewYear = date_create('31-12-2019 23:59:59');
$daysUntilNewYear = date_diff($now, $NewYear);

print_r('<br> Дней до нового года - ' . $daysUntilNewYear->days);

$nowPlusTwoMonth = date_create('+2 month');

print_r('<br>' . date_format($nowPlusTwoMonth, "d-m-Y H:i:s"));
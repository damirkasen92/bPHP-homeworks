<?php 
$hours = date("H");
$days = date("N");
$greeting = '';
$day = '';
$part_of_day = '';
$work = '';

if ($hours >= 6 && $hours < 11) {
    $greeting = 'Доброе утро!';
    $part_of_day = 'img/morning.jpg';
} elseif ($hours >= 11 && $hours < 18) {
    $greeting = 'Добрый день!';
    $part_of_day = 'img/day.jpg';
} elseif ($hours >= 18 && $hours < 23) {
    $greeting = 'Добрый вечер!';
    $part_of_day = 'img/evening.jpg';
} else {
    $greeting = 'Доброй ночи!';
    $part_of_day = 'img/night.jpg';
}

if ($days >= 1 && $days <= 3) {
    if ($hours >= 9 && $hours < 18) {
        $work = 'Это лучший день, чтобы обратиться в Horns&Hooves! Мы работаем для Вас до 18.00';
    } else {
        if ($days == 3 && $hours >= 18) {
            $work = 'Завтра - лучший день, чтобы обратиться в Horns&Hooves! Мы работаем для Вас с 10.00';
        } elseif ($hours < 9) {
            $work = 'Сегодня - лучший день, чтобы обратиться в Horns&Hooves! Мы работаем для Вас с 9.00';
        } else {
            $work = 'Завтра - лучший день, чтобы обратиться в Horns&Hooves! Мы работаем для Вас с 9.00';
        }    
    }
} else if ($days >= 4 && $days <= 6) {
    if ($hours >= 10 && $hours < 18) {
        $work = 'Это лучший день, чтобы обратиться в Horns&Hooves! Мы работаем для Вас до 18.00';
    } else {
        if ($days == 6 && $hours >= 18) {
            $work = 'Послезавтра - лучший день, чтобы обратиться в Horns&Hooves! Мы работаем для Вас с 10.00';
        } elseif ($hours < 10) {
            $work = 'Сегодня - лучший день, чтобы обратиться в Horns&Hooves! Мы работаем для Вас с 10.00';
        } else {
            $work = 'Завтра - лучший день, чтобы обратиться в Horns&Hooves! Мы работаем для Вас с 10.00';
        }     
    }
} else {
    $work = 'Завтра - лучший день, чтобы обратиться в Horns&Hooves! Мы работаем для Вас с 9.00';
}

switch ($days) :
    case 1: $day = 'Понедельник'; break;
    case 2: $day = 'Вторник'; break;
    case 3: $day = 'Среда'; break;
    case 4: $day = 'Четверг'; break;
    case 5: $day = 'Пятница'; break;
    case 6: $day = 'Суббота'; break;
    case 7: $day = 'Воскресенье'; break;
endswitch;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bPHP - 1.1.2</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="greeting" style="background-image: url(<?= $part_of_day; ?>)">
        <div class="wrap">    
            <h1><?= $greeting; ?></h1>
            <p>Сегодня <?= $day; ?>.</p>
            <p><?= $work; ?></p>
        </div>
    </div>
</body>
</html>
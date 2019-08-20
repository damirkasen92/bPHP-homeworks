<?php 
    $variable = false;
    $type = '';
    $description = '';

    if (is_bool($variable)) {
        $type = 'bool';
        $description = 'Это простейший тип. Он выражает истинность значения - это может быть либо TRUE, либо FALSE. Булев тип был введен в PHP4.';
    } elseif (is_float($variable)) {
        $type = 'float';
        $description = 'Числа с плавающей точкой (также известные как "float", "double" или "real").';
    } elseif (is_int($variable)) {
        $type = 'int';
        $description = 'Это число из множества ℤ = {..., -2, -1, 0, 1, 2, ...}.';
    } elseif (is_string($variable)) {
        $type = 'string';
        $description = 'Это набор символов, где символ - это то же самое, что и байт. Это значит, что PHP поддерживает ровно 256 различных символов, а также то, что в PHP нет встроенной поддержки Unicode.';
    } elseif (is_null($variable)) {
        $type = 'null';
        $description = 'Специальное значение NULL представляет собой переменную без значения. NULL - это единственно возможное значение типа null.';
    } else {
        $type = 'other';
        $description = 'Другие типы.';
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>bPHP - 1.1.1</title>
</head>
<body>
    <p><?php $type; ?></p>
    <p><?php $description; ?></p>
</body>
</html>
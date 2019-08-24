<?php
    $firstName = mb_ucfirst(mb_strtolower(trim($_POST['firstName'])));
    $lastName = mb_ucfirst(mb_strtolower(trim($_POST['lastName'])));
    $middleName = mb_ucfirst(mb_strtolower(trim($_POST['middleName'])));
    $fullName = $lastName . ' ' . $firstName . ' ' . $middleName;
    $fio = mb_substr($lastName, 0, 1) . mb_substr($firstName, 0, 1) . mb_substr($middleName, 0, 1);
    $surnameAndInitials = $lastName . ' ' . mb_substr($firstName, 0, 1) . '.' . mb_substr($middleName, 0, 1) . '.';

    echo $fullName;
    echo "<br> ${fio}";
    echo "<br> ${surnameAndInitials}";

    function mb_ucfirst($string) {
        return mb_strtoupper(mb_substr($string, 0, 1)) . mb_substr($string, 1);
    }
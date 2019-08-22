<?php
    $firstName = str_replace(' ', '', mb_ucfirst(mb_strtolower($_POST['firstName'])));
    $lastName = str_replace(' ', '', mb_ucfirst(mb_strtolower($_POST['lastName'])));
    $middleName = str_replace(' ', '', mb_ucfirst(mb_strtolower($_POST['middleName'])));
    $fullName = $lastName . ' ' . $firstName . ' ' . $middleName;
    $fio = mb_substr($lastName, 0, 1) . mb_substr($firstName, 0, 1) . mb_substr($middleName, 0, 1);
    $surnameAndInitials = $lastName . ' ' . mb_substr($firstName, 0, 1) . '.' . mb_substr($middleName, 0, 1) . '.';

    echo $fullName;
    echo "<br> ${fio}";
    echo "<br> ${surnameAndInitials}";

    function mb_ucfirst($string) {
        return mb_strtoupper(mb_substr($string, 0, 1)) . mb_substr($string, 1);
    }
<?php
$users = [
    'admin' => 'admin1234',
    'randomUser' => 'somePassword',
    'janitor' => 'nimbus2000'
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();

    if (isset($_POST['login'])) {
        $login = $_POST['login'];
    }

    if (isset($_POST['password'])) {
        $password = $_POST['password'];
    }

    $now = date_create('now');

    if (!isset($_SESSION['pass'])) {
        $_SESSION['pass'] = 0;
    }

    $_SESSION['pass']++;

    if (!isset($_SESSION['minInterval'])) {    
        $_SESSION['minInterval'] = date_create('+1 minutes');
    } else {
        $timeDiff = date_diff($now, $_SESSION['minInterval']);
    
        if ($timeDiff->invert === 0) {
            if ($_SESSION['pass'] >= 3) {
                echo 'Слишком часто вводите пароль. Попробуйте еще раз через минуту';
                
                $timeOfError = date("d.m.Y H:i:s \n");
                $error = fopen($login . '.txt', 'c+');

                if (filesize($login . '.txt') !== 0) {
                    fread($error, filesize($login . '.txt'));
                    fwrite($error, $timeOfError);
                } else {
                    fwrite($error, $timeOfError);
                }

                fclose($error);
                
                return false;
            }
        } else {
            $_SESSION['pass'] = 1;
            $_SESSION['minInterval'] = date_create('+1 minutes');
        }
    }

    if (!isset($_SESSION['secInterval'])) {
        $_SESSION['secInterval'] = date_create('+5 seconds');
    } else {
        $timeDiffSec = date_diff($now, $_SESSION['secInterval']);

        if ($timeDiffSec->invert === 0) {
            echo 'Слишком часто вводите пароль. Попробуйте еще раз через 5 секунд';

            return false;
        } else {
            $_SESSION['secInterval'] = date_create('+5 seconds');
        }
    }

    foreach ($users as $key => $value) {
        if ($key === $login && $value === $password) {
            $_SESSION['pass'] = 0;
            $_SESSION['minInterval'] = date_create('+1 minutes');

            echo 'Success';

            break;
        } else {
            echo 'Error';

            break;
        }
    }
    
} else {
    return false;
}
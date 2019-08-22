<?php
    $login = $_POST['login'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $middleName = $_POST['middleName'];
    $code = $_POST['code'];
    $codeWord = 'test';
    $error = ''; 

    if (preg_match('/[@\/\*?,;:]/', $login)) {
        $error .= 'В логине не могут содержаться символы @ / * ? , ; : <br>';
    } 
    
    if (strlen($password) < 8) {
        $error .= 'Пароль не может содержать меньше 8 символов <br>';
    } 
    
    if (!preg_match('/^([A-z0-9._-]+[A-z0-9]+)(@[a-z0-9]+)([.][a-z]{2,4})/', $email)) {
        $error .= 'Неверный адрес электронной почты <br>';
    } 
    
    if ($codeWord !== str_replace(' ', '', $code)) {
        $error .= 'Неверное кодовое слово <br>';
    } 

    if (strlen($firstName === 0)) {
        $error .= 'Поле имя не может быть пустым';
    }

    if (strlen($lastName === 0)) {
        $error .= 'Поле фамилия не может быть пустым';
    }

    if (strlen($middleName === 0)) {
        $error .= 'Поле отчество не может быть пустым';
    }

    if ($error !== '') { //или (strlen($error) !== 0)
        echo $error;
    } else {
        echo 'Регистрация успешна';
    }

<?php

    //обработка формы регистрации
    //прием POST параментров из формы регистрации
    $password1 = '';
    $password2 = '';
    $test_login = $_POST['login'];
    $test_name = $_POST['name'];
    $test_surname = $_POST['surname'];
    $test_password1 = $_POST['password1'];
    $password2 = $_POST['password2'];
    $test_email = $_POST['email'];
    $test_sex = $_POST['sex'];

    //валидаторы формы
        //login
        if (preg_match("/([a-z,а-я,0-9]{1,50})/i", $test_login)) {
            require_once '../models/model_registration.php';
            $registrationLogin = new Model_Registration();
            $arr = $registrationLogin -> isset_login("users", "login", "email");
            //print_r($arr);
            foreach ($arr as $key => $value) {
                foreach ($value as $k => $v) {
                    if ($k == "login" && $v == $_POST['login']) {
                        //echo "this login isset!";
                        header('Location: http://gallery.dev/');
                        //header('Location: http://plov.dp.ua/');
                        exit();
                    }
                        $login = $_POST['login'];
                }
            }

        } else {
            header('Location: http://gallery.dev/');
            //header('Location: http://plov.dp.ua/');
        }

        //name
        if (preg_match("/([a-z,а-я]{1,50})/i", $test_name)) {
            $name = $_POST['name'];
        } else {
            header('Location: http://gallery.dev/');
            //header('Location: http://plov.dp.ua/');
        }

        //surname
        if (preg_match("/([a-z,а-я]{1,50})/i", $test_surname)) {
            $surname = $_POST['surname'];
        } else {
            header('Location: http://gallery.dev/');
            //header('Location: http://plov.dp.ua/');
        }

        //password
        if (preg_match("/([a-z,0-9]{5,50})/i", $test_password1)) {
            $password1 = $_POST['password1'];
        } else {
            header('Location: http://gallery.dev/');
            //header('Location: http://plov.dp.ua/');
        }
        if ($password1 == $password2) {
            $password = md5($password1);
        } else {
            header('Location: http://gallery.dev/');
            //header('Location: http://plov.dp.ua/');
        }

        //e-mail
        if (filter_var($test_email, FILTER_VALIDATE_EMAIL)) {

            require_once '../models/model_registration.php';
            $registrationLogin = new Model_Registration();
            $arr = $registrationLogin -> isset_login("users", "login", "email");
            //print_r($arr);
            foreach ($arr as $key => $value) {
                foreach ($value as $k => $v) {
                    if ($k == "email" && $v == $_POST['email']) {
                        //echo "this login isset!";
                        header('Location: http://gallery.dev/');
                        //header('Location: http://plov.dp.ua/');
                        exit();
                    }
                    $email = $_POST['email'];
                }
            }
        }

        //sex
        if (!empty($test_sex)) {
            $sex = $_POST['sex'];
        } else {
            header('Location: http://gallery.dev/');
            //header('Location: http://plov.dp.ua/');
        }

    //заливаем информацию в базы данных
    if (!empty($login) && !empty($name) && !empty($surname) && !empty($password1) && !empty($password2) && !empty($email) && !empty($sex)) {
        include_once '../core/DbAdapter.php';
        $db=DbAdapter::getInstance();
        if ($db -> connectionDB("localhost", "gallery", "gallery", "gallery") == "false") {
            throw new Exception("Not Connect!");
        }
        $db -> setTable("users");
        $db -> addRecords("name, surname, login, password, email, sex, role", "'$name', '$surname', '$login', '$password', '$email', '$sex', 'user'");
        $db -> closeConnection();
        header('Location: http://gallery.dev/');
        //header('Location: http://plov.dp.ua/');
    } else {
        echo "not found";
    }

?>




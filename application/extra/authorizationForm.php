<?php

    //обработка формы авторизации
    $login = $_POST['login'];
    $password = md5($_POST['password']);

    if (!empty($login) && !empty($password)) {

		require_once '../models/model_authorization.php';
		$authorizationLogin = new Model_Authorization();
		$res1 = $authorizationLogin -> isset_User("users", "login");

        require_once '../core/DbAdapter.php';
        $db=DbAdapter::getInstance();
        $db -> setTable("users");
        $db -> setField("password");
        $db -> setIndexField("login");
        $db -> setIndexValue($login);
        print_r($r = $db -> selectTwoValues("login", "password"));

        foreach ($r as $key => $value) {
            foreach ($value as $k => $v) {
                if ($value["login"] == $login && $value["password"] == $password) {
                    //echo $value["login"];
                    session_start();
                    $_SESSION['login'] = $login;
                    header('Location: http://gallery.dev/');
                    //header('Location: http://plov.dp.ua/');
                } else {
                    header('Location: http://gallery.dev/');
                    //header('Location: http://plov.dp.ua/');
                }
            }
        }

    } else {
        header('Location: http://gallery.dev/authorization');
        //header('Location: http://plov.dp.ua/authorization');
    }

?>











<?php

    $username = trim(htmlspecialchars($_POST['username']));
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $login = trim(htmlspecialchars($_POST['login']));
    $pass = trim(htmlspecialchars($_POST['pass']));


    $error = '';
    if (strlen($username )<=1)
        $error = 'имя';
    elseif (strlen($login )<=1)
        $error = 'логин';
    elseif (strlen($email )<=1)
        $error = 'почта';
    elseif (strlen($pass )<=1)
        $error = 'пароль';
    if ($error != ''){
        echo $error;
        exit();
    }

    $hash = "jhfasdcxkmxzckzfmzcmcc";
    $pass = md5($pass . $hash);

require_once '../mysql_connect.php';


    $sql = 'INSERT INTO users(name,email,login,pass) VALUES (?,?,?,?)';
    $query = $pdo->prepare($sql);
    $query->execute([$username,$email,$login,$pass]);

    echo 'Готово';


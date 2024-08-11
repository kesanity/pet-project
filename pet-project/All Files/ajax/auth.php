<?php

$login = trim(htmlspecialchars($_POST['login']));
$pass = trim(htmlspecialchars($_POST['pass']));


$error = '';

if (strlen($login)<=1)
    $error = 'Введите логин';
elseif (strlen($pass)<=1)
    $error = 'Введите пароль';
if ($error != ''){
    echo $error;
    exit();
}

$hash = "jhfasdcxkmxzckzfmzcmcc";
$pass = md5($pass . $hash);

require_once '../mysql_connect.php' ;

$sql = 'SELECT `id` FROM `users` WHERE `login` = :login && `pass` = :pass';
$query = $pdo->prepare($sql);
$query->execute(['login' => $login,'pass' => $pass]);


$user = $query -> fetch(PDO::FETCH_OBJ);

if ($user-> id == 0){
    echo 'Пользователя не существует';
}
else {
    setcookie('login',$login,time()+3600 * 24 * 30, '/');

    echo 'Готово';
}

<?php

$username = trim(htmlspecialchars($_POST['username']));
$email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
$mess = trim(htmlspecialchars($_POST['mess']));



$error = '';
if (strlen($username )<=1)
    $error = 'Введите имя';
elseif (strlen($email )<=1)
    $error = 'Введите email';
elseif (strlen($mess )<=1)
    $error = 'Введите сообщение';
if ($error != ''){
    echo $error;
    exit();
}

    $my_email = "tedt@mail.ru";
    $subject = "=?utf-8?B?" . base64_encode("Сообщение с сайта"). "?=";
    $headers = "From: $email\r\nReply-to: $email\r\nContent-type: text/html; charset=utf-8\r\n ";

    mail($my_email,$subject,$mess,$headers);

    echo 'Готово';
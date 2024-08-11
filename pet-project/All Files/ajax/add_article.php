<?php
    $title = trim(htmlspecialchars($_POST['title']));
    $intro = trim(htmlspecialchars($_POST['intro']));
    $text = trim(htmlspecialchars($_POST['text']));



    $error = '';
    if (strlen($title)<=3)
        $error = 'Введите название статьи';
    elseif (strlen($intro)<=5)
        $error = 'Введите интро статьи';
    elseif (strlen($text)<=20)
        $error = 'Введите текст статьи';

    if ($error != ''){
        echo $error;
        exit();
    }

require_once '../mysql_connect.php';


    $sql = 'INSERT INTO articles(title,intro,text,date,author) VALUES (?,?,?,?,?)';
    $query = $pdo->prepare($sql);
    $query->execute([$title,$intro,$text,time(),$_COOKIE['login']]);


    echo 'Готово';



?>

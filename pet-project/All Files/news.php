<!doctype html>

<html lang="ru" class="h-100" data-bs-theme="light">

<?php

require_once 'mysql_connect.php';

    $sql = 'SELECT * FROM `articles` WHERE `id` = :id';
    $query = $pdo->prepare($sql);
    $query->execute(['id' => $_GET['id']]);

    $article = $query->fetch(PDO::FETCH_OBJ);

    $title = $article->title;


$title = '';

require "docs/head.php" ?>

<body class="d-flex flex-column h-100">

<?php  require "docs/header.php" ;   ?>

<main class="container mt-5">
    <div class="row">
        <div class="col-md-8 mb-3">
            <div class="jumbotron">
                <h1> <?= $article->title ?></h1>
                <p><b>Автор статьи:</b> <mark><?=$article->author?></mark></p>
                <?php
                $date = date("d " , $article->date);
                $array = ["Января","Февраля","Марта","Апреля","Мая","Июня","Июля","Августа",
                    "Сентября","Октября","Ноября","Декабря"];
                $date .= $array[date('n ', $article->date) - 1];
                $date .= date(" H:i ",$article->date);

                ?>
                <p><b>Время публикации:</b> <mark><?=$date?></mark></p
                <p>
                    <?= $article->intro ?>
                    <br><br>
                    <?= $article->text ?>
                </p>
            </div>
            <h3 class="mt-5">Комментарий</h3>
            <form action="/news.php?id=<?=$_GET['id']?>" method="post">
                <label for="username">Ваше имя</label>
                <input type="text" name="username" id="username" class="form-control">

                <label for="mess">Сообщение</label>
                <textarea name="mess" id="mess" class="form-control"></textarea>

                <button type="submit" id="mess_send" class="btn-success mt-3 mb-5" >Добавить комметарий</button>

            </form>
            <?php
                if (isset($_POST['username'] , $_POST['mess'])){
                    $username = trim(htmlspecialchars($_POST['username']));
                    $mess = trim(htmlspecialchars($_POST['mess']));

                    $sql = 'INSERT INTO comments(name,mess,article_id) VALUES (?,?,?)';
                    $query = $pdo->prepare($sql);
                    $query->execute([$username,$mess,$_GET['id']]);


                }

                    $sql = 'SELECT * FROM `comments` WHERE `article_id` = :id ORDER BY `id` DESC';
                    $query = $pdo ->prepare($sql);
                    $query->execute(['id' => $_GET['id']]);
                    $comments = $query -> fetchAll(PDO::FETCH_OBJ);

                    foreach ($comments as $comment){
                        echo "<div class='alert alert-info mb-2'>
                                <h4>$comment->name</h4>
                                <p>$comment->mess</p>
                                </div>";

                    }


            ?>

            </div>

        <?php  require "docs/aside.php" ;   ?>
    </div>
    </main>

<?php  require "docs/footer.php" ;   ?>

</body></html>

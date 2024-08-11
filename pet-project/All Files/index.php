<!doctype html>

<html lang="ru" class="h-100" data-bs-theme="light">

<?php $title = 'PHP Блог';

require "docs/head.php" ?>

<body class="d-flex flex-column h-100">

        <?php  require "docs/header.php" ;   ?>

<main class="container mt-5">
    <div class="row">
    <div class="col-md-8 mb-3">
        <?
        require_once 'mysql_connect.php';

        $sql = 'SELECT * FROM `articles` ORDER BY `date` DESC';
        $query = $pdo->query($sql);
        while ($row = $query->fetch(PDO::FETCH_OBJ)){
            echo "<h2>$row->title</h2>
                <p>$row->intro</p>
                <p><b>Автор статьи:</b> <mark>$row->author</mark></p>
                <a href='/news.php?id=$row->id' title='$row->title'>
                <button class='btn-warning mb-5' >Прочитать больше</button> 
                </a>";

        }

        ?>


    </div>

        <?php  require "docs/aside.php" ;   ?>

</main>

        <?php  require "docs/footer.php" ;   ?>

</body></html>
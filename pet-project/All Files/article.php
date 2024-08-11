<?php
if ( $_COOKIE['log'] == ''){
    header('Location: /reg.php');
    exit();
}
?>
<!doctype html>

<html lang="ru" class="h-100" data-bs-theme="light">

<?php $title = 'Добавление статьи';

require "docs/head.php" ?>

<body class="d-flex flex-column h-100">

<?php  require "docs/header.php" ;   ?>

<main class="container mt-5">
    <div class="row">
        <div class="col-md-8 mb-3">
            <h4>Добавление статьи</h4>
            <form action="" method="post">
                <?= $_COOKIE['login'];

                ?>
                <label for="title">Заголовок статьи</label>
                <input type="text" name="title" id="title" class="form-control">

                <label for="intro">Интро статьи</label>
                <textarea name="intro" id="intro" class="form-control" ></textarea>

                <label for="text">Заголовок статьи</label>
                <textarea name="text" id="text" class="form-control" ></textarea>

                <div class="alert alert-danger mt-2 error-block" id="errorBlock" ></div>

                <button type="submit" id="article_send" class="btn-success mt-2" >Добавить</button>

            </form>

            <div id="response"></div>

        </div>

        <?php  require "docs/aside.php" ;   ?>

</main>

<?php  require "docs/footer.php" ;   ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>

    $('#article_send').click(function (event) {
        event.preventDefault();
        var title = $('#title').val();
        var intro = $('#intro').val();
        var text = $('#text').val();



        $.ajax({
            url:'ajax/add_article.php',
            type: 'POST',
            cache: false ,
            data: { title : title, intro: intro , text : text} ,
            dataType: 'html' ,
            success: function (response) {
                // console.log(response);
                if (response == 'Готово') {
                    $('#article_send').text('Все готово')
                    $('#errorBlock').hidden();
                } else {
                    $('#errorBlock').show();
                    $('#errorBlock').text(response);
                }
            }

           });
    })

    //</script>

</body></html>
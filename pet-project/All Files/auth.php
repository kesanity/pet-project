<!doctype html>

<html lang="ru" class="h-100" data-bs-theme="light">

<?php $title = 'Авторизация на сайте';

require "docs/head.php" ?>

<body class="d-flex flex-column h-100">

<?php  require "docs/header.php" ;   ?>

<main class="container mt-5">
    <div class="row">
        <div class="col-md-8 mb-3">

            <?php
            if (isset($_COOKIE['login'])):
            ?>

            <h4>Кабинет пользователя</h4>

            <h2> <?=  $_COOKIE['login'] ?> </h2>
            <button class="btn btn-danger" id="exit_btn">Выйти</button>

            <?php
            else:
            ?>
            <h4>Форма авторизации</h4>
            <form action="" method="post">

                <label for="login">Логин</label>
                <input type="login" name="login" id="login" class="form-control">

                <label for="password">Пароль</label>
                <input type="password" name="pass" id="pass" class="form-control">

                <div class="alert alert-danger mt-2 error-block" id="errorBlock" ></div>

                <button id="auth_user" class="btn-success mt-2" >Войти</button>

            </form>

            <?php
            endif;
            ?>

        </div>

        <?php  require "docs/aside.php" ;   ?>

</main>

<?php  require "docs/footer.php" ;   ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>

    $('#exit_btn').click(function (event)  {
        event.preventDefault();


        $.ajax({
            url:'ajax/exit.php',
            type: 'POST',
            cache: false ,
            data: {} ,
            dataType: 'html' ,
            success: function (response) {
                document.location.reload(true);
            }
        })


    });


    $('#auth_user').click(function (event)  {
        event.preventDefault();
        var login = $('#login').val();
        var pass = $('#pass').val();


        $.ajax({
            url:'ajax/auth.php',
            type: 'POST',
            cache: false ,
            data: { login : login, pass: pass} ,
            dataType: 'html' ,
            success: function (response) {
                // console.log(response)
                if (response == 'Готово') {
                    document.location.reload();
                    $('#auth_user').text('Все готово')
                    $('#errorBlock').hidden();

                } else {
                    $('#errorBlock').show();
                    $('#errorBlock').text(response);
                }
            }

        });
    });


    </script>

</body></html>
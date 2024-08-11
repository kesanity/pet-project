<!doctype html>

<html lang="ru" class="h-100" data-bs-theme="light">

<?php $title = 'Регистрация';

    require "docs/head.php" ?>

<body class="d-flex flex-column h-100">

<?php  require "docs/header.php" ;   ?>

<main class="container mt-5">
    <div class="row">
        <div class="col-md-8 mb-3">
            <h4>Форма регистрации</h4>
            <form action="" method="post">
                <label for="username">Ваше имя</label>
                <input type="text" name="username" id="username" class="form-control">

                <label for="login">Логин</label>
                <input type="login" name="login" id="login" class="form-control">

                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control">

                <label for="password">Пароль</label>
                <input type="password" name="pass" id="pass" class="form-control">

                <div class="alert alert-danger mt-2 error-block" id="errorBlock" ></div>

                <button type="submit" id="reg_user" class="btn-success mt-2" href="/user.php">Зарегистрироваться</button>

            </form>

                <div id="response"></div>

        </div>

        <?php  require "docs/aside.php" ;   ?>

</main>

<?php  require "docs/footer.php" ;   ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    console.log('here')
    // Подключаем AJAX к нашим инпутам через теги
    $('#reg_user').click(function (event) {
        event.preventDefault();
        var name = $('#username').val();
        var email = $('#email').val();
        var login = $('#login').val();
        var pass = $('#pass').val();
        console.log('click')


       $.ajax({
           url:'ajax/reg.php',
           type: 'POST',
           cache: false ,
           data: { username : name, email: email , login : login, pass: pass} ,
           dataType: 'html' ,
           success: function (response) {
               console.log(response);
               if (response == 'Готово') {
                   $('#reg_user').text('Все готово')
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
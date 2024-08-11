<!doctype html>

<html lang="ru" class="h-100" data-bs-theme="light">

<?php $title = 'Контакты';

require "docs/head.php" ?>

<body class="d-flex flex-column h-100">

<?php  require "docs/header.php" ;   ?>

<main class="container mt-5">
    <div class="row">
        <div class="col-md-8 mb-3">
            <h4>Обратная связь</h4>
            <form action="" method="post">
                <label for="username">Ваше имя</label>
                <input type="text" name="username" id="username" class="form-control">

                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control">

                <label for="mess">Сообщение</label>
                <textarea type="mess" name="mess" id="mess" class="form-control"></textarea>

                <div class="alert alert-danger mt-2 error-block" id="errorBlock" ></div>

                <button type="button" id="mess_send" class="btn-success mt-2" href="/user.php">Отправить сообщение</button>

            </form>

            <div id="response"></div>

        </div>

        <?php  require "docs/aside.php" ;   ?>

</main>

<?php  require "docs/footer.php" ;   ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>

    $('#mess_send').click(function (event) {
        event.preventDefault();
        var name = $('#username').val();
        var email = $('#email').val();
        var mess = $('#mess').val();
        console.log('click')


        $.ajax({
            url:'ajax/mail.php',
            type: 'POST',
            cache: false ,
            data: { username : name, email: email , mess : mess } ,
            dataType: 'html' ,
            success: function (response) {
                console.log(response);
                if (response == 'Готово') {
                    $('#mess_send').text('Все готово')
                    $('#errorBlock').hidden();
                    $('#username').value("");
                    $('#email').value("");
                    $('#mess').value("");
                } else {
                    $('#errorBlock').show();
                    $('#errorBlock').text(response);
                }
            }

        });
    })

    //</script>

</body></html>
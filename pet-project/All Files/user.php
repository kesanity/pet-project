<!doctype html>

<html lang="ru" class="h-100" data-bs-theme="light">

<?php $title = 'Кабинет пользователя';

require "docs/head.php" ?>

<body class="d-flex flex-column h-100">

<?php  require "docs/header.php" ;   ?>

<main class="container mt-5">
    <div class="row">
        <div class="col-md-8 mb-3">
            <h4>Кабинет пользователя</h4>
            <form action="" method="post">

        <h2> <?=  $_COOKIE['login'] ?> </h2>
            <button class="btn btn-danger" id="exit_btn" href="/index.php">Выйти</button>


        </div>

        <?php  require "docs/aside.php" ;   ?>

</main>

<?php  require "docs/footer.php" ;   ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>

     $('#exit_btn').click(function (event)  {



         $.ajax({
             url:'ajax/exit.php',
             type: 'POST',
             cache: false ,
             data: {} ,
             dataType: 'html' ,
             success: function (response) {

             }
         })


     });

</script>
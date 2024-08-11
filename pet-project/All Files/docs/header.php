<header class="border-bottom lh-1 py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
            <a class="link-secondary" href="#">Подписки</a>
        </div>
        <div class="col-4 text-center">
            <a class="blog-header-logo text-body-emphasis text-decoration-none" href="#">Inner Flow</a>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
            <a class="link-secondary" href="#" aria-label="Search">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"></circle><path d="M21 21l-5.2-5.2"></path></svg>
            </a>
            <?php

            if (isset($_COOKIE['login'] )):
//                echo  $_COOKIE['login'] ;
            ?>
            <a class="btn btn-sm btn-outline-secondary" href="/article.php">Добавить статью</a>
            <a class="btn btn-sm btn-outline-secondary" href="/index.php">Главная</a>
            <a class="btn btn-sm btn-outline-secondary" href="/contacts.php">Контакты</a>
            <a class="btn btn-sm btn-outline-secondary" href="/auth.php">Кабинет пользователя</a>

            <?php

            else:

            ?>

            <a class="btn btn-sm btn-outline-secondary" href="/index.php">Главная</a>
            <a class="btn btn-sm btn-outline-secondary" href="/auth.php">Войти</a>
            <a class="btn btn-sm btn-outline-secondary" href="/reg.php">Регистрация</a>

            <?php
            endif;
            ?>
        </div>
    </div>
</header>

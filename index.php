<?php
require_once 'inc/db.php';
if (!empty($_SESSION['user_id'])) {
    echo '<script>window.location.href = "/pages/panel.php";</script>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>АИС Общежитие</title>
    <link rel='stylesheet' href='https://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/demo.css">
</head>
<body>


<main>
    <article>
        <div class="wrapper">
            <form class="form-signin" action="modules/auth.php" method="post">
                <h2 class="form-signin-heading">Авторизация</h2>
                <input type="text" class="form-control" name="login" placeholder="Логин" required="" autofocus="" />
                <input type="password" class="form-control" name="password" placeholder="Пароль" required=""/>
                <label class="checkbox">
                    <a href="/restore"> Забыли пароль?</a>
                </label>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
            </form>
        </div>
    </article>
</main>

<footer class="credit">Бирский филиал Уфимского университета науки и технологий</footer>
</body>
</html>
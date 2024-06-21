<?php
include("../inc/db.php");
$login = $_POST['login'];
if (empty($_POST['login']) || empty($_POST['password'])) {
    echo 1;
}
$login = stripslashes($login);
$login = htmlspecialchars($login);
$login = trim($login);

$result = mysqli_query(myDB(), "SELECT * FROM `user` WHERE `user_login`='" . $login . "'");
$myrow = mysqli_fetch_array($result);
if (empty($myrow['user_password'])) {
    echo "Данные введены неверно";
} else {
    if (hash('sha256', $_POST['password']) == $myrow['user_password']) {
        $_SESSION['user_id'] = $myrow['user_id'];
        echo '<script>window.location.href = "/panel";</script>';
    } else {
        echo "Данные введены неверно";
    }
}

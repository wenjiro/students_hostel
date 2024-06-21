<?php
require_once 'inc/db.php';
if (empty($_SESSION['user_id'])) {
    echo '<script>window.location.href = "/";</script>';
}

?>

<script>
    function generatePassword(){
        var length = 12,
            charset = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz~!@#$";

            res = '';
            for (var i = 0, n = charset.length; i < length; ++i) {
                res += charset.charAt(Math.floor(Math.random() * n));
            }

        var length = 6,
            charset = "0123456789";

        result = '';
        for (var i = 0, n = charset.length; i < length; ++i) {
            result += charset.charAt(Math.floor(Math.random() * n));
        }
        document.getElementById("password").value = res;
        document.getElementById("login").value = result;

    }
</script>
<title>АИС Общежитие</title>
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
      integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
<link rel='stylesheet' href='/bt/css/bootstrap.min.css'>
<link rel='stylesheet' href='/css/profile.css'>
<script src="/bt/js/bootstrap.bundle.min.js"></script>
</header>
<nav class="navbar navbar-expand-lg" id="header"
     style="border-bottom: 1px solid gray;background: white;width:100%;z-index: 999">
    <div class="container-fluid px-5">
        <a class="navbar-brand" href="/panel"><i class="fa fa-home me-2"></i>АИС Общежитие</a>

        <div class="ms-auto d-flex align-items-center order-lg-3">

            <ul class="navbar-nav navbar-right-wrap mx-2 flex-row">
                <li class="dropdown d-inline-block stopevent position-static">
                    <a
                        class="btn btn-light btn-icon rounded-circle indicator indicator-primary"
                        href="#"
                        role="button"
                        id="dropdownNotificationSecond"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">
                        <i class="fa fa-bell"></i>
                    </a>
                    <div
                        class="dropdown-menu dropdown-menu-end dropdown-menu-lg position-absolute mx-3 my-5"
                        aria-labelledby="dropdownNotificationSecond">
                        <div>
                            <div class="border-bottom px-3 pb-3 d-flex justify-content-between align-items-center">
                                <span class="h5 mb-0">Уведомления</span>
                            </div>
                            <ul class="list-group list-group-flush" data-simplebar>

                                <?php
                                $notif = mysqli_query(myDB(), "SELECT * FROM `notification` WHERE `notification_user_id`='" . $_SESSION['user_id'] . "' ORDER BY `notification_id` DESC");
                                    if($notif->num_rows)
                                    {
                                while ($notwor = mysqli_fetch_array($notif)) {



                                        ?>


                                        <li class="list-group-item bg-light">
                                            <div class="row">
                                                <div class="col">
                                                    <a class="text-body" href="#" style="text-decoration: none;">
                                                        <div class="d-flex">
                                                            <img

                                                                src="/images/<?= $notwor['notification_type'] ?>.png"
                                                                alt=""
                                                                style="width: 30px;height: 30px;"
                                                                class="avatar-md rounded-circle"/>
                                                            <div class="ms-3">
                                                                <h5 class="fw-bold mb-1"><?= $notwor['notification_title'] ?></h5>
                                                                <p class="mb-3 text-body">
                                                                    <?= $notwor['notification_text'] ?>
                                                                </p>
                                                                <span class="fs-6">
                                                                                               <span>
                                                                                               <span
                                                                                                   class="fa fa-clock me-1"></span>
                                                                                               <?= DateForm($notwor['notification_date']) ?>
                                                                                               </span>

                                                                                               </span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>

                                                <div class="col-auto text-center me-2">
                                                    <a
                                                        href="#"
                                                        class="badge-dot bg-info"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-placement="top"
                                                        title="Mark as read"></a>
                                                    <div>
                                                        <a href="#" class="bg-transparent" data-bs-toggle="tooltip"
                                                           data-bs-placement="top" title="Remove">
                                                            <i class="fa fa-x"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <?php

                                    }
                                        }
                                        else echo "<p style='padding:50px'>У вас пока нет уведомлений</p>";


                                ?>


                            </ul>
                            <div class="border-top px-3 pt-3 pb-0">
                                <a href="../pages/notification-history.html" class="text-link fw-semibold">Посмотреть
                                    все</a>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="dropdown ms-2 d-inline-block position-static">
                    <a class="rounded-circle" href="#" data-bs-toggle="dropdown" data-bs-display="static"
                       aria-expanded="false">
                        <div class="avatar avatar-md avatar-indicators avatar-online">
                            <img alt="avatar" style="width: 30px;height: 30px;"
                                 src="<?= itsMe($_SESSION['user_id'], 'user_ava') ?>" class="rounded-circle"/>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end position-absolute mx-3 my-5">
                        <div class="dropdown-item">
                            <div class="d-flex">
                                <div class="avatar avatar-md avatar-indicators avatar-online">
                                    <img alt="avatar" src="<?= itsMe($_SESSION['user_id'], 'user_ava') ?>"
                                         class="rounded-circle" style="width: 30px;"/>
                                </div>
                                <div class="ms-3 lh-1">
                                    <h5 class="mb-1"><?= itsMe($_SESSION['user_id'], 'user_name') ?> <?= itsMe($_SESSION['user_id'], 'user_lastname') ?></h5>
                                    <p class="mb-0"><?= itsMe($_SESSION['user_id'], 'user_email') ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <ul class="list-unstyled">


                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="fa fa-broom me-2"></i>
                                    График дежурства
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="../pages/student-subscriptions.html">
                                    <i class="fa fa-star me-2"></i>
                                    Выходы
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">
                                    <i class="fa fa-wrench me-2"></i>
                                    Настройки
                                </a>
                            </li>
                        </ul>
                        <div class="dropdown-divider"></div>
                        <ul class="list-unstyled">
                            <li>
                                <a class="dropdown-item" href="/logout">
                                    <i class="fa fa-power-off me-2"></i>
                                    Выйти
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <div>
            <!-- Button -->
            <button
                class="navbar-toggler collapsed fa fa-compass"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbar-default"
                aria-controls="navbar-default"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="icon-bar top-bar mt-0"></span>
                <span class="icon-bar middle-bar"></span>
                <span class="icon-bar bottom-bar"></span>
            </button>
        </div>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbar-default">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="/users"><i class="fa fa-user me-2"></i>Жители</a>
                </li>



                <li class="nav-item dropdown">

                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarDropdown"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                        data-bs-display="static">
                        <i class="fa fa-building me-2"></i> Планировка
                    </a>
                    <ul class="dropdown-menu dropdown-menu-arrow" aria-labelledby="navbarDropdown">

                        <li>
                            <a href="#!" class="dropdown-item">Комнаты</a>
                        </li>
                        <li>
                            <a href="#!" class="dropdown-item">Секции</a>
                        </li>
                        <li>
                            <a href="#!" class="dropdown-item">Этажи</a>
                        </li>

                    </ul>
                </li>

            </ul>

        </div>
    </div>
</nav>


<body class="main-content">
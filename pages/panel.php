<?php
require_once '../header.php';
$sect = itsMe($_SESSION['user_id'], 'user_room_id');
$floor = longSQL2($sect);
?>

<div class="profile">
    <div class="card-container">
        <span
            class="pro"><?= comms("user", "perm", "user_id", "perm_name", "perm_id", "user_group", $_SESSION['user_id'], "perm_name") ?></span>
        <img class="round" src="<?= itsMe($_SESSION['user_id'], 'user_ava') ?>" style="width:130px" alt="user"/>
        <h3><?= itsMe($_SESSION['user_id'], 'user_name') ?> <?= itsMe($_SESSION['user_id'], 'user_lastname') ?></h3>
        <h6>комната №<?= longSQL1($_SESSION['user_id']) ?> (<?= longSQL2($sect) ?>-я секция, <?= longSQL3($floor) ?>-й
            этаж)</h6>
        <p><?= longSQL4($_SESSION['user_id']) ?>, <?= itsMe($_SESSION['user_id'], 'user_course') ?><?= itsMe($_SESSION['user_id'], 'user_coursegroup') ?>
            группа</p>

        <div class="skills">
            <h6>Информация</h6>
            <ul>
                <li>Дата рождения: <?= DateForm(itsMe($_SESSION['user_id'], 'user_birthday')) ?></li>
                <li>Лицевой счёт: <?= itsMe($_SESSION['user_id'], 'pay_num') ?></li>
                <a href="/pay<?=$_SESSION['user_id']?>"><li>Скачать</li></a>

            </ul>
        </div>
    </div>
</div>


<?php
require_once '../header.php';
$sect = itsMe($_REQUEST['id'], 'user_room_id');
$floor = longSQL2($sect);
if($_REQUEST['id'] == itsMe($_REQUEST['id'], 'user_id'))
{
if ($_REQUEST['id'] == $_SESSION['user_id']) echo '<script>window.location.href = "/panel";</script>';
?>

<div class="profile">
    <div class="card-container">
        <span
            class="pro"><?= comms("user", "perm", "user_id", "perm_name", "perm_id", "user_group", $_REQUEST['id'], "perm_name") ?></span>
        <img class="round" src="<?= itsMe($_REQUEST['id'], 'user_ava') ?>" style="width:130px" alt="user"/>
        <h3><?= itsMe($_REQUEST['id'], 'user_name') ?> <?= itsMe($_REQUEST['id'], 'user_lastname') ?></h3>
        <h6>комната №<?= longSQL1($_REQUEST['id']) ?> (<?= longSQL2($sect) ?>-я секция, <?= longSQL3($floor) ?>-й
            этаж)</h6>
        <p><?= longSQL4($_REQUEST['id']) ?>, <?= itsMe($_REQUEST['id'], 'user_course') ?><?= itsMe($_REQUEST['id'], 'user_coursegroup') ?>
            группа</p>

        <div class="skills">
            <h6>Информация</h6>
            <ul>
                <li>Дата рождения: <?= DateForm(itsMe($_REQUEST['id'], 'user_birthday')) ?></li>
                <li>Лицевой счёт: <?= itsMe($_REQUEST['id'], 'pay_num') ?></li>

            </ul>
        </div>
    </div>
</div>
<?php
}
else echo '<script>window.location.href = "/pages/no_user";</script>';
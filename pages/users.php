<?php
require_once '../header.php';

?>
<link rel="stylesheet" href="css/list.css">
<div class="container" style="margin-top:15px;">
    <div class="block">
        <div style="width:100%">
        <h4>Список жильцов <a href="/new_user" style="color:gray;text-decoration: none;text-align: right;" title="Заселить жителя">+</a></h4>
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Жителль</th>
                <th scope="col">Комната</th>
                <th scope="col">Должность</th>
            </tr>
            </thead>
            <tbody>

            <?php
            $result = mysqli_query(myDB(), 'SELECT * FROM `user`');
            while ($row = $result->fetch_assoc()) {
                $sect = itsMe($row['user_id'], 'user_room_id');
                $floor = longSQL2($sect);
                ?>
                <tr>
                <td><a href="/user/<?= $row['user_id'] ?>"><img src="<?= $row['user_ava'] ?>" width="30" style="border-radius: 100%"> <?= $row['user_lastname'] ?> <?= $row['user_name'] ?></a>
                </td>
                <td title="<?= longSQL2($sect) ?>-я секция, <?= longSQL3($floor) ?>-й этаж">№<?= longSQL1($row['user_id']) ?></td>
                    <td><?= comms("user", "perm", "user_id", "perm_name", "perm_id", "user_group", $row['user_id'], "perm_name") ?></td>
            </tr>
            <?php } ?>

            </tbody>
        </table>


    </div>
</div>
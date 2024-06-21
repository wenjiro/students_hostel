<?php
require_once '../header.php';



?>
<link rel="stylesheet" href="css/list.css">
<div class="container" style="margin-top:15px;">
    <div class="block" id="block">
        <h4>Новый житель</h4>
        <form type="get" action="pages/user_pay/usernew.php">
            <div class="input-group mb-3">
                <span class="input-group-text">Фамилия</span>
                <input type="text" name="firstname" class="form-control" placeholder="Иванов" aria-label="Фамилия"
                       aria-describedby="basic-addon1" required>
                <span class="input-group-text">Имя</span>
                <input type="text" class="form-control" name="name" placeholder="Иван" aria-label="Имя"
                       aria-describedby="basic-addon2" required>
                <span class="input-group-text">Отчество</span>
                <input type="text" class="form-control" name="lastname" placeholder="Иванович" aria-label="Отчество"
                       aria-describedby="basic-addon2">
            </div>


            <div class="input-group mb-3">
                <span class="input-group-text">Дата рождения</span>
                <input type="date" class="form-control" name="birthday" placeholder="Дата рождения" aria-label="Дата рождения"
                       aria-describedby="basic-addon2 required">
                <span class="input-group-text">Лицевой счёт (для 2-5 курсов)</span>
                <input type="text" class="form-control" name="paynum" placeholder="30530012 (по умолчанию)" aria-label="Лицевой счёт"
                       aria-describedby="basic-addon2">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Факультет</span>
                <select required class="form-select" name="facultet" id="inputGroupSelect01">
                    <option selected>Выберите...</option>
                    <?php
                    $result = mysqli_query(myDB(), 'SELECT * FROM `facultet`');
                    while ($row = $result->fetch_assoc()) {

                        ?>
                        <option value="<?= $row['facultet_id'] ?>">(<?= $row['facultet_shortname'] ?>) <?= $row['facultet_name'] ?></option>

                    <?php } ?>
                </select>
                <span class="input-group-text">Курс</span>
                <input type="number" class="form-control" placeholder="1" min="1" max="5" name="course"
                       aria-label="Курс"
                       aria-describedby="basic-addon2" required>
                <span class="input-group-text">Группа</span>
                <input type="number" class="form-control" name="group" placeholder="1" min="1" max="9" aria-label="Группа"
                       aria-describedby="basic-addon2" required>


            </div>


            <div class="input-group mb-3">
                <span class="input-group-text">Серия и номер паспорта</span>
                <input type="text" class="form-control" placeholder="1234 567890" name="passnum" aria-label="Паспорт"
                       aria-describedby="basic-addon2" required>
                <span class="input-group-text">Кем выдан</span>
                <input type="text" class="form-control" name="passwho" placeholder="МВД ПО РЕСПУБЛИКЕ БАШКОРТОСТАН"
                       aria-label="Кем выдан"
                       aria-describedby="basic-addon2" required>

            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Дата выдачи</span>
                <input type="date" class="form-control" aria-label="Дата выдачи" name="passdate" aria-describedby="basic-addon2" required>
                <span class="input-group-text">Код подразделения</span>
                <input type="text" class="form-control" placeholder="123-456" name="passcode" aria-label="Кем выдан"
                       aria-describedby="basic-addon2" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Место рождения</span>
                <textarea class="form-control" aria-label="С текстовым полем" name="passwhere" required></textarea>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">СНИЛС</span>
                <input type="text" class="form-control" placeholder="123-456-789 10" name="snils" aria-label="СНИЛС"
                       aria-describedby="basic-addon2" required>
                <span class="input-group-text">ИНН</span>
                <input type="text" class="form-control" placeholder="012345678910" name="inn" aria-label="ИНН"
                       aria-describedby="basic-addon2" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Копия сертификата прививок</span>
                <select class="form-select" name="vactination" id="inputGroupSelect01">
                    <option selected>Отсутствует</option>
                    <option>Присутствует</option>
                </select>
                <span class="input-group-text">Сертификат об отсутствии ВИЧ инфекции</span>
                <select class="form-select" name="aid" id="inputGroupSelect01">
                    <option selected>Отсутствует</option>
                    <option>Присутствует</option>
                </select>

            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Справка от дерматолога КВД</span>
                <select class="form-select" name="derma" id="inputGroupSelect01">
                    <option selected>Отсутствует</option>
                    <option>Присутствует</option>
                </select>
                <span class="input-group-text">Справка о прохождении флюрографии</span>
                <select class="form-select" name="fluor" id="inputGroupSelect01">
                    <option selected>Отсутствует</option>
                    <option>Присутствует</option>
                </select>

            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Копия сертификата COVID-19/медицинский отвод от вакцинации</span>
                <select class="form-select" name="covid19" id="inputGroupSelect01">
                    <option selected>Отсутствует</option>
                    <option>Присутствует</option>
                </select>


            </div>

            <div class="input-group mb-3">

                <span class="input-group-text">Право на льготы (для сирот)</span>
                <select class="form-select" name="orphan" id="inputGroupSelect01">
                    <option selected>Отсутствует</option>
                    <option value ="1">Присутствует</option>
                </select>

            </div>

            <div class="input-group mb-3">

                <span class="input-group-text">Квитанция об оплате за общежитие</span>
                <select class="form-select" name="paycheck" id="inputGroupSelect01">
                    <option selected>Отсутствует</option>
                    <option>Присутствует</option>
                </select>
                <input class="btn btn-outline-secondary" type="submit" value="Скачать квитанцию" name= "DownloadQR" id="button-addon2">


            </div>

            <div class="input-group mb-3">
                <span class="input-group-text">Комната</span>
                <select required class="form-select" name="room" id="inputGroupSelect01" >
                    <option selected>Выберите...</option>
                    <?php
                    $result = mysqli_query(myDB(), 'SELECT * FROM `room` WHERE `room_seats`-`room_count_user` != 0 ORDER BY `room_number`');
                    while ($row = $result->fetch_assoc()) {

                        ?>
                        <option value="<?= $row['room_id'] ?>"><?= $row['room_number'] ?> (свободных мест: <?= $row['room_seats']-$row['room_count_user'] ?>)</option>

                    <?php } ?>
                </select>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">Логин</span>
                <input type="text" class="form-control" placeholder="ivanov" id="login" name="login" aria-label="Логин"
                       aria-describedby="basic-addon2" required>
                <span class="input-group-text">Пароль</span>
                <input type="text" placeholder="нет, не 1234 и не qwerty" class="form-control" id="password" name="password" aria-label="Пароль"
                       aria-describedby="basic-addon2" required>
                <div class="btn btn-outline-secondary" onclick="generatePassword()">Сгенерировать</div>
            </div>

            <input class="btn btn-outline-secondary" type="submit" id="button-addon2"  name="AddUser" value="Заселить">
        </form>

    </div>
</div>




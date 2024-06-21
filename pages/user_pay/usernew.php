<?php
require_once '../../inc/db.php';
require_once 'vendor/autoload.php';
require_once 'phpqrcode/qrlib.php';

if($_GET["DownloadQR"] == "Скачать квитанцию") {
    $paynum = $_GET['paynum'];
    $c = "2-5 курсов";
    if ($_GET['course'] == 1 || $_GET['course'] == null) {
        $paynum = "30530012";
        $c = "1 курса";
    }

    $firstname = $_GET['firstname'];
    $name = $_GET['name'];
    $lastname = $_GET['lastname'];

    $date = explode(".", date("m.d.y"));
    function month($month)
    {
        if ($month == '01') {
            return 'января';
        } else if ($month == '02') {
            return 'февраля';
        } else if ($month == '03') {
            return 'марта';
        } else if ($month == '04') {
            return 'апреля';
        } else if ($month == '05') {
            return 'мая';
        } else if ($month == '06') {
            return 'июня';
        } else if ($month == '07') {
            return 'июля';
        } else if ($month == '08') {
            return 'августа';
        } else if ($month == '09') {
            return 'сентября';
        } else if ($month == '10') {
            return 'октября';
        } else if ($month == '11') {
            return 'ноября';
        } else if ($month == '12') {
            return 'декабря';
        }
    }

    $text = 'ST00012|Name=УФК по Республике Башкортостан (Бирский филиал УУНиТ, л/с 20016НЖУЦ30)|PersonalAcc=03214643000000010100|BankName=ОТДЕЛЕНИЕ-НБ РЕСПУБЛИКА БАШКОРТОСТАН|BIC=018073401|CorrespAcc=40102810045370000067|PayeeINN=0274975591|KPP=025743001|OKTMO=80613101|CBC=00000000000000000130|CATEGORY=OBSHNAIM|Purpose=Проживание в общежитии|PersAcc=' . $paynum;
    $comtext = 'ST00012|Name=УФК по Республике Башкортостан (Бирский филиал УУНиТ, л/с 20016НЖУЦ30)|PersonalAcc=03214643000000010100|BankName=ОТДЕЛЕНИЕ-НБ РЕСПУБЛИКА БАШКОРТОСТАН|BIC=018073401|CorrespAcc=40102810045370000067|PayeeINN=0274975591|KPP=025743001|OKTMO=80613101|CBC=00000000000000000130|CATEGORY=OBSHKU|Purpose=Коммунальные услуги (Общежитие)|PersAcc=' . $paynum;
    $doptext = 'ST00012|Name=УФК по Республике Башкортостан (Бирский филиал УУНиТ, л/с 20016НЖУЦ30)|PersonalAcc=03214643000000010100|BankName=ОТДЕЛЕНИЕ-НБ РЕСПУБЛИКА БАШКОРТОСТАН|BIC=018073401|CorrespAcc=40102810045370000067|PayeeINN=0274975591|KPP=025743001|OKTMO=80613101|CBC=00000000000000000130|CATEGORY=OBSHDOPUSL|Purpose=Доп. услуги - общежитие|PersAcc=' . $paynum;
    if (!file_exists(__DIR__ . '/qr_new_user_' . $firstname . '/')) {
        mkdir(__DIR__ . '/qr_new_user_' . $firstname . '/', 0777, true);
    }
    QRcode::png($text, __DIR__ . '/qr_new_user_' . $firstname . '/qr.png', 'L', 8);
    QRcode::png($comtext, __DIR__ . '/qr_new_user_' . $firstname . '/qrcom.png', 'L', 8);
    QRcode::png($doptext, __DIR__ . '/qr_new_user_' . $firstname . '/qrdop.png', 'L', 8);
    $PHPWord = new \PhpOffice\PhpWord\PhpWord();
    $_doc = new \PhpOffice\PhpWord\TemplateProcessor('Template.docx');
    $_doc->setValue('last_name', $firstname);
    $_doc->setValue('name', $name);
    $_doc->setValue('surname', $lastname);
    $_doc->setValue('last_name_pay', '____________________________________________');
    $_doc->setValue('name_pay', ' ');
    $_doc->setValue('surname_pay', ' ');
    $_doc->setValue('rub1', '319');
    $_doc->setValue('kop1', '50');
    $_doc->setValue('rub2', '8190');
    $_doc->setValue('kop2', '50');
    $_doc->setValue('rub3', '1000');
    $_doc->setValue('kop3', '00');
    $_doc->setValue('c', $c);
    $_doc->setValue('lic', $paynum);
    $_doc->setValue('month', month($date[0]));
    $_doc->setValue('day', $date[1]);
    $_doc->setValue('year', '20' . $date[2]);
    $_doc->setImageValue('qr', array('path' => __DIR__ . '/qr_new_user_' . $firstname . '/qr.png', 'width' => 120, 'height' => 120));
    $_doc->setImageValue('qrcom', array('path' => __DIR__ . '/qr_new_user_' . $firstname . '/qrcom.png', 'width' => 120, 'height' => 120));
    $_doc->setImageValue('qrdop', array('path' => __DIR__ . '/qr_new_user_' . $firstname . '/qrdop.png', 'width' => 120, 'height' => 120));
// вывод непосредственно в браузер
    header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
    header('Content-Disposition: attachment;filename="Квитанция_' . $firstname . '.docx"');
    header('Cache-Control: max-age=0');
    $_doc->saveAs('php://output');
    die;
}

if($_GET["AddUser"])
{
    if($_GET["firstname"] == null || $_GET["name"] == null || $_GET["birthday"] == null || $_GET["facultet"] == null || $_GET["course"] == null || $_GET["group"] == null || $_GET["passnum"] == null || $_GET["paycheck"] == null || $_GET["room"] == null)
    {
        echo "не всего поля заполнены";
    }
    else{

        $firstname = $_GET["firstname"];$name = $_GET["name"];$lastname = $_GET["lastname"];$birthday = $_GET["birthday"];$paynum = $_GET["paynum"];$facultet = $_GET["facultet"];
        $course = $_GET["course"];$group = $_GET["group"];$passnum = $_GET["passnum"];$passwho = $_GET["passwho"];$passdate = $_GET["passdate"];$passcode = $_GET["passcode"];
        $passwhere = $_GET["passwhere"];$snils = $_GET["snils"]; $inn = $_GET["inn"];$vactination = $_GET["vactination"];$aid = $_GET["aid"];$derma = $_GET["derma"];
        $fluor = $_GET["fluor"];$covid19 = $_GET["covid19"];$orphan = $_GET["orphan"];$paycheck = $_GET["paycheck"];$room = $_GET["room"];$login = $_GET["login"];$password = hash('sha256', $_GET['password']);

       $newuser = mysqli_query(myDB(), "INSERT INTO `user` (`user_login`, `user_password`, `user_lastname`, `user_name`, `user_thirdname`, `user_room_id`, `user_facultet`, `user_course`, `user_coursegroup`, `pay_num`, `user_group`, `user_birthday`) VALUES('" . $login . "','" . $password . "', '" . $firstname . "', '" . $name . "', '" . $lastname . "', '" . $room . "', '" . $facultet . "', '" . $course . "', '" . $group . "', '" . $paynum . "', 2, '".$birthday."')");
        $toRoom = mysqli_query(myDB(), "UPDATE `room` SET `room_count_user`=`room_count_user`+1 WHERE room_id = ".$room);

        echo "Житель добавлен";

    }
}
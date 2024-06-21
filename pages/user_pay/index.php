<?php
require_once '../../inc/db.php';
require_once 'vendor/autoload.php';
require_once 'phpqrcode/qrlib.php';
$me = $_REQUEST['id'];
$c = "2-5 курсов";
if(itsMe($_REQUEST['id'], 'user_course') == 1)
{
    $c = "1 курса";
}
$date = explode(".", date("m.d.y"));
function month($month) {
    if ($month == '01') {return 'января';}
    else if ($month == '02') {return 'февраля';}
    else if ($month == '03') {return 'марта';}
    else if ($month == '04') {return 'апреля';}
    else if ($month == '05') {return 'мая';}
    else if ($month == '06') {return 'июня';}
    else if ($month == '07') {return 'июля';}
    else if ($month == '08') {return 'августа';}
    else if ($month == '09') {return 'сентября';}
    else if ($month == '10') {return 'октября';}
    else if ($month == '11') {return 'ноября';}
    else if ($month == '12') {return 'декабря';}
}
$text = 'ST00012|Name=УФК по Республике Башкортостан (Бирский филиал УУНиТ, л/с 20016НЖУЦ30)|PersonalAcc=03214643000000010100|BankName=ОТДЕЛЕНИЕ-НБ РЕСПУБЛИКА БАШКОРТОСТАН|BIC=018073401|CorrespAcc=40102810045370000067|PayeeINN=0274975591|KPP=025743001|OKTMO=80613101|CBC=00000000000000000130|CATEGORY=OBSHNAIM|Purpose=Проживание в общежитии|PersAcc='.itsMe($_REQUEST['id'], 'pay_num');
$comtext = 'ST00012|Name=УФК по Республике Башкортостан (Бирский филиал УУНиТ, л/с 20016НЖУЦ30)|PersonalAcc=03214643000000010100|BankName=ОТДЕЛЕНИЕ-НБ РЕСПУБЛИКА БАШКОРТОСТАН|BIC=018073401|CorrespAcc=40102810045370000067|PayeeINN=0274975591|KPP=025743001|OKTMO=80613101|CBC=00000000000000000130|CATEGORY=OBSHKU|Purpose=Коммунальные услуги (Общежитие)|PersAcc='.itsMe($_REQUEST['id'], 'pay_num');
$doptext = 'ST00012|Name=УФК по Республике Башкортостан (Бирский филиал УУНиТ, л/с 20016НЖУЦ30)|PersonalAcc=03214643000000010100|BankName=ОТДЕЛЕНИЕ-НБ РЕСПУБЛИКА БАШКОРТОСТАН|BIC=018073401|CorrespAcc=40102810045370000067|PayeeINN=0274975591|KPP=025743001|OKTMO=80613101|CBC=00000000000000000130|CATEGORY=OBSHDOPUSL|Purpose=Доп. услуги - общежитие|PersAcc='.itsMe($_REQUEST['id'], 'pay_num');
if (!file_exists(__DIR__ . '/qr_user_'.$_REQUEST['id'].'/')) {
    mkdir(__DIR__ . '/qr_user_'.$_REQUEST['id'].'/', 0777, true);
}
QRcode::png($text, __DIR__ . '/qr_user_'.$_REQUEST['id'].'/qr.png', 'L', 8);
QRcode::png($comtext, __DIR__ . '/qr_user_'.$_REQUEST['id'].'/qrcom.png', 'L', 8);
QRcode::png($doptext, __DIR__ . '/qr_user_'.$_REQUEST['id'].'/qrdop.png', 'L', 8);
$PHPWord = new \PhpOffice\PhpWord\PhpWord();
$_doc = new \PhpOffice\PhpWord\TemplateProcessor('Template.docx');
$_doc->setValue('last_name', itsMe($_REQUEST['id'], 'user_lastname'));
$_doc->setValue('name', itsMe($_REQUEST['id'], 'user_name'));
$_doc->setValue('surname', itsMe($_REQUEST['id'], 'user_thirdname'));
$_doc->setValue('last_name_pay', '____________________________________________');
$_doc->setValue('name_pay', ' ');
$_doc->setValue('surname_pay', ' ');
$_doc->setValue('rub1', '319');
$_doc->setValue('kop1', '50');
$_doc->setValue('rub2', '8190');
$_doc->setValue('kop2', '50');
$_doc->setValue('rub3', '1000');
$_doc->setValue('c', $c);
$_doc->setValue('kop3', '00');
$_doc->setValue('lic', itsMe($_REQUEST['id'], 'pay_num'));
$_doc->setValue('month', month($date[0]));
$_doc->setValue('day', $date[1]);
$_doc->setValue('year', '20'.$date[2]);
$_doc->setImageValue('qr', array('path' => __DIR__ . '/qr_user_'.$_REQUEST['id'].'/qr.png', 'width' => 120, 'height' => 120));
$_doc->setImageValue('qrcom', array('path' => __DIR__ . '/qr_user_'.$_REQUEST['id'].'/qrcom.png', 'width' => 120, 'height' => 120));
$_doc->setImageValue('qrdop', array('path' => __DIR__ . '/qr_user_'.$_REQUEST['id'].'/qrdop.png', 'width' => 120, 'height' => 120));
// вывод непосредственно в браузер
header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
header('Content-Disposition: attachment;filename="Квитанция_'.itsMe($_REQUEST['id'], 'user_lastname').'.docx"');
header('Cache-Control: max-age=0');
$_doc->saveAs('php://output');
die;
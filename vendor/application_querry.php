<?php
session_start();
require_once 'connect.php';
$name=$_SESSION['row']['name'];
$themes=$_POST['choose'];
$report_name=$_POST['report_name'];
$short_info=$_POST['short_info'];
$short_description=$_POST['description'];
$text_path = 'uploads/' . time() . $_FILES['text_file']['name'];
if(!move_uploaded_file($_FILES['text_file']['tmp_name'],'../' . $text_path)){
    $_SESSION['message'] = 'Ошибка при загрузки файла!';
    header('Location:../application.php');
    exit();
}
$presentation_path = 'uploads/' . time() . $_FILES['presentation_file']['name'];
if(!move_uploaded_file($_FILES['presentation_file']['tmp_name'],'../' . $presentation_path)){
    $_SESSION['message'] = 'Ошибка при загрузки файла!';
    header('Location:../application.php');
    exit();
}
$text_r= end(explode(".", $_FILES['text_file']['name']));
$presentation_r= end(explode(".", $_FILES['presentation_file']['name']));
if (($text_r!='doc' && $text_r!='docx' && $text_r!='pdf') || ($presentation_r!='ppt' && $presentation_r!='pptx' && $presentation_r !='pdf')){
    $_SESSION['message'] = 'Выбрано неправильное расширение одного из прилагаемых файлов.';
    header('Location:../application.php');
    exit();
}

$tmp = $connection->prepare('select S.id_speaker from speaker as S where S.name=?');
$tmp->execute([$name]);
$res = $tmp->fetch(PDO::FETCH_ASSOC);
$id_speaker = $res['id_speaker'];

$qwe = $connection->prepare('select * from report as R where R.id_speaker=? and R.name_report=?');
$qwe->execute([$id_speaker, $report_name]);
$res = $qwe->fetchAll(PDO::FETCH_ASSOC);
$count = $qwe->rowCount();
if($count>0) {
    $_SESSION['message'] = 'Ошибка при добавлении заявки на выступление! У вас уже сущетсвует докалд с таким же названием!';
    header('Location:../application.php');
    exit();
}

$stmt = $connection->prepare('insert into report(name_report, theme, description, file, presentation, speaker_info, id_speaker) values (?,?,?,?,?,?,?)');
$stmt->execute([$report_name, $themes, $short_description, $text_path, $presentation_path, $short_info, $id_speaker]);

$tmp = $connection->prepare('select R.id_report from report as R where R.id_speaker=?');
$tmp->execute([$id_speaker]);
$res = $tmp->fetch(PDO::FETCH_ASSOC);
$id_report = $res['id_report'];

$tmp = $connection->prepare('insert into application(id_report, id_speaker) values (?,?)');
$tmp->execute([$id_report, $id_speaker]);
$_SESSION['message'] = 'Заявка отправлена!';
header('Location: ../profile.php');


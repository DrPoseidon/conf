<?php
session_start();
require_once 'vendor/connect.php';
if(!$_SESSION['row']){
    header('Location: /');
}
$name_report = $_GET['application'];
$id_app = $_GET['id'];
$tmp = $connection->prepare('select R.id_speaker from report as R  where R.name_report=? and R.id_report = ?');
$tmp->execute([$name_report,$id_app]);
$res = $tmp->fetch(PDO::FETCH_ASSOC);
$id_speaker = $res['id_speaker'];
$tmp = $connection->prepare('select * from report as R left join application as A on R.id_speaker = A.id_speaker where R.name_report=? and R.id_speaker=? and A.id_application = ?');
$tmp->execute([$name_report, $id_speaker,$id_app]);
$res = $tmp->fetch(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Авторизация и регистрация</title>
</head>
<body style="display: flex; justify-content: center; flex-direction: column;">
<div class="container" style="width: 80%">
        <table class="table" style="margin-top: 20px;">
            <tbody>
            <tr>
                <td>Краткая информация о докладчике</td>
                <td><?= $res['speaker_info'] ?></td>
            </tr>
            <tr>
                <td>Название доклада</td>
                <td><?= $name_report ?></td>
            </tr>
            <tr>
                <td>Тематика доклада</td>
                <td><?= $res['theme'] ?></td>
            </tr>
            <tr>
                <td>Краткое описание доклада</td>
                <td><?=  $res['description']?></td>
            </tr>
            <tr>
                <td>Скачать текст доклада</td>
                <td ><a href="<?= $res['file'] ?>" download><img src="img/Downloads-icon.png" width="30px"></a></td>
            </tr>
            <tr>
                <td>Скачать презентацию доклада</td>
                <td ><a href="<?=$res['presentation']?>" download ><img src="img/Downloads-icon.png" width="30px"></a></td>

            </tr>
            </tbody>
        </table>
    <?php
    if ($_SESSION['row']['name']=='Admin' || $_SESSION['row']['name']=='admin'){
        echo '<a href="admin.php" class="btn btn-danger">В профиль</a>';
    }
    else{
        echo '<a href="profile.php" class="btn btn-danger">В профиль</a>';
    }
    ?>

</div>
</body>
</html>
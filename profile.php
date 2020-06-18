<?php
session_start();
require_once 'vendor/connect.php';
if(!$_SESSION['row']){
    header('Location: /');
}
$array = array();

$tmp = $connection->prepare('select S.id_speaker from speaker as S where S.name=?');
$tmp->execute([$_SESSION['row']['name']]);
$res = $tmp->fetch(PDO::FETCH_ASSOC);
$id_speaker = $res['id_speaker'];

$stmt = $connection->prepare('select A.id_report, S.name, S.email, R.name_report, R.description, A.id_application, R.theme 
from application as A left join report as R on R.id_report=A.id_report left join speaker as S on S.id_speaker=R.id_speaker where A.id_speaker=?');
$stmt->execute([$id_speaker]);
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
<div class="container">
    <div style="padding: 20px; font-size: 15px">
        <h2><?=$_SESSION['row']['name'] ?></h2>
    </div>

    <a href="application.php"><input type="button" value="Подать заявку" class="btn btn-success" style="margin-bottom: 10px;"></a>
        <?php
        foreach ($result as $bow){
        array_push($array,$bow);
        }
        if (count($array)>0){
       echo '<table class="table">
  <thead>
    <tr>
      <th >Номер заявки</th>
      <th >Название доклада</th>
      <th >Имя и email</th>
      <th >Тематика</th>
      <th >Краткое описание доклада</th>
    </tr>
  </thead>';
        foreach ($array as $bow){
            echo '<tr>
            <td>'.$bow['id_application'].'</td>
            <td> <a href="this_app.php?application='.$bow['name_report'].'&id='.$bow['id_application'].'"> '.$bow['name_report'].'</a></td>
            <td> <p> '.$bow['name'].'</p> <p> '.$bow['email'].'</p> </td>
            <td> <p> '.$bow['theme'].'</p></td>
            <td> <p> '.$bow['description'].'</p></td>
            <td> <a href="vendor/delete_report.php?rep_id='.$bow['id_application'].'"><img src="img/delete.png" width="20px;"></a></td>
            </tr>';
            }
        }
        else{
                $_SESSION['message'] = 'Заявок на выступление пока нет.';
            }
        ?>
        </table>
        <div class="msg_cont">
            <?php
            if($_SESSION['message']){
                echo '<p class="msg">' . $_SESSION['message'] . '</p>';
            }
            unset($_SESSION['message']);
            ?>
        </div>


    <a href="vendor/logout.php" class="btn btn-danger">Выход</a>
</div>
</body>
</html>

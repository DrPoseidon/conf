<?php
session_start();
require_once 'vendor/connect.php';
if(!$_SESSION['row']){
    header('Location: /');
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Авторизация и регистрация</title>
</head>
<body>
<div class="app_container">
<form action="vendor/application_querry.php" method="post" enctype="multipart/form-data" class="signin_form">
    <h2>Подача заявки</h2>
    <div class="input-area" style="width: 100%;">
        <label for="report-name">Введите название доклада</label>
        <input type="text"name="report_name"class="form-control" placeholder="Название доклада"  style="width: 100%;" required>
    </div>
    <div class="input-area" style="width: 100%;">
    <label for="short_info">Напишите краткую информацию о докладчике</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"name="short_info" placeholder="Краткая информация о докладчике (местро работы/учёбы, должность, достижения)" style="resize: none; width: 100%;" required></textarea>
    </div>
        <div class="form-group">
        <label for="exampleFormControlSelect1">Выберите тематику</label>
        <select class="form-control" id="exampleFormControlSelect1" style="width: 100%;" name = "choose"required>
            <option >Защита информации</option>
            <option >Искусственный интеллект</option>
            <option >Управление производственными и техническими процессами</option>
        </select>
    </div>
    <div class="input-area" style="width: 100%;">
        <label for="description">Напишите краткое описание доклада</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"name="description" placeholder="Краткое описание доклада" style="resize: none; width: 100%;" required></textarea>
    </div>

    <div class="input-group mb-3" style="margin: 16px;">
        <!--<div class="input-group-prepend">
           <span class="input-group-text" id="inputGroupFileAddon01">Загрузить</span>
       </div>-->
       <div class="custom-file" >
           <input type="file" class="custom-file-input" id="inputGroupFile01"
                  aria-describedby="inputGroupFileAddon01" name="text_file" lang="ru" required>
           <label class="custom-file-label" for="inputGroupFile01" data-browse="Выбрать" >Добавить текст с выступлением (doc, docx, pdf, размер не более 10Мб)</label>
       </div>
   </div>

   <div class="input-group mb-3">
       <!--<div class="input-group-prepend">
           <span class="input-group-text" id="inputGroupFileAddon01">Загрузить</span>
       </div>-->
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="inputGroupFile01"
                   aria-describedby="inputGroupFileAddon01" name="presentation_file" lang="ru" required>
            <label class="custom-file-label" for="inputGroupFile01" data-browse="Выбрать">Добавить файл с презентацией (ppt, pptx, pdf, размер не более 30Мб)</label>
        </div>
    </div>
    <div class="btn_cont">
    <button type="submit" class="btn btn-success" style="width: 50%;">Отправить заявку</button>
        <a href="profile.php" style="width: 30%"><input stype="button"  class="btn btn-danger" value="В профиль" style="width:100%;"></a>
    </div>

</form>
</div>
<?php
if($_SESSION['message']){
    echo '<p class="msg">' . $_SESSION['message'] . '</p>';
}
unset($_SESSION['message']);
?>
</body>
</html>
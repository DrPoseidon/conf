<?php
session_start();
if($_SESSION['row']){
    header('Location: profile.php');
}
?>
<!doctype html>
<html lang="en">
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
<div class="container">
<form action="vendor/signup.php" method="post" class="signup_form">
    <h2 style="display: flex;flex-direction: column;align-items: center;">Регистрация</h2>
    <div class="reg_cont">
    <label for="full_name">Введите имя</label>
    <input type="text"name="full_name" class="form-control" placeholder="Имя" required>
    </div>
    <div class="reg_cont">
    <label for="email">Введите Email</label>
    <input type="email" name="email" class="form-control" placeholder="Email" required>
    </div>
    <div class="reg_cont">
    <label for="password">Введите пароль</label>
    <input type="password" name="password" class="form-control" placeholder="Пароль" required>
    </div>
    <div class="reg_cont">
    <label for="password_confirm" >Подтвердите пароль</label>
    <input type="password" name="password_confirm"class="form-control" placeholder="Подтверждение пароля" required>
    </div>
    <div class="reg_cont check">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="defaultChecked2" required>
            <label class="custom-control-label" for="defaultChecked2">Вы согласны на обработку персональных данных?</label>
        </div>
    </div>

    <button type="submit" class="btn btn-success">Зарегистрироваться</button>
    <p class="info_cont a">
        <span>У вас уже есть аккаунт?  <a href="/index.php">Авторизироваться</a></span>
    </p>
    <?php
    if($_SESSION['message']){
        echo '<p class="msg">' . $_SESSION['message'] . '</p>';
    }
    unset($_SESSION['message']);
    ?>
</form>
</div>
</body>
</html>
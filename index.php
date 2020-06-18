<?php
session_start();
if($_SESSION['row']){
    header('Location:profile.php');
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Авторизация и регистрация</title>
</head>
<body>
<div class="container" >
    <h2 style="display: flex;flex-direction: column;align-items: center;">Авторизация</h2>
    <form action="vendor/signin.php" method="post" class="signin_form">
        <div class="form-group row">
            <label for="form-control" class="input-label">Имя пользователя</label>
            <div class="input-area">
                <input type="text" class="form-control"  placeholder="Введите имя" name="name" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword3" class="input-label">Пароль</label>
            <div class="input-area">
                <input type="password" class="form-control" id="inputPassword3" placeholder="Введите пароль" name="password" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Войти</button>
    </form>
        <p class="info_cont a">
             <span>У вас нет аккаунта?  <a href="/register.php">Зарегистрироваться</a></span>
        </p>
        <p class="info_cont b"> Этот сайт предназначен для регистрации участников на IT конференцию.</p>
    
</form>
</div>
<?php
if($_SESSION['message'])
{
    echo '<p class="msg">' . $_SESSION['message'] . '</p>';
}
unset($_SESSION['message']);
?>
</body>
</html>
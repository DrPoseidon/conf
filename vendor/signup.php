<?php
session_start();
require_once 'connect.php';

$full_name = $_POST['full_name'];
$email= $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];
$stmt = $connection->prepare('select name,email from speaker where name = ?  and email = ?');
$stmt->execute([$full_name, $email]);
if($stmt->rowCount() > 0){
    $_SESSION['message'] = 'Такие имя и Email уже существуют!';
    header('Location: ../register.php');
}
else {
    if ($full_name == 'admin' || $full_name == 'Admin') {
        $_SESSION['message'] = 'Такое имя пользователя недопустимо.';
        header('Location: ../register.php');
    } else {
        if ($password === $password_confirm) {
            $stmt = $connection->prepare('insert into speaker(name, email, password) values (?,?,?)');
            $stmt->execute([$full_name, $email, md5($password)]);
            $_SESSION['message'] = 'Регистрация прошла успешно!';
            header('Location: ../index.php');
        } else {
            $_SESSION['message'] = 'Пароли не совпадают!';
            header('Location: ../register.php');
        }
    }
}


<?php
session_start();
require_once 'connect.php';

$name = $_POST['name'];
$password = md5($_POST['password']);










$query = 'select * from speaker where name = ? and password = ?';
$stmt = $connection->prepare($query);
$stmt->bindValue(1,$name);
$stmt->bindValue(2,$password);
$stmt->execute();








$result = $stmt->fetchAll(PDO::FETCH_ASSOC);






$count = $stmt->rowCount();





if($count > 0)
{
    foreach ($result as $row){
       $_SESSION['row']=[
           "name" => $row['name']
       ];
    }
    if ($name=='Admin' || $name=='admin'and $password=='a49ca48de3824a5dcb12ce740720802e'){
        header('Location: ../admin.php');
    }
    else{
    header('Location: ../profile.php');
    }
}
else
    {
        $_SESSION['message'] = 'Такие имя пользователя и пароль не существуют.';
        header('Location: ../index.php');
    }












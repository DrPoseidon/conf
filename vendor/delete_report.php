<?php
session_start();
require_once 'connect.php';
$id = $_GET['rep_id'];
$query = 'delete from application where id_application = ?';
$stmt = $connection->prepare($query);
$stmt->execute([$id]);

$query = 'delete from report where id_report = ?';
$stmt = $connection->prepare($query);
$stmt->execute([$id]);

if ($_SESSION['row']['name']=='Admin' || $_SESSION['row']['name']=='admin'){
    header('Location: ../admin.php');
}
else{

    header('Location: ../profile.php');
}
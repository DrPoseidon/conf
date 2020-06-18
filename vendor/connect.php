<?php
$connection = new PDO('pgsql:host = localhost;dbname =Register','postgres','123');
if(!$connection){
    die('Error connect to db!');
}

<?php
    $login = 'NIKON';
    $database = 'management';
    $password = '1234';
    $location = 'localhost';
    $link = new PDO("mysql:host=".$location.";dbname=".$database, $login, $password);
?>
<?php
    $dbserver = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'healdworld';

    $conn = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);

    if ($conn == false){
        echo ("Connection Failed!");
    }
?>
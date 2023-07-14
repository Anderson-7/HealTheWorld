<?php
    session_start();

    include 'dbconnect.php'; 

    $deleteQuery = mysqli_query($conn, "DELETE FROM `registrationdb` WHERE id = '".$_SESSION['id']."'");

    if($deleteQuery == true){
        echo("Account Deleted!");
    }else{
        echo("Try Again!");
    }
?>
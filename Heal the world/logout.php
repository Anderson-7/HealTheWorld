<?php
    session_start();
    include 'dbconnect.php';

    $loginUser = mysqli_query($conn, "SELECT * FROM `registrationdb`  WHERE id = '".$_SESSION['id']."'");
    $user = mysqli_fetch_row($loginUser);

    if($user > 0){
        session_destroy();
        echo("Account successfully logged out");
        
        header('Refresh:3 url=login.php');
        // header('Location: login.php');
    }else{
        echo("Try logging out again");
    }


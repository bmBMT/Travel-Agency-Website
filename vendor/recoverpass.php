<?php
    session_start();
    require_once 'connect.php';

    $email = $_POST['email'];

    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email'");

    if (mysqli_num_rows($check_user) > 0) {

                // 

    } else {
        $_SESSION['account_msg'] = 'The user with this email does not exist';
        header("Location: ../pages/recoverpass_email.php");
    }
?>
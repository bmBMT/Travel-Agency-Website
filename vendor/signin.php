<?php
    session_start();
    require_once 'connect.php';

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
    
    if (mysqli_num_rows($check_user) > 0) {
        
        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = array(
            "id" => $user['id'],
            "first_name" => $user['first_name'],
            "last_name" => $user['last_name'],
            "email" => $user['email'],
            "phone" => $user['phone'],
            "avatar" => $user['avatar'],
            "role" => $user['role']
        );

        header('Location: ../index.php');
    } else {
        $_SESSION['account_msg'] = 'Wrong email or password';
        header("Location: ../pages/login.php");
    }
?>
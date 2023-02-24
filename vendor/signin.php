<?php
    session_start();
    require_once 'connect.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $error_fields = array();

    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_fields[] = 'email';
    }

    if ($password === '') {
        $error_fields[] = 'password';
    }

    if (!empty($error_fields)) {
        $response = array(
            "status" => false,
            "type" => 1,
            "massage" => 'One or more fields are empty',
            "fields" => $error_fields
        );

        echo json_encode($response);
        
        die();
    }

    $password = md5($password);

    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'");
    
    if (mysqli_num_rows($check_user) > 0) {
        
        $user = mysqli_fetch_assoc($check_user);

        $birth = implode("-", array_reverse(explode("-", mb_substr($user['birth'], 0, 10))));

        $_SESSION['user'] = array(
            "id" => $user['id'],
            "first_name" => $user['first_name'],
            "last_name" => $user['last_name'],
            "email" => $user['email'],
            "password" => $_POST['password'],
            "phone" => $user['phone'],
            "avatar" => $user['avatar'],
            "bg" => $user['bg'],
            "role" => $user['role'],
            "address" => $user['address'],
            "birth" => $birth
        );

        $response = array(
            "status" => true
        );
        echo json_encode($response);
    } else {
        $response = array(
            "status" => false,
            "massage" => 'Wrong email or password'
        );
        echo json_encode($response);
    }
?>
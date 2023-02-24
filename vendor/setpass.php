<?php
    session_start();
    require_once 'connect.php';
    mb_internal_encoding("UTF-8");

    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];
    $change_key = $_POST['change_key'];

    $user_pass = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `users` WHERE `change_key` = '$change_key'"));
    $user_pass = $user_pass['password'];

    $error_fields = array();

    if ($password === '' || strlen($password) < 6 || $user_pass == md5($password)) {
        $error_fields[] = 'password';
    }

    if ($password_confirm === '' || $password != $password_confirm) {
        $error_fields[] = 'password_confirm';
    }

    if (!empty($error_fields)) {
        $response = array(
            "status" => false,
            "type" => 1,
            "massage" => 'One or more fields are empty',
            "fields" => $error_fields
        );

        if ($password != '' && strlen($password) < 6) {
            $response['massage'] = 'The password must consist of at least 6 characters';
        } else if ($user_pass === md5($password)) {
            $response['massage'] = 'You recently used this password';
        } else if ($password != $password_confirm) {
            $response['massage'] = 'Password mismatch';
        }
        echo json_encode($response);
        
        die();
    }

    $password = md5($password);

    mysqli_query($connect, "UPDATE `users` SET `password` = '$password', `change_key`= NULL WHERE `change_key` = '$change_key'");
    $response = array(
        "status" => true,
        "massage" => 'Password has been changed'
    );
    echo json_encode($response);
?>
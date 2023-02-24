<?php
    session_start();
    require_once 'connect.php';
    mb_internal_encoding("UTF-8");

    $email = $_POST['email'];

    $error_fields = array();

    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_fields[] = 'email';
    }

    if (!empty($error_fields)) {
        $response = array(
            "status" => false,
            "type" => 1,
            "massage" => 'The field are empty',
            "fields" => $error_fields
        );

        echo json_encode($response);
        
        die();
    }

    $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email'");

    $user = mysqli_fetch_assoc($check_user);

    if (mysqli_num_rows($check_user) > 0) {
        $key = md5($email . rand(1000, 9999));
        mysqli_query($connect, "UPDATE `users` SET `change_key` = '$key' WHERE `email` = '$email'");

        $url = $site_url.'/pages/newpass.php?key='.$key;
        $massage = $user['first_name'].", you have been requested to change your password. \n\n To change follow the link: ".$url;

        $response = array(
            "status" => true,
            "massage" => 'A link to change your password has been sent to your email',
            "letter_msg" => $massage,
            "subject" => 'Forgot password'
        );
        echo json_encode($response);
    } else {
        $response = array(
            "status" => false,
            "massage" => 'Account with this email does not exist'
        );
        echo json_encode($response);
    }
?>
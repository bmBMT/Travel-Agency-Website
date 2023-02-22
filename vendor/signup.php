<?php
    session_start();
    require_once 'connect.php';

    mb_internal_encoding("UTF-8");
    function mb_ucfirst($text) {
        return mb_strtoupper(mb_substr($text, 0, 1)) . mb_substr($text, 1);
    }

    $firstName = mb_ucfirst($_POST['firstName']);
    $lastName = mb_ucfirst($_POST['lastName']);
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $password_confirm = $_POST['password_confirm'];

    $error_fields = array();

    if ($firstName === '') {
        $error_fields[] = 'firstName';
    }

    if ($lastName === '') {
        $error_fields[] = 'lastName';
    }

    if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_fields[] = 'email';
    }

    if ($password === '' || strlen($password) < 6) {
        $error_fields[] = 'password';
    }
    if ($phone === '' || ($phone[0] === "8" && strlen($phone) < 17) || ($phone[1] === "7" && strlen($phone) < 18)) {
        $error_fields[] = 'phone';
    }

    if ($password_confirm === '') {
        $error_fields[] = 'password_confirm';
    }

    if (!$_FILES['avatar']) {
        $error_fields[] = 'avatar';
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
        }
        echo json_encode($response);
        
        die();
    }

    $check_email = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email'");

    if (mysqli_num_rows($check_email) > 0) {
        $_SESSION['email_msg'] = 'This Email is already in use';
    } else if ($password === $password_confirm) {

        $path = 'uploads/' . time() . $_FILES['avatar']['name'];
        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
            $response = array(
                "status" => false,
                "type" => 2,
                "massage" => 'File upload error'
            );
            echo json_encode($response);
            die();
        }
        
        $role = 'user';
        $bg = 'uploads/defaults/defaultProlife_bg.svg';

        $password = md5($password);
        
        mysqli_query($connect, "INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `avatar`, `bg`, `role`) VALUES (NULL, '$firstName', '$lastName', '$email', '$password', '$phone', '$path', '$bg', '$role')");

        $_SESSION['success_msg'] = 'Register successfully';
        $response = array(
            "status" => true
        );
        echo json_encode($response);
    } else {
        $response = array(
            "status" => false,
            "type" => 2,
            "massage" => 'Please make sure your password match'
        );
        echo json_encode($response);
        die();
    }
?>
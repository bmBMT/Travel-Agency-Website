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

    $check_email = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email'");

    if (mysqli_num_rows($check_email) > 0) {
        $_SESSION['email_msg'] = 'This Email is already in use';
        header("Location: ../pages/sign_up.php");
    } else if ($phone[1] === "7" || $phone[0] === "8") {
        if ($phone.length < 11) {
            $_SESSION['phone_msg'] = "Enter a valid phone number";
            header("Location: ../pages/sign_up.php");
        }
    } else if ($password === $password_confirm) {

        $path = 'uploads/' . time() . $_FILES['avatar']['name'];
        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
            $_SESSION['file_msg'] = 'File upload error';
            header("Location: ../pages/sign_up.php");
        }
        
        $password = md5($password);
        
        mysqli_query($connect, "INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `avatar`, `role`) VALUES (NULL, '$firstName', '$lastName', '$email', '$password', '$phone', '$path', 'user')");

        $_SESSION['success_msg'] = 'Register successfully';
        header('Location: ../pages/login.php');
    } else {
        $_SESSION['passwordConfirm_msg'] = 'Please make sure your password match';
        header("Location: ../pages/sign_up.php");
    }
    
?>
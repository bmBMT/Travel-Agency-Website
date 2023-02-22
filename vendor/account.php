<?php
    session_start();
    require_once 'connect.php';
    mb_internal_encoding("UTF-8");

    $email = $_SESSION['user']['email'];

    if ($_FILES['avatar']) {
        changeAvatar($connect, $email);
    } else if ($_FILES['bg']) {
        changeBg($connect, $email);
    } else if ($_POST['firstName'] && $_POST['lastName']) {
        changeName($connect, $email);
    } else if ($_POST['email']) {
        changeEmail($connect, $email);
    } else if ($_POST['currentPass'] && $_POST['newPass']) {
        changePass($connect, $email);
    } else if ($_POST['address']) {
        changeAddress($connect, $email);
    } else if ($_POST['phone']) {
        changePhone($connect, $email);
    } else {
        header("Location: /pages/account.php");
    }

    function changeAvatar($connect, $email) {
        $path = 'uploads/' . time() . $_FILES['avatar']['name'];
        if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
            $_SESSION['file_msg'] = 'File upload error';
            header("Location: ../pages/account.php");
        }

        if (!unlink('../' . $_SESSION['user']['avatar'])) {
            // 
        }
        mysqli_query($connect, "UPDATE `users` SET `avatar` = '$path' WHERE `email` = '$email'");
        $_SESSION['user']['avatar'] = $path;
        header("Location: /pages/account.php");
    }

    function changeBg($connect, $email) {
        $link = 'uploads/backgrounds/' . time() . $_FILES['bg']['name'];
        if (!move_uploaded_file($_FILES['bg']['tmp_name'], '../' . $link)) {
            header("Location: ../pages/account.php");
        }

        if ($_SESSION['user']['bg'] != 'uploads/defaults/defaultProlife_bg.svg') {
            if (!unlink('../' . $_SESSION['user']['bg'])) {
                continue;
            }
        }
        mysqli_query($connect, "UPDATE `users` SET `bg` = '$link' WHERE `email` = '$email'");
        $_SESSION['user']['bg'] = $link;
        header("Location: /pages/account.php");
    }
    
    function changeName($connect, $email) {
        $first_name = $_POST['firstName'];
        $last_name = $_POST['lastName'];
        mysqli_query($connect, "UPDATE `users` SET `first_name` = '$first_name', `last_name` = '$last_name' WHERE `email` = '$email'");
        $_SESSION['user']['first_name'] = $first_name;
        $_SESSION['user']['last_name'] = $last_name;
        echo "success";
    }

    function changeEmail($connect, $email) {
        $new_email = $_POST['email'];
        $check_user = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$new_email'");
        if (mysqli_num_rows($check_user) > 0) {
            echo "This email alredy exists";
        } else {
            mysqli_query($connect, "UPDATE `users` SET `email` = '$new_email' WHERE `email` = '$email'");
            $_SESSION['user']['email'] = $new_email;
            echo "success";
        }
    }

    function changePass($connect, $email) {
        $current_pass = md5($_POST['currentPass']);
        $new_pass = md5($_POST['newPass']);
        if ($_POST['currentPass'] != $_SESSION['user']['password']) {
            echo ("The current password is incorrect");
        } else if (strlen($_POST['newPass']) < 6) {
            echo "The password must consist of at least 6 characters";
        } else {
            mysqli_query($connect, "UPDATE `users` SET `password` = '$new_pass' WHERE `email` = '$email'");
            $_SESSION['user']['password'] = $_POST['newPass'];
            echo "success";
        }
    }

    function changePhone($connect, $email) {
        $phone = $_POST['phone'];
        mysqli_query($connect, "UPDATE `users` SET `phone` = '$phone' WHERE `email` = '$email'");
        $_SESSION['user']['phone'] = $phone;
        header("Location: /pages/account.php");
    }

    function changeAddress($connect, $email) {
        $address = $_POST['address'];
        mysqli_query($connect, "UPDATE `users` SET `address` = '$address' WHERE `email` = '$email'");
        $_SESSION['user']['address'] = $address;
        echo "success";
    }
?>
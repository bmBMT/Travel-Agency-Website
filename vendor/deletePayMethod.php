<?php
    session_start();
    require_once 'connect.php';
    mb_internal_encoding("UTF-8");

    if ($_SESSION['user']) {
        $id = $_POST['id'];

        mysqli_query($connect, "DELETE FROM `payments` WHERE `id` = '$id'");
        $response = array(
            "status" => true
        );
        echo json_encode($response);
    } else {
        header("Location: /");
    }
?>
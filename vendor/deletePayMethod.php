<?php
    session_start();
    require_once 'connect.php';
    mb_internal_encoding("UTF-8");

    if ($_SESSION['user']) {
        $emai = $_SESSION['user']['email'];
        $card_num = $_POST['card_num'];
        $name = $_POST['name'];
        $exp_date = $_POST['exp_date'];

        mysqli_query($connect, "DELETE FROM `payments` WHERE `email` = '$emai' AND `card_num` = '$card_num' AND `name` = '$name' AND `exp_date` = '$exp_date'");
        $response = array(
            "status" => true
        );
        echo json_encode($response);
    } else {
        header("Location: /");
    }
?>
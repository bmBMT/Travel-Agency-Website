<?php
    session_start();
    require_once 'connect.php';

    $userID = $_SESSION['user']['id'];
    $payTotal = $_POST['payTotal'];
    $paymentID = $_POST['paymentID'];

        
?>
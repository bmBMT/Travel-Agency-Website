<?php
    session_start();
    require_once 'connect.php';

    $rating = $_POST['rating'];
    $ratingText = $_POST['ratingText'];
    $reviewText = $_POST['reviewText'];

    $error_fields = array();

    if ($rating === '') {
        $error_fields[] = 'rating';
    }
    if ($ratingText === '') {
        $error_fields[] = 'ratingText';
    }
    if ($reviewText === '') {
        $error_fields[] = 'reviewText';
    }

    if (!empty($error_fields)) {
        $response = array(
            "status" => false,
            "type" => 1,
            "massage" => 'Not all fields were filled',
            "fields" => $error_fields
        );

        echo json_encode($response);

        die;
    }

    if ($_SESSION['user']) {
        
    } else {
        $response = array(
            "status" => false,
            "massage" => 'You must be logged in to leave a review!'
        );
        echo json_encode($response);
    }
?>
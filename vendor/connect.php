<?php
    $connect = mysqli_connect('localhost','root','','project_bd');

    if (!$connect) {
        die('Error connect to DataBase');
    }
<?php
    $host = '127.0.0.1';
    $user = 'root';
    $password = '';
    $db_name = 'project_bd';

    $connect = mysqli_connect($host,$user,$password,$db_name);

    if (!$connect) {
        die('Error connect to DataBase');
    }

    /* Site url */

    $site_url = "http://localhost.test/";

    /* Change character set to utf8 */
    mysqli_set_charset($connect, "utf8");
<?php

$db_host = 'localhost';
$db_database = 'perpustakaan';
$db_username = 'root';
$db_password = '';

$db = mysqli_connect($db_host, $db_username, $db_password, $db_database);

if (!$db){
    echo "Error Connect to mysql : ".mysqli_connect_error();
}
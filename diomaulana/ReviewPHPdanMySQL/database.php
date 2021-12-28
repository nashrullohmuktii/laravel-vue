<?php

$db_host = 'localhost';
$db_database = 'perpustakaan';
$db_username = 'root';
$db_password = '';

$db = mysqli_connect($db_host, $db_username, $db_password, $db_database);

if (!$db){
    echo "Error Connect to mysql : ".mysqli_connect_error();
}

$sql = "SELECT * FROM anggotas";
$query = $db->query($sql);

if($query->num_rows > 0){
    while ($row = $query->fetch_assoc()){
        echo "id anggota : ". $row['id']  .", nama anggota : ". $row['name'] ." , alamat : " . $row['alamat'] . " , email : " . $row['email'] . "<br>";

    }
} else {
    echo 'Tidak ada data anggota';
}
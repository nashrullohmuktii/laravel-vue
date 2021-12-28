<?php

include_once('database.php');
$pengarang = mysqli_query($db, "SELECT * FROM pengarangs");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengarang</title>
</head>
<body>
    <center>
        <a href="index.php">Buku</a>
        <a href="penerbit.php">Penerbit</a>
        <a href="pengarang.php">Pengarang</a>
        <a href="katalog.php">Katalog</a>
    </center>
    <a href="add-pengarang.php?to=pengarang">Tambah Pengarang</a>
    <table widht="80%" border="1">
        <tr>
            <th>ID</th>
            <th>Nama Pengarang</th>
            <th>Email</th>
            <th>Telp</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php
        while($row = mysqli_fetch_assoc($pengarang)){
        ?>
        <tr>
            <td><?=$row['id']?></td>
            <td><?=$row['nama_pengarang']?></td>
            <td><?=$row['email']?></td>
            <td><?=$row['telp']?></td>
            <td><?=$row['alamat']?></td>
            <td><a href="edit-pengarang.php?id_pengarang=<?=$row['id']?>">Edit</a> | <a href="delete-pengarang.php?id_pengarang=<?=$row['id']?>">Hapus</a></td>
        </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>
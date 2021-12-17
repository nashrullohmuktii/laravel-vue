<?php

include_once('database.php');
$penerbit = mysqli_query($db, "SELECT * FROM penerbits");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penerbits</title>
</head>
<body>
    <center>
        <a href="index.php">Buku</a>
        <a href="penerbit.php">Penerbit</a>
        <a href="pengarang.php">Pengarang</a>
        <a href="katalog.php">Katalog</a>
    </center>
    <a href="add-penerbit.php?to=penerbit">Tambah Penerbit</a>
    <table widht="80%" border="1">
        <tr>
            <th>ID</th>
            <th>Nama Penerbit</th>
            <th>Email</th>
            <th>Telp</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php
        while($row = mysqli_fetch_assoc($penerbit)){
        ?>
        <tr>
            <td><?=$row['id']?></td>
            <td><?=$row['nama_penerbit']?></td>
            <td><?=$row['email']?></td>
            <td><?=$row['telp']?></td>
            <td><?=$row['alamat']?></td>
            <td><a href="edit-penerbit.php?id_penerbit=<?=$row['id']?>">Edit</a> | <a href="delete-penerbit.php?id_penerbit=<?=$row['id']?>">Hapus</a></td>
        </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>
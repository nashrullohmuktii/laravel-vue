<?php

include_once('database.php');
$katalog = mysqli_query($db, "SELECT * FROM katalogs");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog</title>
</head>
<body>
    <center>
        <a href="index.php">Buku</a>
        <a href="penerbit.php">Penerbit</a>
        <a href="pengarang.php">Pengarang</a>
        <a href="katalog.php">Katalog</a>
    </center>
    <a href="add-katalog.php?to=katalog">Tambah Katalog</a>
    <table widht="80%" border="1">
        <tr>
            <th>ID</th>
            <th>Nama Katalog</th>
            <th>Aksi</th>
        </tr>
        <?php
        while($row = mysqli_fetch_assoc($katalog)){
        ?>
        <tr>
            <td><?=$row['id']?></td>
            <td><?=$row['nama']?></td>
            <td><a href="edit-katalog.php?id_katalog=<?=$row['id']?>">Edit</a> | <a href="delete-katalog.php?id_katalog=<?=$row['id']?>">Hapus</a></td>
        </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>
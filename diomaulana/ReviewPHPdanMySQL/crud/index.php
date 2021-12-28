<?php

include_once('database.php');
$buku = mysqli_query($db, "SELECT bukus.*, nama_pengarang, nama_penerbit, katalogs.nama as nama_katalog
                    FROM bukus
                    LEFT JOIN penerbits ON penerbits.id = bukus.id_penerbit
                    LEFT JOIN pengarangs ON pengarangs.id = bukus.id_pengarang
                    LEFT JOIN katalogs ON katalogs.id = bukus.id_katalog
                    ORDER BY judul ASC");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <center>
        <a href="index.php">Buku</a>
        <a href="penerbit.php">Penerbit</a>
        <a href="pengarang.php">Pengarang</a>
        <a href="katalog.php">Katalog</a>
    </center>
    <a href="add.php?to=buku">Tambah Buku</a>
    <table widht="80%" border="1">
        <tr>
            <th>ISBN</th>
            <th>Judul</th>
            <th>Tahun</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
            <th>Katalog</th>
            <th>Stok</th>
            <th>Harga Pinjam</th>
            <th>Aksi</th>
        </tr>
        <?php
        while($row = mysqli_fetch_assoc($buku)){
        ?>
        <tr>
            <td><?=$row['isbn']?></td>
            <td><?=$row['judul']?></td>
            <td><?=$row['tahun']?></td>
            <td><?=$row['nama_pengarang']?></td>
            <td><?=$row['nama_penerbit']?></td>
            <td><?=$row['nama_katalog']?></td>
            <td><?=$row['qty_stok']?></td>
            <td><?=$row['harga_pinjam']?></td>
            <td><a href="edit.php?isbn=<?=$row['isbn']?>">Edit</a> | <a href="delete.php?isbn=<?=$row['isbn']?>">Hapus</a></td>
        </tr>
        <?php
        }
        ?>
    </table>
</body>
</html>
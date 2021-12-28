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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Perpustakaan Dio Maulana</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" href="index.php">Buku</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="penerbit.php">Penerbit</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="pengarang.php">Pengarang</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="katalog.php">Katalog</a>
                </li>
            </ul>
            </div>
        </div>
        </nav>
    </div>
    <br>
    <div class="container">
        <div>
            <a href="add.php?to=buku"><button type="button" class="btn btn-primary">Tambah Buku</button></a> 
        </div>
        <br>
        <table class="table table-striped" widht="80%" border="1">
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
                <td><a href="edit.php?isbn=<?=$row['isbn']?>"><button type="button" class="btn btn-warning">Edit</button></a>  <a href="delete.php?isbn=<?=$row['isbn']?>"><button type="button" class="btn btn-danger">Hapus</button></a></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>
</html>
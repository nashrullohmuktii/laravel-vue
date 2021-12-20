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
                <a class="nav-link" href="index.php">Buku</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="penerbit.php">Penerbit</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="pengarang.php">Pengarang</a>
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
            <a href="add-pengarang.php?to=pengarang"><button type="button" class="btn btn-primary">Tambah Pengarang</button></a> 
        </div>
        <br>
        <table class="table table-striped" widht="80%" border="1">
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
                <td><a href="edit-pengarang.php?id_pengarang=<?=$row['id']?>"><button type="button" class="btn btn-warning">Edit</button></a>  <a href="delete-pengarang.php?id_pengarang=<?=$row['id']?>"><button type="button" class="btn btn-danger">Hapus</button></a></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>
</html>
<?php
include_once('database.php');


if(isset($_POST['nama'])){
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];
    $now = date("Y-m-d H:i:s");
    $insert = mysqli_query($db, "INSERT INTO `penerbits` (`nama_penerbit`, `email`, `telp`, `alamat`, `created_at`) VALUES ('$nama', '$email', '$telp', '$alamat', '$now')");
    if($insert == true){
        header("Location:penerbit.php");
    } else {
        echo $db->error;
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah <?=ucfirst($_GET['to'])?></title>
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
                <a class="nav-link active" href="penerbit.php">Penerbit</a>
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
    <div class="container">
    <h1 class="fw-bolder">Tambah Penerbit</h1>
    <?php
    if($_GET['to'] === 'penerbit'){
    ?>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Penerbit</label>
                <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" placeholder="Jhon Doe">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email Penerbit</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="JhonDoe@email.com">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Telp Penerbit</label>
                <input type="text" name="telp" class="form-control" id="exampleFormControlInput1" placeholder="08121212121">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Alamat Penerbit</label>
                <input type="text" name="alamat" class="form-control" id="exampleFormControlInput1" placeholder="Jakarta">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    <?php
    }
    ?>
    </div>
</body>
</html>
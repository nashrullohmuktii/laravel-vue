<?php
include_once('database.php');


if(isset($_POST['nama'])){
    $nama = $_POST['nama'];
    $now = date("Y-m-d H:i:s");
    $insert = mysqli_query($db, "INSERT INTO `katalogs` (`nama`, `created_at`) VALUES ('$nama', '$now')");
    if($insert == true){
        header("Location:katalog.php");
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
                <a class="nav-link" href="penerbit.php">Penerbit</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="pengarang.php">Pengarang</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" href="katalog.php">Katalog</a>
                </li>
            </ul>
            </div>
        </div>
        </nav>
    </div>
    <div class="container">
    <?php
    if($_GET['to'] === 'katalog'){
    ?>
        <form action="" method="POST">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Katalog</label>
                <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" placeholder="Katalog Jhon">
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    <?php
    }
    ?>
    </div>
</body>
</html>
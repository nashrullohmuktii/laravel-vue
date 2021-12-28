

<?php
include_once('database.php');

    if(isset($_POST['nama_pengarang'])){
        $nama_pengarang = $_POST['nama_pengarang'];
        $email = $_POST['email'];
        $telp = $_POST['telp'];
        $alamat = $_POST['alamat'];
        $now = date("Y-m-d H:i:s");
        $update_pengarang = mysqli_query($db, "UPDATE pengarangs SET nama_pengarang = '$nama_pengarang', email = '$email', telp = '$telp' , alamat = '$alamat', updated_at = '$now' WHERE id = '".$_GET['id_pengarang']."' ");
        if($update_pengarang == true){
            header("Location:pengarang.php");
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
    <title>Edit</title>
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
    <div class="container">
    <?php
        if($_GET['id_pengarang']){
            $pengarang = mysqli_query($db, "SELECT * FROM pengarangs WHERE id = '".$_GET['id_pengarang']."'");
            $data_pengarang = mysqli_fetch_assoc($pengarang);
            if(mysqli_num_rows($pengarang) == 0){
                die("Data tidak ditemukan");
            }
        ?>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Pengarang</label>
                    <input type="text" name="nama_pengarang" class="form-control" id="exampleFormControlInput1" value="<?=$data_pengarang['nama_pengarang']?>">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email Pengarang</label>
                    <input type="email" name="email" class="form-control" id="exampleFormControlInput1" value="<?=$data_pengarang['email']?>">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Telp Pengarang</label>
                    <input type="text" name="telp" class="form-control" id="exampleFormControlInput1" value="<?=$data_pengarang['telp']?>">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Alamat Pengarang</label>
                    <input type="text" name="alamat" class="form-control" id="exampleFormControlInput1" value="<?=$data_pengarang['alamat']?>">
                </div>
                <button type="submit" class="btn btn-success">Update</button>
            </form>
        <?php
        }
        ?>
    </div>
</body>
</html>

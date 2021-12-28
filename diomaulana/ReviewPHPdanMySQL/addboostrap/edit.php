<?php
include_once('database.php');

    if(isset($_POST['judul'])){
        $judul = $_POST['judul'];
        $tahun = $_POST['tahun'];
        $id_pengarang = $_POST['pengarang'];
        $id_penerbit = $_POST['penerbit'];
        $id_katalog = $_POST['katalog'];
        $stok = $_POST['stok'];
        $harga_pinjam = $_POST['harga_pinjam'];
        $now = date("Y-m-d H:i:s");
        $update_buku = mysqli_query($db, "UPDATE bukus SET judul = '$judul', tahun = '$tahun', id_penerbit = '$id_penerbit' , id_pengarang = '$id_pengarang', id_katalog = '$id_katalog', qty_stok = '$stok', harga_pinjam = '$harga_pinjam', updated_at = '$now' WHERE isbn = '".$_GET['isbn']."' ");
        if($update_buku == true){
            header("Location:index.php");
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
    if($_GET['isbn']){
        $buku = mysqli_query($db, "SELECT * FROM bukus WHERE isbn = '".$_GET['isbn']."'");
        $penerbit = mysqli_query($db, "SELECT * FROM penerbits");
        $pengarang = mysqli_query($db, "SELECT * FROM pengarangs");
        $katalog = mysqli_query($db, "SELECT * FROM katalogs");
        $data_buku = mysqli_fetch_assoc($buku);
        if(mysqli_num_rows($buku) == 0){
            die("Data tidak ditemukan");
        }
    ?>
        <form action="" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">ISBN</label>
                <input type="number" class="form-control" id="exampleFormControlInput1" value="<?=$_GET['isbn']?>" disabled>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" id="exampleFormControlInput1" value="<?=$data_buku['judul']?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tahun</label>
                <input type="number" name="tahun" class="form-control" id="exampleFormControlInput1" value="<?=$data_buku['tahun']?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Pengarang</label>
                <select name="pengarang" class="form-select" aria-label="Default select example">
                    <?php
                            while($data_pengarang = mysqli_fetch_assoc($pengarang)){
                            echo "<option ".($data_pengarang['id'] == $data_buku['id_pengarang'] ? 'selected' : '')." value='".$data_pengarang['id']."'>".$data_pengarang['nama_pengarang']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Penerbit</label>
                <select name="penerbit" class="form-select" aria-label="Default select example">
                    <?php
                        while($data_penerbit = mysqli_fetch_assoc($penerbit)){
                            echo "<option ".($data_penerbit['id'] == $data_buku['id_penerbit'] ? 'selected' : '')." value='".$data_penerbit['id']."'>".$data_penerbit['nama_penerbit']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Katalog</label>
                <select name="katalog" class="form-select" aria-label="Default select example">
                    <?php
                        while($data_katalog = mysqli_fetch_assoc($katalog)){
                            echo "<option ".($data_katalog['id'] == $data_buku['id_katalog'] ? 'selected' : '')." value='".$data_katalog['id']."'>".$data_katalog['nama']."</option>";
                        }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Stok</label>
                <input type="number" name="stok" class="form-control" id="exampleFormControlInput1" value="<?=$data_buku['qty_stok']?>">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Harga Pinjam</label>
                <input type="number" name="harga_pinjam" class="form-control" id="exampleFormControlInput1" value="<?=$data_buku['harga_pinjam']?>">
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    <?php
    }
    ?>
    </div>
</body>
</html>

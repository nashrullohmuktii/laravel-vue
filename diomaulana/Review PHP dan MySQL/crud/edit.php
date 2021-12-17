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
</head>
<body>
    <center>
        <a href="index.php">Homepage</a>
    </center>
    <br><br>
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
            <table width="50%" border="0">
                    <tr>
                        <td>ISBN</td>
                        <td><?=$_GET['isbn']?></td>
                    </tr>
                    <tr>
                        <td>Judul</td>
                        <td><input type="text" name="judul" value="<?=$data_buku['judul']?>" ></td>
                    </tr>
                    <tr>
                        <td>Tahun</td>
                        <td><input type="number" name="tahun" value="<?=$data_buku['tahun']?>" ></td>
                    </tr>
                    <tr>
                        <td>Pengarang</td>
                        <td>
                            <select name="pengarang">
                                <?php
                                     while($data_pengarang = mysqli_fetch_assoc($pengarang)){
                                        echo "<option ".($data_pengarang['id'] == $data_buku['id_pengarang'] ? 'selected' : '')." value='".$data_pengarang['id']."'>".$data_pengarang['nama_pengarang']."</option>";
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Penerbit</td>
                        <td>
                            <select name="penerbit">
                                <?php
                                    while($data_penerbit = mysqli_fetch_assoc($penerbit)){
                                        echo "<option ".($data_penerbit['id'] == $data_buku['id_penerbit'] ? 'selected' : '')." value='".$data_penerbit['id']."'>".$data_penerbit['nama_penerbit']."</option>";
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Katalog</td>
                        <td>
                            <select name="katalog">
                                <?php
                                    while($data_katalog = mysqli_fetch_assoc($katalog)){
                                        echo "<option ".($data_katalog['id'] == $data_buku['id_katalog'] ? 'selected' : '')." value='".$data_katalog['id']."'>".$data_katalog['nama']."</option>";
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Stok</td>
                        <td><input type="number" name="stok" value="<?=$data_buku['qty_stok']?>" ></td>
                    </tr>
                    <tr>
                        <td>Harga Pinjam</td>
                        <td><input type="number" name="harga_pinjam" value="<?=$data_buku['harga_pinjam']?>" ></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button type="submit"> Update</button></td>
                    </tr>
                    
                </table>
        </form>
    <?php
    }
    ?>

</body>
</html>

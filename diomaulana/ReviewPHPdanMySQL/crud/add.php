<?php
include_once('database.php');

$penerbit = mysqli_query($db, "SELECT * FROM penerbits");
$pengarang = mysqli_query($db, "SELECT * FROM pengarangs");
$katalog = mysqli_query($db, "SELECT * FROM katalogs");

if(isset($_POST['isbn'])){
    $isbn = $_POST['isbn'];
    $judul = $_POST['judul'];
    $tahun = $_POST['tahun'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $katalog = $_POST['katalog'];
    $stok = $_POST['stok'];
    $harga_pinjam = $_POST['harga_pinjam'];
    $now = date("Y-m-d H:i:s");
    $insert = mysqli_query($db, "INSERT INTO `bukus` (`isbn`, `judul`, `tahun`, `id_penerbit`, `id_pengarang`, `id_katalog`, `qty_stok`, `harga_pinjam`, `created_at`) VALUES ('$isbn', '$judul', '$tahun', '$penerbit', '$pengarang', '$katalog', '$stok', '$harga_pinjam', '$now')");
    if($insert == true){
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
    <title>Tambah <?=ucfirst($_GET['to'])?></title>
</head>
<body>
    <center>
        <a href="index.php">Homepage</a>
    </center>
    <br><br>
    <?php
    if($_GET['to'] === 'buku'){
    ?>
        <form action="" method="POST">
            <table width="50%" border="0">
                <tr>
                    <td>ISBN</td>
                    <td><input type="text" name="isbn"></td>
                </tr>
                <tr>
                    <td>Judul</td>
                    <td><input type="text" name="judul"></td>
                </tr>
                <tr>
                    <td>Tahun</td>
                    <td><input type="number" name="tahun"></td>
                </tr>
                <tr>
                    <td>Pengarang</td>
                    <td>
                        <select name="pengarang">
                            <?php
                                while($data_pengarang = mysqli_fetch_assoc($pengarang)){
                                    echo "<option value='".$data_pengarang['id']."'>".$data_pengarang['nama_pengarang']."</option> ";
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
                                    echo "<option value='".$data_penerbit['id']."'>".$data_penerbit['nama_penerbit']."</option> ";
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
                                    echo "<option value='".$data_katalog['id']."'>".$data_katalog['nama']."</option> ";
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Stok</td>
                    <td><input type="number" name="stok"></td>
                </tr>
                <tr>
                    <td>Harga Pinjam</td>
                    <td><input type="number" name="harga_pinjam"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit"> Submit</button></td>
                </tr>
                
            </table>
        </form>
    <?php
    }
    ?>
    
</body>
</html>
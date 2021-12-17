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
</head>
<body>
    <center>
        <a href="penerbit.php">Penerbit</a>
    </center>
    <br><br>
    <?php
    if($_GET['to'] === 'penerbit'){
    ?>
        <form action="" method="POST">
            <table width="50%" border="0">
                <tr>
                    <td>Nama Penerbit</td>
                    <td><input type="text" name="nama"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email"></td>
                </tr>
                <tr>
                    <td>Telp</td>
                    <td><input type="text" name="telp"></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td><input type="text" name="alamat"></td>
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
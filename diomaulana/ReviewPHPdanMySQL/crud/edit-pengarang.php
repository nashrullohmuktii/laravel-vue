

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
</head>
<body>
    <center>
        <a href="penerbit.php">Back</a>
    </center>
    <br><br>
    <?php
        if($_GET['id_pengarang']){
            $pengarang = mysqli_query($db, "SELECT * FROM pengarangs WHERE id = '".$_GET['id_pengarang']."'");
            $data_pengarang = mysqli_fetch_assoc($pengarang);
            if(mysqli_num_rows($pengarang) == 0){
                die("Data tidak ditemukan");
            }
        ?>
            <form action="" method="post">
                <table width="50%" border="0">
                        <tr>
                            <td>ID</td>
                            <td><?=$_GET['id_pengarang']?></td>
                        </tr>
                        <tr>
                            <td>Nama Pengarang</td>
                            <td><input type="text" name="nama_pengarang" value="<?=$data_pengarang['nama_pengarang']?>" ></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="email" value="<?=$data_pengarang['email']?>" ></td>
                        </tr>
                        <tr>
                            <td>Telp</td>
                            <td><input type="text" name="telp" value="<?=$data_pengarang['telp']?>" ></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><input type="text" name="alamat" value="<?=$data_pengarang['alamat']?>" ></td>
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

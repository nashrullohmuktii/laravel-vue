

<?php
include_once('database.php');

    if(isset($_POST['nama_penerbit'])){
        $nama_penerbit = $_POST['nama_penerbit'];
        $email = $_POST['email'];
        $telp = $_POST['telp'];
        $alamat = $_POST['alamat'];
        $now = date("Y-m-d H:i:s");
        $update_penerbit = mysqli_query($db, "UPDATE penerbits SET nama_penerbit = '$nama_penerbit', email = '$email', telp = '$telp' , alamat = '$alamat', updated_at = '$now' WHERE id = '".$_GET['id_penerbit']."' ");
        if($update_penerbit == true){
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
    <title>Edit</title>
</head>
<body>
    <center>
        <a href="penerbit.php">Back</a>
    </center>
    <br><br>
    <?php
        if($_GET['id_penerbit']){
            $penerbit = mysqli_query($db, "SELECT * FROM penerbits WHERE id = '".$_GET['id_penerbit']."'");
            $data_penerbit = mysqli_fetch_assoc($penerbit);
            if(mysqli_num_rows($penerbit) == 0){
                die("Data tidak ditemukan");
            }
        ?>
            <form action="" method="post">
                <table width="50%" border="0">
                        <tr>
                            <td>ID</td>
                            <td><?=$_GET['id_penerbit']?></td>
                        </tr>
                        <tr>
                            <td>Nama Penerbit</td>
                            <td><input type="text" name="nama_penerbit" value="<?=$data_penerbit['nama_penerbit']?>" ></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="email" value="<?=$data_penerbit['email']?>" ></td>
                        </tr>
                        <tr>
                            <td>Telp</td>
                            <td><input type="text" name="telp" value="<?=$data_penerbit['telp']?>" ></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><input type="text" name="alamat" value="<?=$data_penerbit['alamat']?>" ></td>
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

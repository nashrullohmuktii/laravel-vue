

<?php
include_once('database.php');

    if(isset($_POST['nama'])){
        $nama_katalog = $_POST['nama'];
        $now = date("Y-m-d H:i:s");
        $update_penerbit = mysqli_query($db, "UPDATE katalogs SET nama = '$nama_katalog', updated_at = '$now' WHERE id = '".$_GET['id_katalog']."' ");
        if($update_penerbit == true){
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
    <title>Edit</title>
</head>
<body>
    <center>
        <a href="katalog.php">Back</a>
    </center>
    <br><br>
    <?php
        if($_GET['id_katalog']){
            $katalog = mysqli_query($db, "SELECT * FROM katalogs WHERE id = '".$_GET['id_katalog']."'");
            $data_katalog = mysqli_fetch_assoc($katalog);
            if(mysqli_num_rows($katalog) == 0){
                die("Data tidak ditemukan");
            }
        ?>
            <form action="" method="post">
                <table width="50%" border="0">
                        <tr>
                            <td>ID</td>
                            <td><?=$_GET['id_katalog']?></td>
                        </tr>
                        <tr>
                            <td>Nama Katalog</td>
                            <td><input type="text" name="nama" value="<?=$data_katalog['nama']?>" ></td>
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

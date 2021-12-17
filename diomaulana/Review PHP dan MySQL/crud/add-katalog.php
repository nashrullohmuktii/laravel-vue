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
</head>
<body>
    <center>
        <a href="katalog.php">Katalog</a>
    </center>
    <br><br>
    <?php
    if($_GET['to'] === 'katalog'){
    ?>
        <form action="" method="POST">
            <table width="50%" border="0">
                <tr>
                    <td>Nama Katalog</td>
                    <td><input type="text" name="nama"></td>
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
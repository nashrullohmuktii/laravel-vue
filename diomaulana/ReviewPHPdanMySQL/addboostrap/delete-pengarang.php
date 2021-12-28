<?php
include_once('database.php');


if($_GET['id_pengarang']){
    $id = $_GET['id_pengarang'];
    $delete = mysqli_query($db, "DELETE FROM pengarangs WHERE id = '$id' ");
    if($delete == true){
        header("Location:pengarang.php");
    } else {
        echo $db->error;
    }

}

?>
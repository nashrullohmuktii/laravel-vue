<?php
include_once('database.php');


if($_GET['id_penerbit']){
    $id = $_GET['id_penerbit'];
    $delete = mysqli_query($db, "DELETE FROM penerbits WHERE id = '$id' ");
    if($delete == true){
        header("Location:penerbit.php");
    } else {
        echo $db->error;
    }

}

?>
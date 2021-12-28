<?php
include_once('database.php');


if($_GET['id_katalog']){
    $id = $_GET['id_katalog'];
    $delete = mysqli_query($db, "DELETE FROM katalogs WHERE id = '$id' ");
    if($delete == true){
        header("Location:katalog.php");
    } else {
        echo $db->error;
    }

}

?>
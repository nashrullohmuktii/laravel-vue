<?php
include_once('database.php');


if($_GET['isbn']){
    $isbn = $_GET['isbn'];
    $delete = mysqli_query($db, "DELETE FROM bukus WHERE isbn = '$isbn' ");
    if($delete == true){
        header("Location:index.php");
    } else {
        echo $db->error;
    }

}

?>
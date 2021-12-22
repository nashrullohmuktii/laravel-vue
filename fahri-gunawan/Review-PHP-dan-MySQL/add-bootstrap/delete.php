<?php
include_once("connect.php");
 
$isbn = $_GET['isbn'];
 
$result = mysqli_query($mysqli, "DELETE FROM bukus WHERE isbn='$isbn'");

if ($result) {
    header("Location:index.php");
}else {
    printf("Error: %s\n", mysqli_error($mysqli));
        exit();
}
// After delete redirect to Home, so that latest user list will be displayed.

?>
<?php
include_once("../connect.php");
 
$id = $_GET['id'];
 
$result = mysqli_query($mysqli, "DELETE FROM katalogs WHERE id='$id'");

if ($result) {
    header("Location:katalog.php");
}else {
    printf("Error: %s\n", mysqli_error($mysqli));
        exit();
}
// After delete redirect to Home, so that latest user list will be displayed.

?>
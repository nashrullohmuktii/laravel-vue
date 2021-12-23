<?php
$servername = "localhost";
$database = "perpustakaan";
$username = "root";
$password = "";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection

if (!$conn) {

    die("Connection failed: " . mysqli_connect_error());

}
// echo "Connected successfully";
// mysqli_close($conn);

$sql = ("select * from anggotas");
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   // output data
   while ($row = $result->fetch_assoc()) {
       echo "Nama : " . $row["name"]. ", No.telp : " . $row["telp"]. ", Alamat: " . $row["alamat"]. "<br>";
   } 

} else {
    echo "0 result";
}
$conn->close();
?>
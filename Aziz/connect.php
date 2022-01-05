<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "perpustakaan";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);

// // Check connection
// if (!$conn) {
//   die("Connection failed: " . mysqli_connect_error());
// }
// echo "Connected successfully";

$sql = "SELECT *, bukus.judul
FROM katalogs
JOIN bukus ON bukus.id_katalog=katalogs.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {echo "Id: " . $row["id"].
    "<br> Nama : ".$row["nama"].
    "<br> Created at : ".$row["created_at"].
    "<br> Updated at : ".$row["updated_at"].
    "<br> Judul : ".$row["judul"].
     "<br><br>";}
} else {
  echo "0 results";
}
$conn->close();
?>
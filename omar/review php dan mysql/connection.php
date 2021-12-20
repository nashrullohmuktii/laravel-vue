<?php
$servername = "localhost";
$database = "perpustakaan";
$username = "root";
$password = "";

//create connetion
$conn = mysqli_connect($servername, $username, $password, $database);

// check connetion
if (!$conn){
    die("Connection failed : " . mysqli_connection_error());
}

// sudah tersambung
// echo "sudah tersambung";
// mysqli_close($conn);

//Data per Buku
$sql = "SELECT bukus.id, bukus.isbn, bukus.judul, bukus.tahun, penerbits.nama_penerbit AS penerbit, pengarangs.nama_pengarang AS pengarang, katalogs.nama AS katalog FROM `bukus`
JOIN penerbits ON bukus.id_penerbit = penerbits.id
JOIN pengarangs ON bukus.id_pengarang = pengarangs.id
JOIN katalogs ON bukus.id_katalog = katalogs.id";
$result = $conn ->query($sql);

if ($result->num_rows > 0) {
    //output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Buku : " . $row["id"] . " " . $row["isbn"] . " [ " . $row["judul"] . " ] " . $row["tahun"] . " [ " . $row["penerbit"] . " ] [ " . $row["pengarang"] . " ] [ " . $row["katalog"] . " ]" . "<br>";
    }
}
else {
    echo "0 Results";
}
$conn->close();

?>
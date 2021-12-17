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
    
    $sql = "SELECT * FROM anggotas";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "Nama: " . $row["name"]. " <br> Jenis Kelamin: " . $row["sex"]. " <br> Alamat: " . $row["alamat"]. "<br><br>";
      }
    } else {
      echo "0 results";
    }
    $conn->close();
?>
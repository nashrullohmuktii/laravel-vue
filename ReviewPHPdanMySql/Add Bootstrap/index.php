<?php
    include_once("connect.php");
    $buku = mysqli_query($mysqli, "SELECT bukus.*, nama_pengarang, nama_penerbit, katalogs.nama as nama_katalog FROM bukus 
                                        LEFT JOIN  pengarangs ON pengarangs.id = bukus.id_pengarang
                                        LEFT JOIN  penerbits ON penerbits.id = bukus.id_penerbit
                                        LEFT JOIN  katalogs ON katalogs.id = bukus.id_katalog
                                        ORDER BY judul ASC");
if (!$buku) {
    printf("Error: %s\n", mysqli_error($mysqli));
    exit();
}
?>
 
<html>
<head>    
    <title>Homepage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
 
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mx-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Buku</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../crud/penerbit.php">Penerbit</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../crud/pengarang.php">Pengarang</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../crud/katalog.php">Katalog</a>
      </li>
    </ul>
  </div>
</nav><br>

<div class="row d-flex justify-content-center align-content-center"> 
    <a href="add.php" class="btn btn-primary col-3">Add new buku</a> 
</div><br>

<div class="row justify-content-center">
    <div class="col-auto">
      <table class="table table-responsive table-bordered table-striped">
      <tr>
        <th>ISBN</th> 
        <th>Judul</th> 
        <th>Tahun</th> 
        <th>Pengarang</th>
        <th>Penerbit</th>
        <th>Katalog</th>
        <th>Stok</th>
        <th>Harga Pinjam</th>
        <th>Aksi</th>
    </tr>
    <?php  
        while($buku_data = mysqli_fetch_array($buku)) {         
            echo "<tr>";
            echo "<td>".$buku_data['isbn']."</td>";
            echo "<td>".$buku_data['judul']."</td>";
            echo "<td>".$buku_data['tahun']."</td>";    
            echo "<td>".$buku_data['nama_pengarang']."</td>";    
            echo "<td>".$buku_data['nama_penerbit']."</td>";    
            echo "<td>".$buku_data['nama_katalog']."</td>";    
            echo "<td>".$buku_data['qty_stok']."</td>";    
            echo "<td>".$buku_data['harga_pinjam']."</td>";    
            echo "<td><a class='btn btn-primary' href='edit.php?isbn=$buku_data[isbn]'>Edit</a>  <a class='btn btn-danger' href='delete.php?isbn=$buku_data[isbn]'>Delete</a></td></tr>";        
        }
    ?>
      </table>
    </div>
    </div>
</body>
</html>
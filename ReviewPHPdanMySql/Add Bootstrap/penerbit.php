<?php
    include_once("connect.php");
    $penerbit = mysqli_query($mysqli, "SELECT id, nama_penerbit, email, telp, alamat FROM penerbits 
                                        ORDER BY nama_penerbit ASC");
if (!$penerbit) {
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
      <li class="nav-item">
        <a class="nav-link" href="../crud/index.php">Buku</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="penerbit.php">Penerbit</a>
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
    <a href="add-penerbit.php" class="btn btn-primary col-3">Add new penerbit</a> 
</div><br>
 
<div class="row justify-content-center">
    <div class="col-auto">
      <table class="table table-responsive table-bordered table-striped">
 
    <tr>
        <th>ID</th>
        <th>Nama Penerbit</th> 
        <th>Email</th> 
        <th>Telpon</th> 
        <th>Alamat</th>
        <th>Aksi</th>
    </tr>
    <?php  
        while($penerbit_data = mysqli_fetch_array($penerbit)) {         
            echo "<tr>";
            echo "<td>".$penerbit_data['id']."</td>";
            echo "<td>".$penerbit_data['nama_penerbit']."</td>";
            echo "<td>".$penerbit_data['email']."</td>";
            echo "<td>".$penerbit_data['telp']."</td>";    
            echo "<td>".$penerbit_data['alamat']."</td>";        
            echo "<td><a class='btn btn-primary' href='edit-penerbit.php?id=$penerbit_data[id]'>Edit</a> <a class='btn btn-danger' href='delete-penerbit.php?id=$penerbit_data[id]'>Delete</a></td></tr>";        
        }
    ?>
    </table>
    </div>
</div>
</body>
</html>
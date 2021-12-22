<?php
    include_once("../connect.php");
    $penerbit = mysqli_query($mysqli, "SELECT id, nama_penerbit, email, telp, alamat FROM penerbits 
                                        ORDER BY nama_penerbit ASC");

if (!$penerbit) {
    printf("Error: %s\n", mysqli_error($mysqli));
    exit();
}
?>
 
<html>
<head>    
    <title>Penerbit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
 
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav m-auto">
      <li class="nav-item">
        <a class="nav-link" href="../index.php">Buku</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="penerbit.php">Penerbit<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../pengarang/pengarang.php">Pengarang</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../katalog/katalog.php">Katalog</a>
      </li>
    </ul>
  </div>
</nav>

<a class="btn btn-success mt-3" href="add.php">Add Penerbit</a><br/><br/>
<center><h1>Daftar Penerbit</h1></center>
    <table class="table table-striped" width='100%' border=1>
 
    <tr>
        <th>Nama Penerbit</th> 
        <th>Email</th> 
        <th>Telepon</th> 
        <th>Alamat</th>
        <th>Aksi</th>
    </tr>
    <?php  
        while($penerbit_data = mysqli_fetch_array($penerbit)) {         
            echo "<tr>";
            echo "<td>".$penerbit_data['nama_penerbit']."</td>";
            echo "<td>".$penerbit_data['email']."</td>";
            echo "<td>".$penerbit_data['telp']."</td>";    
            echo "<td>".$penerbit_data['alamat']."</td>";   
            echo "<td><a class='btn btn-primary' href='edit.php?id=$penerbit_data[id]'>Edit</a> | <a class='btn btn-danger' href='delete.php?id=$penerbit_data[id]'>Delete</a></td></tr>";        
        }
    ?>
    </table>
</body>
</html>
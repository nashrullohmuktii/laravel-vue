<?php
    include_once("connect.php");
    $buku = mysqli_query($mysqli, "SELECT bukus.*, nama_pengarang, nama_penerbit, katalogs.nama as nama_katalog FROM bukus 
                                        LEFT JOIN  pengarangs ON pengarangs.id = bukus.id_pengarang
                                        LEFT JOIN  penerbits ON penerbits.id = bukus.id_penerbit
                                        LEFT JOIN  katalogs ON katalogs.id = bukus.id_katalog
                                        ORDER BY judul ASC");
?>
 
<html>
<head>    
    <title>Homepage | Buku</title>
  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.scss">
</head>
 
<body>

<div>
    <div class="navbar-expand-lg bg-light pt-2 pb-2 tengah">
    <a class="font" href="index.php">Buku</a> |
    <a class="font" href="penerbit.php">Penerbit</a> |
    <a class="font" href="pengarang.php">Pengarang</a> |
    <a class="font" href="katalog.php">Katalog</a>
    </div>
    <hr>
</div >

<div style="text-align: center;">
<h1>Book List</h1>
</div>

<a href="add.php" class="btn btn-primary mb-2">Add New Buku</a>

 
    <table class="table" width='80%'>
    <thead class="thead-light">
    <tr class="tr">
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
    </thead>
    
    <?php  
        while($buku_data = mysqli_fetch_array($buku)) {         
            echo "<tr class='tr'>";
            echo "<td>".$buku_data['isbn']."</td>";
            echo "<td>".$buku_data['judul']."</td>";
            echo "<td>".$buku_data['tahun']."</td>";    
            echo "<td>".$buku_data['nama_pengarang']."</td>";    
            echo "<td>".$buku_data['nama_penerbit']."</td>";    
            echo "<td>".$buku_data['nama_katalog']."</td>";    
            echo "<td>".$buku_data['qty_stok']."</td>";    
            echo "<td>".$buku_data['harga_pinjam']."</td>";    
            echo "<td><a class='btn btn-success' href='edit.php?isbn=$buku_data[isbn]'>Edit</a> | <a class='btn btn-danger' href='delete.php?isbn=$buku_data[isbn]'>Delete</a></td></tr>";        
        }
    ?>
    </table>
</body>
</html>
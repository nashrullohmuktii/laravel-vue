<?php
    include_once("connect.php");
    $bukus = mysqli_query($mysqli, "SELECT bukus.*,nama_pengarang,
    nama_penerbit, nama as nama_katalog
    FROM bukus
    LEFT JOIN  pengarangs ON pengarangs.id = bukus.id_pengarang
    LEFT JOIN  penerbits ON penerbits.id = bukus.id_penerbit
    LEFT JOIN  katalogs ON katalogs.id = bukus.id_katalog 
    ORDER BY judul ASC");


?>
 
<html>
<head>    
    <title>Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>
 
<body>

<div align="center">
        <a class="link" href="index.php">Buku</a> |
        <a class="link" href="penerbit.php">Penerbit</a> |
        <a class="link" href="pengarang.php">Pengarang</a> |
        <a class="link" href="katalog.php">Katalog</a>
    <hr>
</div>

<a class="add" href="add.php">Add New Buku</a><br/><br/>
 
    <table class="table" width='80%' rules="all">
    <thead class="table-dark table-sm">
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
    </thead>
    <?php  
        while($buku_data = mysqli_fetch_array($bukus)) {         
            echo "<tr>";
            echo "<td>".$buku_data['isbn']."</td>";
            echo "<td>".$buku_data['judul']."</td>";
            echo "<td>".$buku_data['tahun']."</td>";    
            echo "<td>".$buku_data['nama_pengarang']."</td>";    
            echo "<td>".$buku_data['nama_penerbit']."</td>";    
            echo "<td>".$buku_data['nama_katalog']."</td>";    
            echo "<td>".$buku_data['qty_stok']."</td>";    
            echo "<td>".$buku_data['harga_pinjam']."</td>";    
            echo "<td><a class='btn btn-primary' href='edit.php?isbn=$buku_data[isbn]'>Edit</a> | <a class='btn btn-danger' href='delete.php?isbn=$buku_data[isbn]'>Delete</a></td></tr>";        
        }
    ?>
    </table>
</body>
</html>
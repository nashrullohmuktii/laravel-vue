<?php
    include_once("connect.php");
    $pengarang = mysqli_query($mysqli, "SELECT id, nama_pengarang, email, telp, alamat FROM `pengarangs`
                                ORDER BY nama_pengarang ASC");
?>
 
<html>
<head>    
    <title>Perpustakaan | Pengarang</title>
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
<h1>Pengarang</h1>
</div>
<a href="addpengarang.php" class="btn btn-primary mb-2">Add New Pengarang</a><br/><br/>
 
    <table class="table" width='80%' border=1>
    <table class="table" width='80%'>
    <thead class="thead-light">
    <tr class="tr">
        <th>ID Pengarang</th> 
        <th>Nama</th> 
        <th>Email</th> 
        <th>Telepon</th>
        <th>Alamat</th>
        <th>Aksi</th>
    </tr>
    <?php  
        while($pengarang_data = mysqli_fetch_array($pengarang)) {         
            echo "<tr class='tr'>";
            echo "<td>".$pengarang_data['id']."</td>";
            echo "<td>".$pengarang_data['nama_pengarang']."</td>";
            echo "<td>".$pengarang_data['email']."</td>";    
            echo "<td>".$pengarang_data['telp']."</td>";    
            echo "<td>".$pengarang_data['alamat']."</td>";        
            echo "<td><a class='btn btn-success' href='editpengarang.php?id=$pengarang_data[id]'>Edit</a> | <a class='btn btn-danger' href='deletepengarang.php?id=$pengarang_data[id]'>Delete</a></td></tr>";        
        }
    ?>
    </table>
</body>
</html>
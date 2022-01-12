<?php
    include_once("connect.php");
    $pengarang = mysqli_query($mysqli, "SELECT id, nama_pengarang, email, telp, alamat FROM pengarangs 
                                        ORDER BY nama_pengarang ASC");
if (!$pengarang) {
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

<center>
    <a href="../crud/index.php">Buku</a> |
    <a href="../crud/penerbit.php">Penerbit</a> |
    <a href="pengarang.php">Pengarang</a> |
    <a href="../crud/katalog.php">Katalog</a>
    <hr>
</center>

<a href="add-pengarang.php">Add New Pengarang</a><br/><br/>
 
    <table class="table" width='80%' border=1>
 
    <tr>
        <th>ID</th>
        <th>Nama Pengarang</th> 
        <th>Email</th> 
        <th>Telepon</th> 
        <th>Alamat</th>
        <th>Aksi</th>
    </tr>
    <?php  
        while($pengarang_data = mysqli_fetch_array($pengarang)) {         
            echo "<tr>";
            echo "<td>".$pengarang_data['id']."</td>";
            echo "<td>".$pengarang_data['nama_pengarang']."</td>";
            echo "<td>".$pengarang_data['email']."</td>";
            echo "<td>".$pengarang_data['telp']."</td>";    
            echo "<td>".$pengarang_data['alamat']."</td>";    
            echo "<td><a class='btn btn-primary' href='edit-pengarang.php?id=$pengarang_data[id]'>Edit</a> | <a class='btn btn-danger' href='delete-pengarang.php?id=$pengarang_data[id]'>Delete</a></td></tr>";        
        }
    ?>
    </table>
</body>
</html>
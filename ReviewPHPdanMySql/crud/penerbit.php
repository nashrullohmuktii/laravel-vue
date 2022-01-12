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

<center>
    <a href="../crud/index.php">Buku</a> |
    <a href="penerbit.php">Penerbit</a> |
    <a href="../crud/pengarang.php">Pengarang</a> |
    <a href="../crud/katalog.php">Katalog</a>
    <hr>
</center>

<a href="add-penerbit.php">Add New Penerbit</a><br/><br/>
 
    <table class="table" width='80%' border=1>
 
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
            echo "<td><a class='btn btn-primary' href='edit-penerbit.php?id=$penerbit_data[id]'>Edit</a> | <a class='btn btn-danger' href='delete-penerbit.php?id=$penerbit_data[id]'>Delete</a></td></tr>";        
        }
    ?>
    </table>
</body>
</html>
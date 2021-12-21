<?php
    include_once("connect.php");
    $katalog = mysqli_query($mysqli, "SELECT id, nama FROM `katalogs`
                                ORDER BY nama ASC");
?>
 
<html>
<head>    
    <title>Homepage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
 
<body>

<center>
    <a href="index.php">Buku</a> |
    <a href="penerbit.php">Penerbit</a> |
    <a href="pengarang.php">Pengarang</a> |
    <a href="katalog.php">Katalog</a>
    <hr>
</center>

<div style="text-align: center;">
<h1>Katalog</h1>
</div>
<a href="addkatalog.php">Add New katalog</a><br/><br/>
 
    <table class="table" width='80%' border=1>
 
    <tr>
        <th>ID Katalog</th> 
        <th>Nama Katalog</th> 
        <th>Aksi</th>
    </tr>
    <?php  
        while($katalog_data = mysqli_fetch_array($katalog)) {         
            echo "<tr>";
            echo "<td>".$katalog_data['id']."</td>";
            echo "<td>".$katalog_data['nama']."</td>";        
            echo "<td><a class='btn btn-primary' href='editkatalog.php?id=$katalog_data[id]'>Edit</a> | <a class='btn btn-danger' href='deletekatalog.php?id=$katalog_data[id]'>Delete</a></td></tr>";        
        }
    ?>
    </table>
</body>
</html>
<?php
    include_once("../connect.php");
    $katalog = mysqli_query($mysqli, "SELECT id, nama FROM katalogs 
                                        ORDER BY nama ASC");

if (!$katalog) {
    printf("Error: %s\n", mysqli_error($mysqli));
    exit();
}
?>
 
<html>
<head>    
    <title>Katalog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>
 
<body>

<center>
    <a href="../index.php">Buku</a> |
    <a href="../penerbit/penerbit.php">Penerbit</a> |
    <a href="../pengarang/pengarang.php">Pengarang</a> |
    <a href="katalog.php">Katalog</a>
    <hr>
</center>

<a href="add.php">Add Katalog</a><br/><br/>
<center><h1>Daftar Katalog</h1></center>
    <table class="table" width='100%' border=1>
 
    <tr>
        <th>Nama Katalog</th> 
        <th>Aksi</th>
    </tr>
    <?php  
        while($katalog_data = mysqli_fetch_array($katalog)) {         
            echo "<tr>";
            echo "<td>".$katalog_data['nama']."</td>"; 
            echo "<td align='center'><a class='btn btn-primary' href='edit.php?id=$katalog_data[id]'>Edit</a> | <a class='btn btn-danger' href='delete.php?id=$katalog_data[id]'>Delete</a></td></tr>";        
        }
    ?>
    </table>
</body>
</html>
<?php
    include_once("connect.php");
    $katalogs = mysqli_query($mysqli, "SELECT id, nama
    FROM `katalogs`
    ORDER BY nama ASC");
?>
 
<html>
<head>    
    <title>Katalog</title>
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

<a class="add" href="add_katalog.php">Add New Katalog</a><br/><br/>
 
    <table class="table" width='80%' rules="all">
    <thead class="table-dark table-sm">
        <tr>
            <th>ID</th>
            <th>Nama Katalog</th> 
            <th>Aksi</th>
        </tr>
    </thead>
    <?php  
        while($katalog_data = mysqli_fetch_array($katalogs)) {         
            echo "<tr>";
            echo "<td>".$katalog_data['id']."</td>";
            echo "<td>".$katalog_data['nama']."</td>";    
            echo "<td><a class='btn btn-primary' href='edit_katalog.php?id=$katalog_data[id]'>Edit</a> | <a class='btn btn-danger' href='delete_katalog.php?id=$katalog_data[id]'>Delete</a></td></tr>";        
        }
    ?>
    </table>
</body>
</html>
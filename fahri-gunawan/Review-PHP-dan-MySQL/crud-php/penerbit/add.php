<html>
<head>
	<title>Add Penerbit</title>
</head>

<?php
	include_once("../connect.php");
    $penerbit = mysqli_query($mysqli, "SELECT * FROM penerbits");
?>
 
<body>
	<a href="penerbit.php">Go to Home</a>
	<br/><br/>
 
	<form action="add.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Nama Penerbit</td>
				<td><input type="text" name="nama_penerbit"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="email" name="email"></td>
			</tr>
			<tr> 
				<td>Telepon</td>
				<td><input type="tel" name="telp"></td>
			</tr>
			<tr> 
				<td>Alamat</td>
				<td><textarea name="alamat" cols="50" rows="3"></textarea></td>
			</tr>
			<tr> 	
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['Submit'])) {
			$nama_penerbit = $_POST['nama_penerbit'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];
			
			include_once("../connect.php");
			$query = "INSERT INTO penerbits (nama_penerbit, email, telp, alamat) VALUES ('$nama_penerbit', '$email', '$telp', '$alamat')";
			$sql = mysqli_query($mysqli, $query);
			if ($sql) {
				header("Location:penerbit.php");
			}else {
				printf("Error: %s\n", mysqli_error($mysqli));
   				 exit();
			}

			// $result = mysqli_query($mysqli, "INSERT INTO bukus (isbn, judul, tahun, id_penerbit, id_pengarang, id_katalog, qty_stok, harga_pinjam) VALUES ('$isbn', '$judul', '$tahun', '$id_penerbit', '$id_pengarang', '$id_katalog', '$qty_stok', '$harga_pinjam')");
			
			
		}
	?>
</body>
</html>
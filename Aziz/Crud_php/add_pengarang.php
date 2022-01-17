<html>
<head>
	<title>Add Pengarang</title>
</head>

<?php
	include_once("connect.php");
    $penerbit = mysqli_query($mysqli, "SELECT * FROM penerbits");
    $pengarang = mysqli_query($mysqli, "SELECT * FROM pengarangs");
    $katalog = mysqli_query($mysqli, "SELECT * FROM katalogs");
?>
 
<body>
	<div style="text-align: center;">
	<h1>Add Pengarang</h1>
	</div>
	<a href="pengarang.php">Go to Pengarang</a>
	<br/><br/>
 
	<form action="add_pengarang.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>ID</td>
				<td><input type="text" name="id"></td>
			</tr>
			<tr> 
				<td>Nama Pengarang</td>
				<td><input type="text" name="nama_pengarang"></td>
			</tr>
			<tr> 
				<td>E.Mail</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr> 
				<td>telpone</td>
				<td><input type="text" name="telp"></td>
			</tr>
			<tr> 
				<td>Alamat</td>
				<td><input type="text" name="alamat"></td>
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
			
			$id = $_POST['id'];
			$nama_pengarang = $_POST['nama_pengarang'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];

			
			include_once("connect.php");

			$result = mysqli_query($mysqli, "INSERT INTO `pengarangs` (`id`, `nama_pengarang`, `email`, `telp`,
			 `alamat`) VALUES ('$id', '$nama_pengrang', '$email', '$telp', '$alamat');");
			
			header("Location:pengarang.php");
		}
	?>
</body>
</html>
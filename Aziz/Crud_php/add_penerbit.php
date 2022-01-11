<html>
<head>
	<title>Add Penerbit</title>
</head>

<?php
	include_once("connect.php");
    $penerbit = mysqli_query($mysqli, "SELECT * FROM penerbits");
    $pengarang = mysqli_query($mysqli, "SELECT * FROM pengarangs");
    $katalog = mysqli_query($mysqli, "SELECT * FROM katalogs");
?>
 
<body>
	<a href="penerbit.php">Go to Penerbit</a>
	<br/><br/>
 
	<form action="add_penerbit.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>ID</td>
				<td><input type="text" name="id"></td>
			</tr>
			<tr> 
				<td>Nama Penerbit</td>
				<td><input type="text" name="nama_penerbit"></td>
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
			$nama_penerbit = $_POST['nama_penerbit'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];

			
			include_once("connect.php");

			$result = mysqli_query($mysqli, "INSERT INTO `penerbits` (`id`, `nama_penerbit`, `email`, `telp`,
			 `alamat`) VALUES ('$id', '$nama_penerbit', '$email', '$telp', '$alamat');");
			
			header("Location:penerbit.php");
		}
	?>
</body>
</html>
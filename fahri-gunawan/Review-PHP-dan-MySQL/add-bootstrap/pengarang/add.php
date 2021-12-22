<html>
<head>
	<title>Add Pengarang</title>
</head>

<?php
	include_once("../connect.php");
    $pengarang = mysqli_query($mysqli, "SELECT * FROM pengarangs");
?>
 
<body>
	<a href="pengarang.php">Go to Home</a>
	<br/><br/>
 
	<form action="add.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Nama Pengarang</td>
				<td><input type="text" name="nama_pengarang"></td>
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
			$nama_pengarang = $_POST['nama_pengarang'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];
			
			include_once("../connect.php");
			$query = "INSERT INTO pengarangs (nama_pengarang, email, telp, alamat) VALUES ('$nama_pengarang', '$email', '$telp', '$alamat')";
			$sql = mysqli_query($mysqli, $query);
			if ($sql) {
				header("Location:pengarang.php");
			}else {
				printf("Error: %s\n", mysqli_error($mysqli));
   				 exit();
			}
			
			
		}
	?>
</body>
</html>
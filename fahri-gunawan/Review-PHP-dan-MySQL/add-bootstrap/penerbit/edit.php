<html>
<head>
	<title>Edit Penerbit</title>
</head>

<?php
	include_once("../connect.php");
	$id = $_GET['id'];

	$penerbit = mysqli_query($mysqli, "SELECT * FROM penerbits WHERE id='$id'");

    while($penerbit_data = mysqli_fetch_array($penerbit))
    {
		$id = $penerbit_data['id'];
    	$nama_penerbit = $penerbit_data['nama_penerbit'];
    	$email = $penerbit_data['email'];
    	$telp = $penerbit_data['telp'];
    	$alamat = $penerbit_data['alamat'];
    }
?>
 
<body>
	<a href="penerbit.php">Go to Home</a>
	<br/><br/>
 
	<form action="edit.php?id=<?php echo $id; ?>" method="post">
		<table width="25%" border="0">
			<tr> 
				<td>Nama Penerbit</td>
				<td><input type="text" name="nama_penerbit" value="<?php echo $nama_penerbit; ?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email; ?>"></td>
			</tr>
			<tr> 
				<td>Telepon</td>
				<td><input type="text" name="telp" value="<?php echo $telp; ?>"></td>
			</tr>
			<tr> 
				<td>Alamat</td>
				<td><input type="text" name="alamat" value="<?php echo $alamat; ?>"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['update'])) {

			$id = $_GET['id'];
			$nama_penerbit = $_POST['nama_penerbit'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];
			
			include_once("../connect.php");

			$result = mysqli_query($mysqli, "UPDATE penerbits SET nama_penerbit = '$nama_penerbit', email = '$email', telp = '$telp', alamat = '$alamat' WHERE id = '$id';");

			if ($result) {
				header("Location:penerbit.php");
			}else {
				printf("Error: %s\n", mysqli_error($mysqli));
   				 exit();
			}
			
		
		}
	?>
</body>
</html>
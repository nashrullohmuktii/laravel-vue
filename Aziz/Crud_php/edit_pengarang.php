<html>
<head>
	<title>Edit Pengarang</title>
</head>

<?php
	include_once("connect.php");
	$id = $_GET['id'];

    $pengarang = mysqli_query($mysqli, "SELECT * FROM pengarangs WHERE id ='$id' ");

    while($pengarang_data = mysqli_fetch_array($pengarang))
    {
		$id=$pengarang_data['id']."</td>";
		$nama_pengarang=$pengarang_data['nama_pengarang']."</td>";
		$email=$pengarang_data['email']."</td>";    
		$telp=$pengarang_data['telp']."</td>";
		$alamat=$pengarang_data['alamat']."</td>";
    }
?>
 
<body>
	<div style="text-align: center;">
	<h1>Edit Pengarang</h1>
	</div>
	<a href="pengarang.php">Go to Pengarang</a>
	<br/><br/>
 
	<form action="edit_pengarang.php?id=<?php echo $id; ?>" method="post">
		<table width="25%" border="0">
		<tr> 
				<td>ID</td>
				<td><input type="text" name="id"></td>
			</tr>
			<tr> 
				<td>Nama Penerbit</td>
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
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['update'])) {

			$id = $_POST['id'];
			$nama_pengarang = $_POST['nama_pengarang'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];
			
			include_once("connect.php");

			$result = mysqli_query($mysqli, "UPDATE pengarangs SET nama_pengarang = '$nama_pengarang', email = '$email',
			 telp = '$telp', alamat = '$alamat' WHERE id = '$id';");
			
			header("Location:pengarang.php");
		}
	?>
</body>
</html>
<html>
<head>
	<title>Edit Penerbit</title>
</head>

<?php
	include_once("connect.php");
	$id = $_GET['id'];

    $penerbit = mysqli_query($mysqli, "SELECT * FROM penerbits WHERE id ='$id' ");

    while($penerbit_data = mysqli_fetch_array($penerbit))
    {
		$id=$penerbit_data['id']."</td>";
		$nama_penerbit=$penerbit_data['nama_penerbit']."</td>";
		$email=$penerbit_data['email']."</td>";    
		$telp=$penerbit_data['telp']."</td>";
		$alamat=$penerbit_data['alamat']."</td>";
    }
?>
 
<body>
	<div style="text-align: center;">
	<h1>Edit Penerbit</h1>
	</div>
	<a href="penerbit.php">Go to Penerbit</a>
	<br/><br/>
 
	<form action="edit_penerbit.php?id=<?php echo $id; ?>" method="post">
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
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['update'])) {

			$id = $_POST['id'];
			$nama_penerbit = $_POST['nama_penerbit'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];
			
			include_once("connect.php");

			$result = mysqli_query($mysqli, "UPDATE penerbits SET nama_penerbit = '$nama_penerbit', email = '$email',
			 telp = '$telp', alamat = '$alamat' WHERE id = '$id';");
			
			header("Location:penerbit.php");
		}
	?>
</body>
</html>
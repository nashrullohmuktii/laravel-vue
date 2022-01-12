<html>
<head>
	<title>Edit Pengarang</title>
</head>

<?php
	include_once("connect.php");
	$id = $_GET['id'];

	$katalog = mysqli_query($mysqli, "SELECT * FROM katalogs WHERE id='$id'");

    while($katalog_data = mysqli_fetch_array($katalog))
    {
    	$id = $katalog_data['id'];
    	$nama = $katalog_data['nama'];
    }
?>
 
<body>
	<a href="index.php">Go to Home</a>
	<br/><br/>
 
	<form action="edit-katlog.php?id=<?php echo $id; ?>" method="post">
		<table width="25%" border="0">
			<tr> 
				<td>Nama Katalog</td>
				<td><input type="text" name="nama" value="<?php echo $nama; ?>"></td>
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
            $nama = $_POST['nama'];

			include_once("connect.php");

			$result = mysqli_query($mysqli, "UPDATE katalogs SET nama = '$nama' WHERE id = '$id';");
			
			header("Location:katalog.php");
		}
	?>
</body>
</html>
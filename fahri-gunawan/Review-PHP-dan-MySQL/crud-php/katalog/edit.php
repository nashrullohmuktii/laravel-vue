<html>
<head>
	<title>Edit Katalog</title>
</head>

<?php
	include_once("../connect.php");
	$id = $_GET['id'];

	$katalog = mysqli_query($mysqli, "SELECT * FROM katalogs WHERE id='$id'");

    while($katalog_data = mysqli_fetch_array($katalog))
    {
		$id = $katalog_data['id'];
    	$nama_katalog = $katalog_data['nama'];
    }
?>
 
<body>
	<a href="katalog.php">Go to Home</a>
	<br/><br/>
 
	<form action="edit.php?id=<?php echo $id; ?>" method="post">
		<table width="25%" border="0">
			<tr> 
				<td>Nama Katalog</td>
				<td><input type="text" name="nama_katalog" value="<?php echo $nama_katalog; ?>"></td>
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
			$nama_katalog = $_POST['nama_katalog'];
			
			include_once("../connect.php");

			$result = mysqli_query($mysqli, "UPDATE katalogs SET nama = '$nama_katalog' WHERE id = '$id';");

			if ($result) {
				header("Location:katalog.php");
			}else {
				printf("Error: %s\n", mysqli_error($mysqli));
   				 exit();
			}
			
		
		}
	?>
</body>
</html>
<html>
<head>
	<title>Edit Katalog</title>
</head>

<?php
	include_once("connect.php");
	$id = $_GET['id'];

    $katalog = mysqli_query($mysqli, "SELECT * FROM katalogs WHERE id='$id'");

    while($katalog_data = mysqli_fetch_array($katalog))
    {
    	$namakatalog = $katalog_data['nama'];
    	$id = $katalog_data['id'];
    }
?>
 
<body>
	<div style="text-align: center;">
	<h1>Edit Katalog</h1>
	</div>
	<a href="katalog.php">Back</a>
	<br/><br/>
 
	<form action="editkatalog.php?id=<?php echo $id; ?>" method="post">
		<table width="25%" border="0">
			<tr> 
				<td>ID</td>
				<td style="font-size: 11pt;"><?php echo $id; ?> </td>
			</tr>
			<tr> 
				<td>Nama Katalog</td>
				<td><input type="text" name="nama" value="<?php echo $namakatalog; ?>"></td>
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
			$namakatalog = $_POST['nama'];
			
			include_once("connect.php");

			$result = mysqli_query($mysqli, "UPDATE katalogs SET nama = '$namakatalog' WHERE id = '$id';");
			
			header("Location:katalog.php");
		}
	?>
</body>
</html>
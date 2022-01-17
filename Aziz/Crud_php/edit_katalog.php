<html>
<head>
	<title>Edit Katalog</title>
</head>

<?php
	include_once("connect.php");
	$id = $_GET['id'];

    $katalog = mysqli_query($mysqli, "SELECT * FROM katalogs WHERE id ='$id' ");

    while($katalog_data = mysqli_fetch_array($katalog))
    {
		$id=$katalog_data['id']."</td>";
		$nama=$katalog_data['nama']."</td>";
    }
?>
 
<body>
	<div style="text-align: center;">
	<h1>Edit Katalog</h1>
	</div>
	<a href="katalog.php">Go to Katalog</a>
	<br/><br/>
 
	<form action="edit_katalog.php?id=<?php echo $id; ?>" method="post">
		<table width="25%" border="0">
		<tr> 
				<td>ID</td>
				<td><input type="text" name="id"></td>
			</tr>
			<tr> 
				<td>Nama</td>
				<td><input type="text" name="nama"></td>
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
			$nama = $_POST['nama'];
			include_once("connect.php");

			$result = mysqli_query($mysqli, "UPDATE katalogs SET nama = '$nama' WHERE id = '$id';");
			
			header("Location:katalog.php");
		}
	?>
</body>
</html>
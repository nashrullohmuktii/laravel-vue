<html>
<head>
	<title>Add Katalog</title>
</head>

<?php
	include_once("connect.php");
    $penerbit = mysqli_query($mysqli, "SELECT * FROM penerbits");
    $pengarang = mysqli_query($mysqli, "SELECT * FROM pengarangs");
    $katalog = mysqli_query($mysqli, "SELECT * FROM katalogs");
?>
 
<body>
	<div style="text-align: center;">
	<h1>Add Katalog</h1>
	</div>
	<a href="katalog.php">Back</a>
	<br/><br/>
 
	<form action="addkatalog.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Nama Katalog</td>
				<td><input type="text" name="nama"></td>
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
			$nama_katalog = $_POST['nama'];
			
			include_once("connect.php");

			$result = mysqli_query($mysqli, "INSERT INTO `katalogs` (`nama`) VALUES ('$nama_katalog');");
			
			header("Location:katalog.php");
		}
	?>
</body>
</html>
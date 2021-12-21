<html>
<head>
	<title>Add Katalog</title>
</head>

<?php
	include_once("../connect.php");
    $katalog = mysqli_query($mysqli, "SELECT * FROM katalogs");
?>
 
<body>
	<a href="katalog.php">Go to Home</a>
	<br/><br/>
 
	<form action="add.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Nama Katalog</td>
				<td><input type="text" name="nama_katalog"></td>
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
			$nama_katalog = $_POST['nama_katalog'];
			include_once("../connect.php");
			$query = "INSERT INTO katalogs (nama) VALUES ('$nama_katalog')";
			$sql = mysqli_query($mysqli, $query);
			if ($sql) {
				header("Location:katalog.php");
			}else {
				printf("Error: %s\n", mysqli_error($mysqli));
   				 exit();
			}
			
		}
	?>
</body>
</html>
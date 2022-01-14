<html>
<head>
	<title>Add Pengarang</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>

<?php
	include_once("connect.php");
    $penerbit = mysqli_query($mysqli, "SELECT * FROM katalogs");
?>
 
<body>
<div class="row d-flex justify-content-center align-content-center"> 
		<a class="btn btn-dark" href="index.php">Go to Home</a>
	</div><br/>
 
	<form action="add-katalog.php" method="post" name="form1">
	<div class="row justify-content-center">
		<div class="col-auto">
		<table class="table table-responsive table-bordered table-striped">
			<tr> 
				<td>ID</td>
				<td><input type="text" name="id"></td>
			</tr>
			<tr> 
				<td>Nama Katalog</td>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="Submit" value="Add" class="btn btn-primary"></td>
			</tr>
		</table>
		</div>
	</div>
	</form>
	
	<?php
	 
		// Check If form submitted, insert form data into users table.
		if(isset($_POST['Submit'])) {
			$id = $_POST['id'];
			$nama = $_POST['nama'];
			
			include_once("connect.php");

			$result = mysqli_query($mysqli, "INSERT INTO `pengarangs` (`id`, `nama`) VALUES ('$id', '$nama');");
			
			header("Location:katalog.php");
		}
	?>
</body>
</html>
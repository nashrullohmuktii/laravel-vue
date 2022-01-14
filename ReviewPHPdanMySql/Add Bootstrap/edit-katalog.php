<html>
<head>
	<title>Edit Pengarang</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
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
	<div class="row d-flex justify-content-center align-content-center"> 
		<a class="btn btn-dark" href="index.php">Go to Home</a>
	</div><br/>
 
	<form action="edit-katlog.php?id=<?php echo $id; ?>" method="post">
	<div class="row justify-content-center">
		<div class="col-auto">
		<table class="table table-responsive table-bordered table-striped">
			<tr> 
				<td>Nama Katalog</td>
				<td><input type="text" name="nama" value="<?php echo $nama; ?>"></td>
			</tr>
            <tr> 
				<td></td>
				<td><input type="submit" name="update" value="Update" class="btn btn-primary"></td>
			</tr>
		</table>
		</div>
	</div>
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
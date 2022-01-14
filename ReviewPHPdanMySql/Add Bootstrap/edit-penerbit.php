<html>
<head>
	<title>Edit Penerbit</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</head>

<?php
	include_once("connect.php");
	$id = $_GET['id'];

	$penerbit = mysqli_query($mysqli, "SELECT * FROM penerbits WHERE id='$id'");

    while($penerbit_data = mysqli_fetch_array($penerbit))
    {
    	$id = $penerbit_data['id'];
        $nama_penerbit = $penerbit_data['nama_penerbit'];
    	$email = $penerbit_data['email'];
    	$telp = $penerbit_data['telp'];
    	$alamat = $penerbit_data['alamat'];
    }
?>
 
<body>
	<div class="row d-flex justify-content-center align-content-center"> 
		<a class="btn btn-dark" href="index.php">Go to Home</a>
	</div><br/>
 
	<form action="edit-penerbit.php?id=<?php echo $id; ?>" method="post">
	<div class="row justify-content-center">
		<div class="col-auto">
		<table class="table table-responsive table-bordered table-striped">
			<tr> 
				<td>Nama Penerbit</td>
				<td><input type="text" name="nama_penerbit" value="<?php echo $nama_penerbit; ?>"></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="text" name="email" value="<?php echo $email; ?>"></td>
			</tr>
			<tr> 
				<td>No. Telp</td>
				<td><input type="text" name="telp" value="<?php echo $telp; ?>"></td>
			</tr>
			<tr> 
				<td>Alamat</td>
				<td><input type="text" name="alamat" value="<?php echo $alamat; ?>"></td>
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
            $nama_penerbit = $_POST['nama_penerbit'];
			$email = $_POST['email'];
			$telp = $_POST['telp'];
			$alamat = $_POST['alamat'];

			include_once("connect.php");

			$result = mysqli_query($mysqli, "UPDATE penerbits SET nama_penerbit = '$nama_penerbit', email = '$email', telp = '$telp', alamat = '$alamat' WHERE id = '$id';");
			
			header("Location:penerbit.php");
		}
	?>
</body>
</html>
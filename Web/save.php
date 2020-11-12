<html>
<head>
<title>save</title>
</head>
<body>
<?php


	$serverName = "localhost";
	$userName = "root";
	$userPassword = "64286428";
	$dbName = "checktechno_db";

	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

	$sql = "UPDATE devices SET 
			device_name = '".$_POST["txtName"]."' ,
			device_dep = '".$_POST["txtEmail"]."' 
			WHERE id = '".$_POST["txtid"]."' ";

	$query = mysqli_query($conn,$sql);

	if($query) {
	 echo "Record update successfully";
	 header('Location: /devices.php');
	}

	mysqli_close($conn);
?>
</body>
</html>
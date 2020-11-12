<!DOCTYPE html>
<html>
<head>
<title>Rename event</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel='stylesheet' type='text/css' href="css/bootstrap.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/header.css"/>
</head>
<body>
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName = "localhost";
	$userName = "root";
	$userPassword = "64286428";
	$dbName = "checktechno_db";

	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

	$sql = "SELECT * FROM devices";

	$query = mysqli_query($conn,$sql);
?>

<div class="table-responsive">   
<table  class="table">
  <tr>
	<th> ID </div></th>
    <th> ชื่ออุปกรณ์ </div></th>
    <th> กิจกรรม </div></th>
	<th> แก้ไข </div></th>

  </tr>
<?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>

  <tr class="table-secondary">
	<td><?php echo $result["id"];?></div></td>
    <td><?php echo $result["device_name"];?></div></td>
    <td><?php echo $result["device_dep"];?></div></td>
	<td><a href="edit.php?id=<?php echo $result["id"];?>"><button type="button" class="dev_del btn btn-danger" title="Edit this device?"><span class="glyphicon glyphicon-pencil"></span></button></a></td>
  </tr>
<?php
}
?>
</table>
<?php
mysqli_close($conn);
?>
</body>
</html>
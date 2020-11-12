<html>
<head>
<title>Edit page</title>
</head>
<body>
<?php
   ini_set('display_errors', 1);
   error_reporting(~0);

   $serverName = "localhost";
	$userName = "root";
	$userPassword = "64286428";
	$dbName = "checktechno_db";

   $strid = null;

   if(isset($_GET["id"]))
   {
	   $strid = $_GET["id"];
   }
    $serverName = "localhost";
	$userName = "root";
	$userPassword = "64286428";
	$dbName = "checktechno_db";


   $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

   $sql = "SELECT * FROM devices WHERE id = '".$strid."' ";

   $query = mysqli_query($conn,$sql);

   $result=mysqli_fetch_array($query,MYSQLI_ASSOC);

?>
<div class="table-responsive">   
<form action="save.php" name="frmAdd" method="post">
<table class="table">
  <tr>
    <th class="table-primary"">id</th>
    <td width="238"><input type="hidden" name="txtid" value="<?php echo $result["id"];?>"><?php echo $result["id"];?></td>
    </tr>
  <tr>
    <th class="table-primary">ชื่ออุปกรณ์</th>
    <td><input type="text" name="txtName" size="16" value="<?php echo $result["device_name"];?>"></td>
    </tr>
  <tr>
    <th class="table-primary">ชื่อกิจกรรม</th>
    <td><input type="text" name="txtEmail" size="16" value="<?php echo $result["device_dep"];?>"></td>
    </tr>

  </table>
  <input type="submit" name="submit" value="submit">
</form>
<?php
mysqli_close($conn);
?>
</body>
</html>
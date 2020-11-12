<?php
session_start();
if (!isset($_SESSION['Admin-name'])) {
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Manage Users</title>
	<link rel="stylesheet" href="css/demo.css">
	<link rel="stylesheet" href="css/footer-distributed-with-address-and-phones.css">
	
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

	<link href="http://fonts.googleapis.com/css?family=Cookie" rel="stylesheet" type="text/css">

  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="icon" type="image/png" href="icons/atte1.jpg">
	<link rel="stylesheet" type="text/css" href="css/manageusers.css">

    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"
            integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
            crossorigin="anonymous">
    </script>   
    <script type="text/javascript" src="js/bootbox.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
	<script src="js/manage_users.js"></script>
	<script>
	  	$(window).on("load resize ", function() {
		    var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
		    $('.tbl-header').css({'padding-right':scrollWidth});
		}).resize();

	  $(document).ready(function(){
	  	  $.ajax({
	        url: "manage_users_up.php"
	        }).done(function(data) {
	        $('#manage_users').html(data);
	      });
	    setInterval(function(){
	      $.ajax({
	        url: "manage_users_up.php"
	        }).done(function(data) {
	        $('#manage_users').html(data);
	      });
	    },5000);
	  });
	</script>
</head>
<body>
<?php include'header.php';?>
<main>
	<h1 class="slideInDown animated">เพิ่มรายชื่อใหม่ <br> หรือลบรายชื่อออก</h1>
	<div class="form-style-5 slideInDown animated">
		<form enctype="multipart/form-data">
			<fieldset>
				<label for="Device"><b>รายชื่อเครื่องสแกนทั้งหมด:</b></label>
                    <select name="dev_sel" id="dev_sel" style="color: #000;">
                      <option value="0">เลือกเครื่องที่ต้องการใช้</option>
                      <?php
                        require'connectDB.php';
                        $sql = "SELECT * FROM devices ORDER BY device_name ASC";
                        $result = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($result, $sql)) {
                            echo '<p class="error">SQL Error</p>';
                        } 
                        else{
                            mysqli_stmt_execute($result);
                            $resultl = mysqli_stmt_get_result($result);
                            while ($row = mysqli_fetch_assoc($resultl)){
                      ?>
                              <option value="<?php echo $row['id'];?>"><?php echo $row['device_name']; ?></option>
                      <?php
                            }
                        }
                      ?>
                    </select>
			<legend><span class="number">1</span> รหัสลายนิ้วมือของผู้ใช้:</legend>
				<label>เลือกรหัสลายนิ้วมือที่จะบันทึกระหว่าง 1 ถึง 127:</label>
				<input type="number" name="fingerid" id="fingerid" placeholder="รหัสลายนิ้วมือของผู้ใช้...">
				<button type="button" name="fingerid_add" class="fingerid_add">เพิ่มรหัสลายนิ้วมือ</button>
			</fieldset>
			<div class="alert">
				<label id="alert"></label>
			</div>
			<fieldset>
				<legend><span class="number">2</span> รายละเอียดของผู้ใช้</legend>
				<input type="hidden" name="finger_id" id="finger_id">
				<input type="hidden" name="dev_id" id="dev_id">
				<input type="text" name="name" id="name" placeholder="ชื่อผู้ใช้...">
				<input type="text" name="number" id="number" placeholder="รหัสนักศึกษา...">
				<!-- <input type="email" name="email" id="email" placeholder="User Email..."> -->
			</fieldset>
			<label>
				<input type="radio" name="gender" class="gender" value="Female">หญิง
	          	<input type="radio" name="gender" class="gender" value="Male" checked="checked">ชาย
	      	</label >
			</fieldset>
				<div class="row">
					<div class="col-lg-4">
						<button type="button" name="user_add" class="user_add">เพิ่ม</button>
					</div>
					<div class="col-lg-4">
						<button type="button" name="user_upd" class="user_upd">ปรับปรุง</button>
					</div>
					<div class="col-lg-4">
						<button type="button" name="user_rmo" class="user_rmo">นำออก</button>
					</div>
				</div>
		</form>
	</div>

	<!--User table-->
	<div class="section">
		
		<div class="slideInRight animated">
			<div id="manage_users"></div>
		</div>
	</div>
</main>
	
		
</body>

</html>

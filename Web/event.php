<?php
session_start();
if (!isset($_SESSION['Admin-name'])) {
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Stasus</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="icons/atte1.jpg">

    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="css/Users.css">
    <script>
      $(window).on("load resize ", function() {
        var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
        $('.tbl-header').css({'padding-right':scrollWidth});
    }).resize();
    </script>
</head>
<body>
<meta charset="utf-8">
<?php include'header.php'; ?> 
<main>
<section>
  <h1 class="slideInDown animated">จำนวนการมีส่วนร่วมในกิจกรรม</h1>
  <!--User table-->
  <div class="table-responsive slideInRight animated" style="max-height: 400px;"> 
    <table class="table">
      <thead class="table-primary">
        <tr>
		  <th>ชื่อกิจกรรม</th>
          <th>จำนวนเข้าร่วม</th>

        </tr>
      </thead>
      <tbody class="table-secondary">
        <?php
          //Connect to database
          require'connectDB.php';

            $sql = "SELECT device_dep, count( username) AS count_id FROM users_logs group by device_dep  ORDER BY checkindate DESC";
            $result = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($result, $sql)) {
                echo '<p class="error">SQL Error</p>';
            }
            else{
                mysqli_stmt_execute($result);
                $resultl = mysqli_stmt_get_result($result);
                if (mysqli_num_rows($resultl) > 0){
                    while ($row = mysqli_fetch_assoc($resultl)){
          ?>
                      <TR>                   
                      <TD><?php echo $row['device_dep'];?></TD>
                      <TD><?php echo $row['count_id'];?></TD>
                      </TR>
        <?php
                    }   
                }
            }
        ?>
      </tbody>
    </table>
  </div>
  <h1 class="slideInDown animated">การมีส่วนร่วมเข้ากิจกรรมของนักศึกษา</h1>
  <!--User table02-->
  <div class="table-responsive slideInRight animated" style="max-height: 400px;"> 
    <table class="table">
      <thead class="table-primary">
        <tr>
		  <th>รหัสนักศึกษา</th>
		  <th>ชื่อ</th>
          <th>จำนวนเข้าร่วมกิจกรรม</th>

        </tr>
      </thead>
      <tbody class="table-secondary">
        <?php
          //Connect to database
          require'connectDB.php';

            $sql = "SELECT username,serialnumber, count( device_dep) AS count_id FROM users_logs group by username ORDER BY serialnumber ASC";
            $result = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($result, $sql)) {
                echo '<p class="error">SQL Error</p>';
            }
            else{
                mysqli_stmt_execute($result);
                $resultl = mysqli_stmt_get_result($result);
                if (mysqli_num_rows($resultl) > 0){
                    while ($row = mysqli_fetch_assoc($resultl)){
          ?>
                      <TR>                   
                      <TD><?php echo $row['serialnumber'];?></TD>
                      <TD><?php echo $row['username'];?></TD>
					  <TD><?php echo $row['count_id'];?></TD>
                      </TR>
        <?php
                    }   
                }
            }
        ?>
      </tbody>
    </table>
  </div>
</section>
</main>
</body>
</html>

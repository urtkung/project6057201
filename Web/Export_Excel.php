<?php
//Connect to database
require'connectDB.php';

$output = '';

if(isset($_POST["To_Excel"])){
  
    $searchQuery = " ";
    $Start_date = " ";
    $End_date = " ";
    $Start_time = " ";
    $End_time = " ";
    $Finger_sel = " ";

    //Start date filter
    if ($_POST['date_sel_start'] != 0) {
        $Start_date = $_POST['date_sel_start'];
        $_SESSION['searchQuery'] = "checkindate='".$Start_date."'";
    }
    else{
        $Start_date = date("Y-m-d");
        $_SESSION['searchQuery'] = "checkindate='".date("Y-m-d")."'";
    }
    //End date filter
    if ($_POST['date_sel_end'] != 0) {
        $End_date = $_POST['date_sel_end'];
        $_SESSION['searchQuery'] = "checkindate BETWEEN '".$Start_date."' AND '".$End_date."'";
    }
    //Time-In filter
    if ($_POST['time_sel'] == "Time_in") {
      //Start time filter
      if ($_POST['time_sel_start'] != 0 && $_POST['time_sel_end'] == 0) {
          $Start_time = $_POST['time_sel_start'];
          $_SESSION['searchQuery'] .= " AND timein='".$Start_time."'";
      }
      elseif ($_POST['time_sel_start'] != 0 && $_POST['time_sel_end'] != 0) {
          $Start_time = $_POST['time_sel_start'];
      }
      //End time filter
      if ($_POST['time_sel_end'] != 0) {
          $End_time = $_POST['time_sel_end'];
          $_SESSION['searchQuery'] .= " AND timein BETWEEN '".$Start_time."' AND '".$End_time."'";
      }
    }
    //Time-out filter
    if ($_POST['time_sel'] == "Time_out") {
      //Start time filter
      if ($_POST['time_sel_start'] != 0 && $_POST['time_sel_end'] == 0) {
          $Start_time = $_POST['time_sel_start'];
          $_SESSION['searchQuery'] .= " AND timeout='".$Start_time."'";
      }
      elseif ($_POST['time_sel_start'] != 0 && $_POST['time_sel_end'] != 0) {
          $Start_time = $_POST['time_sel_start'];
      }
      //End time filter
      if ($_POST['time_sel_end'] != 0) {
          $End_time = $_POST['time_sel_end'];
          $_SESSION['searchQuery'] .= " AND timeout BETWEEN '".$Start_time."' AND '".$End_time."'";
      }
    }
    //Fingerprint filter
    if ($_POST['fing_sel'] != 0) {
        $Finger_sel = $_POST['fing_sel'];
        $_SESSION['searchQuery'] .= " AND fingerprint_id='".$Finger_sel."'";
    }


    $sql = "SELECT * FROM users_logs WHERE ".$_SESSION['searchQuery']." ORDER BY timein DESC";
    $result = mysqli_query($conn, $sql);
    if($result->num_rows > 0){
      $output .= 'ประวัติการเข้าร่วมกิจกรรม
                  <table class="table" bordered="1">  
                    <TR>
                      <TH>ชื่อ</TH>
                      <TH>รหัสนักศึกษา</TH>
                      <TH>ชื่อกิจกรรม</TH>
                      <TH>วันที่เข้าร่วม</TH>
                      <TH>เวลาเข้า</TH>
                      <TH>เวลาออก</TH>
                    </TR>';
        while($row=$result->fetch_assoc()) {
            $output .= '
                        <TR> 

                            <TD> '.$row['username'].'</TD>
                            <TD> '.$row['serialnumber'].'</TD>
                            <TD> '.$row['device_dep'].'</TD>
                            <TD> '.$row['checkindate'].'</TD>
                            <TD> '.$row['timein'].'</TD>
                            <TD> '.$row['timeout'].'</TD>
                        </TR>';
        }
        $output .= '</table>';
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=User_Log'.$Start_date.'.xls');
        
        echo $output;
        exit();
    }
    else{
      header( "location: UsersLog.php" );
      exit();
    }
}
?>

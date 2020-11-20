<?php 
session_start();
?>
<div class="table-responsive">          
	<table class="table">
		<thead>
	      <tr>
	        <th>รหัสกิจกรรม</th>
	        <th>ชื่อกิจกรรม</th>
			<th>ปรับปรุง</th>
	      </tr>
    	</thead>
    	    <tbody><?php  
		    	require'connectDB.php';
		    	$sql = "SELECT * FROM event ORDER BY event_id ASC";
				$result = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($result, $sql)) {
				    echo '<p class="error">SQL Error</p>';
				} 
				else{
				    mysqli_stmt_execute($result);
				    $resultl = mysqli_stmt_get_result($result);
				    echo '<form action="" method="POST" enctype="multipart/form-data">';
					    while ($row = mysqli_fetch_assoc($resultl)){


					    	echo '<tr>
							        <td>'.$row["event_id"].'</td>
							        <td>'.$row["event_name"].'</td>				        
							        <td>
								    	<button type="button" class="dev_del btn btn-danger" event_id="del_'.$row["event_id"].'" data-event_id="'.$row["event_id"].'" title="Delete this device"><span class="glyphicon glyphicon-trash"></span></button>
								    </td>
							      </tr>';
					    }
				    echo '</form>';
				}
		    ?>
				</tbody>
	</table>
</div>

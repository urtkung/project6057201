<?php

	$servername = "localhost";
    $username = "root";		
    $password = "64286428";			
    $dbname = "checktechno_db";
    
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	
	
	if ($conn->connect_error) {
        die("Database Connection failed: " . $conn->connect_error);
    }
	
?>
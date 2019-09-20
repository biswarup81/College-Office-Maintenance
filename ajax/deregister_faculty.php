<?php
include_once"../inc/datacon.php";
include '../classes/admin_class.php';
	if(isset($_GET['user_type']) && isset($_GET['faculty_id'])){
		//Perform the operation
		$faculty_id= $_GET['faculty_id'];
		$sql = "update pg_staff set STATUS = 2 where row_id = '".$faculty_id."'";
		mysql_query($sql) or die(mysql_error());
		echo "Successfully deactivated";
	} else {
		echo "You are not authorized to peform the operation";
	}

		

?>

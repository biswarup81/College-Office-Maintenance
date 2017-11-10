<?php
include_once"../inc/datacon.php";
include '../classes/admin_class.php';

    $admin = new admin();

			//if(isset($_POST['CREATE_PATIENT_DATA'])){
                $par_row_id = $_POST['gender'];
                $fname = $_POST['fname'];
    			
				$st_dt = date("Y-m-d", strtotime($_POST['theStartDate']));
				$end_dt = date("Y-m-d", strtotime($_POST['theEndDate']));

				$sql1 = "insert into pg_session (name,par_row_id,start_dt,end_dt,created_by, last_upd_by)
				values('$fname', '$par_row_id', '$st_dt', '$end_dt',0, 0)";
				mysql_query($sql1) or die(mysql_error());
			
				echo "Session $fname is added successful. <a class='btn btn-primary' href='./session.php'>Go To Session !!</a>";
				
			//}
		

?>

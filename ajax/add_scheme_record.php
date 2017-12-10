<?php
include_once"../inc/datacon.php";
include '../classes/admin_class.php';

    $admin = new admin();

			//if(isset($_POST['CREATE_PATIENT_DATA'])){
                $criteria = $_POST['theCriteria'];
                $fname = $_POST['fname'];
                $sAmt = $_POST['sAmt'];
				$st_dt = date("Y-m-d", strtotime($_POST['theStartDate']));
				$end_dt = date("Y-m-d", strtotime($_POST['theEndDate']));

				$sql1 = "insert into pg_scheme (name,amount,criteria,start_dt,end_dt,created_by, last_upd_by,active_flg)
				values('$fname', '$sAmt', '$criteria', '$st_dt', '$end_dt',0, 0,1)";
				mysql_query($sql1) or die(mysql_error());
			
				echo "Scheme $fname is added successful. <a class='btn btn-primary' href='./scheme.php'>Go To Scheme !!</a>";
				
			//}
		

?>

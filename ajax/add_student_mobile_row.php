<?php
include_once"../inc/datacon.php";
include '../classes/admin_class.php';

    $admin = new admin();

			//if(isset($_POST['CREATE_PATIENT_DATA'])){
                $student_id = $_POST['student_id'];
				$mobile = $_POST['mobile'];
				
				$sql1 = "insert into pg_student_mobile (student_id, mobile_num)
				values('$student_id','$mobile')";
				mysql_query($sql1) or die(mysql_error());
				$url = "student_details.php?student_id=".$student_id;

				
				echo "Mobile# for $student_id is recorded successfully. <a class='btn btn-primary' href='".$url."'>Back</a>";
				
			//}
		

?>

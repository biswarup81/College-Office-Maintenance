<?php
include_once"../inc/datacon.php";
include '../classes/admin_class.php';

    $admin = new admin();

			//if(isset($_POST['CREATE_PATIENT_DATA'])){
                $student_id = $_POST['student_id'];
				$std_code = $_POST['std_code'];
				$ph_num = $_POST['ph_num'];
				
				$sql1 = "insert into pg_student_ph (student_id, std_code, ph_num)
				values('$student_id','$std_code', '$ph_num')";
				mysql_query($sql1) or die(mysql_error());
			

				
				echo "Phone Number for $student_id is recorded successfully. <a class='btn btn-primary' href='./index_login.php'>Login Now !!</a>";
				
			//}
		

?>

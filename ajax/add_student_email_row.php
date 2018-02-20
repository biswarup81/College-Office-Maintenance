<?php
include_once"../inc/datacon.php";
include '../classes/admin_class.php';

    $admin = new admin();

			//if(isset($_POST['CREATE_PATIENT_DATA'])){
                $student_id = $_POST['student_id'];
				$email = $_POST['email'];
				
				
				$sql1 = "insert into pg_student_email (student_id, email)
				values('$student_id','$email')";
				mysql_query($sql1) or die(mysql_error());
			

				
				echo "Email Address $email for $student_id is recorded successfully. <a class='btn btn-primary' href='./add_student_addr.php?student_id=".$student_id."'>Add Address Now !!</a> or . <a class='btn btn-primary' href='./student_details.php?student_id=".$student_id."'>View Student Details !!</a>";
				
			//}
		

?>

<?php
include_once"../inc/datacon.php";
include '../classes/admin_class.php';

    $admin = new admin();

			//if(isset($_POST['CREATE_PATIENT_DATA'])){
                $student_id = $_POST['student_id'];
				$addr = $_POST['addr'];
				$addr2 = $_POST['addr2'];
				$addr3 = $_POST['addr3'];
				$state = $_POST['state'];
				$pincode = $_POST['pincode'];
				$addr_type = $_POST['addr_type'];
				
				$sql1 = "insert into pg_student_address (student_id,address_type,addr,addr_line_2,
				addr_line_3,state, pincode)
				values('$student_id','$addr_type','$addr', '$addr2', '$addr3', '$state', '$pincode' )";
				mysql_query($sql1) or die(mysql_error());
			
				$url = "student_details.php?student_id=".$student_id;
				
				echo "Address for  for $student_id is recorded successfully. <a class='btn btn-primary' href='".$url."'>Back</a>";
				
			//}
		

?>

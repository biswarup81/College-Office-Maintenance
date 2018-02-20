<?php
include_once"../inc/datacon.php";
include '../classes/admin_class.php';

    $admin = new admin();

			//if(isset($_POST['CREATE_PATIENT_DATA'])){
                $title = $_POST['title'];
				$gender = $_POST['gender'];
				$fname = $_POST['fname'];
				$mname = $_POST['mname'];
				$lname = $_POST['lname'];
				$category = $_POST['category'];
				$aadhaar_no = $_POST['aadhaar_no'];
				$dob = date("Y-m-d", strtotime($_POST['theDOB']));
				$phc = $_POST['phc'];
				
				$sql1 = "insert into pg_student (title,fst_name,middle_name,
				last_name,gender, dob, aadhaar_no, category, ph_challenged)
				values('$title','$fname','$mname', '$lname', '$gender', '$dob', '$aadhaar_no', '$category', '$phc' )";
				mysql_query($sql1) or die(mysql_error());
				$student_id = mysql_insert_id();
			

				
				echo "Dear  $fname $lname !! Registration is successful. <a class='btn btn-primary' href='./add_student_addr.php?student_id=".$student_id."'>Add Address Now !!</a> or . <a class='btn btn-primary' href='./student_details.php?student_id=".$student_id."'>View Student Details !!</a>";
				
			//}
		

?>

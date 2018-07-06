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
				$uid = mysql_insert_id();
				
				$role = "STUDENT";
				$password = "default123";
				$uid = date("Y").".".$uid;
				$full_name = $fname . $lname ;
				
				$insert_query = "insert into user(user_name,	user_full_name,	user_password,	role) values(
				'$uid','$full_name','".md5($password)."','$role')";
				echo $insert_query;
				mysql_query($insert_query) or die(mysql_error());
				

				
				echo "Dear  $fname $lname !! Registration is successful with password: $password ";
				
			//}
		

?>

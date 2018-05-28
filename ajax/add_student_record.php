<?php
include_once"../inc/datacon.php";
include '../classes/admin_class.php';

    $admin = new admin();

			//if(isset($_POST['CREATE_PATIENT_DATA'])){
    			$role = $_POST['role'];
				$gender = $_POST['gender'];
				$fname = $_POST['fname'];
				$lname = $_POST['lname'];
				$full_name = $fname." ".$lname;
				
				$uid = $_POST['uid'];
				$password = $_POST['password'];
				
				$aadhaar_no = $_POST['aadhaar_no'];
				$dob = date("Y-m-d", strtotime($_POST['theDate']));
				
				if($gender == 'Male'){
					$title = 'MR.';
				} else if($gender == 'Female'){
					$title = 'MS.';
				} else if($gender == 'Trans'){
					$title = 'Trans';
				}
				$category = $_POST['category'];
				
				$sql1 = "insert into pg_student (title, gender,fst_name,
				last_name, dob, old_student_id, aadhaar_no, category)
				values('$title','$gender','$fname', '$lname', '$dob' ,'$uid','$aadhaar_no','$category' )";
				//echo $sql1;
				mysql_query($sql1) or die(mysql_error());
			
				//Insert into user table$category
				
				$insert_query = "insert into user(user_name,	user_full_name,	user_password,	role) values(
				'$uid','$full_name','".md5($password)."','$role')";
				echo $insert_query;
				mysql_query($insert_query) or die(mysql_error());
				
				echo "Dear  $fname $lname !! Registration is successful. <a class='btn btn-primary' href='./index.php'>Login Now !!</a>";
				
			//}
		

?>

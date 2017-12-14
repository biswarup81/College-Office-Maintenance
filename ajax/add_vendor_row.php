<?php
include_once"../inc/datacon.php";
include '../classes/admin_class.php';

    $admin = new admin();

			//if(isset($_POST['CREATE_PATIENT_DATA'])){
                $fname = $_POST['fname'];
                $role = $_POST['role'];
				$mobile = $_POST['mobile'];
				$email = $_POST['email'];
				$address = $_POST['address'];
				$regno = $_POST['regno'];
				$pincode = $_POST['pincode'];
				
				$ph = $_POST['ph'];
				
				$sql1 = "insert into pg_vendor (name, vendor_type, mobile, email, registration_number, ph, address, pincode, created_by, last_upd_by)
				values('$fname','$role','$mobile', '$email', '$regno', '$ph', '$address', '$pincode', 1, 1 )";
				mysql_query($sql1) or die(mysql_error());
			

				
				echo "Dear  $fname  !! Registration is successful. <a class='btn btn-primary' href='./vendor.php'>Go Back !!</a>";
				
			//}
		

?>

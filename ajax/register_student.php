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
$mobile_no = $_POST['mobile_no'];

//Search Student

$sql_search = "select old_student_id from  pg_student where old_student_id = ".$uid;
$result = mysql_query($sql_search) or die(mysql_error());
if (mysql_num_rows($result) > 0) {
	echo "Dear  $fname $lname !! You're already registered <a class='btn btn-primary' href='./index.php'>Login Now !!</a><br/>In case you forogt your password <a class='btn btn-warning' href='./forgot_password.php'>Click here !!</a> to retrieve password in your mobile";
} else {

$sql1 = "insert into pg_student (title, gender,fst_name,
last_name, dob, old_student_id, aadhaar_no, category)
values('$title','$gender','$fname', '$lname', '$dob' ,'$uid','$aadhaar_no','$category' )";
//echo $sql1;
$result = mysql_query($sql1) or die(mysql_error());

//Insert into table pg_student_mobile


$sql2 = "insert into pg_student_mobile (student_id, mobile_num) values 
('$uid','$mobile_no')";

//Insert into user table$category

$insert_query = "insert into user(user_name,	user_full_name,	user_password,	role) values(
'$uid','$full_name','".md5($password)."','$role')";
echo $insert_query;
mysql_query($insert_query) or die(mysql_error());

echo "Dear  $fname $lname !! Registration is successful. <a class='btn btn-primary' href='./index.php'>Login Now !!</a>";
}

//}


?>

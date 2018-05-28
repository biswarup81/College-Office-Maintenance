<?php
include_once"../inc/datacon.php";
include '../classes/admin_class.php';

$admin = new admin();

//if(isset($_POST['CREATE_PATIENT_DATA'])){

$uid = $_POST['uid'];

$mobile_no = $_POST['mobile_no'];

//Search Student

$sql_search = "select old_student_id from  pg_student where old_student_id = ".$uid;
$result = mysql_query($sql_search) or die(mysql_error());
if (mysql_num_rows($result) <= 0) {
	echo "You're not a registered user. Please Register Here. <a class='btn btn-primary' href='./register.php'>Register !!</a><br/>";
} else {
	
	$sql1 = "select a.mobile_num, a.row_id, a.student_id from pg_student_mobile a inner join (SELECT student_id, max(row_id) as maxroid FROM `pg_student_mobile` 
			group by student_id) b on a.row_id = b.maxroid where a.student_id = '".$uid."' and a.mobile_num = '".$mobile_no."'";
	//echo $sql1;
	$result1 = mysql_query($sql1) or die(mysql_error());
	
	if (mysql_num_rows($result1) <= 0) {
		echo "Your mobile number".$mobile_no. " is not registered. <a class='btn btn-primary' href='./forgot_password.php'>Try Again</a><br/>";
	} else {
		//Send SMS
		
		$newpassword = rand(10,1000000);
		$sql2= "update user set user_password = md5('".$newpassword."') where user_name ='".$uid."'";
		mysql_query($sql2) or die(mysql_error());
		$message = "Roll number - ".$uid." and Password is ".$newpassword."  Login now. http://www.kandrarkkmahavidyalaya.org/College-Office-Software/";
		sendSMS($message, $mobile_no);
		//echo $message;
		echo "Dear  User !! SMS with your password is sent to your mobile number ".$mobile_no.". <a class='btn btn-primary' href='./index.php'>Login Now !!</a>";
	}
}

//}

function sendSMS($message, $mobile_num){
	/* $admin = new admin_class();
	
	//$url="http://bulksms.mysmsmantra.com:8080/WebSMS/SMSAPI.jsp?";
	$url = trim($admin->getConstant("SMS_API_URL"));
	$sms_user_name =  trim($admin->getConstant("SMS_USER"));
	$sms_psswd = trim($admin->getConstant("SMS_PASS"));
	$sender_id = trim($admin->getConstant("SMS_SENDER_ID")); */
	
	//http://bulksms.pginfoservices.com/api/sendmsg.php?user=kandrarkk&pass=Jun_2107&sender=KRKKMV&phone=9830875590,9874404111&text=Your application  for B.A. Hons - BENGALI is sort listed. Follow instruction online to complete admission.&priority=ndnd&stype=normal
	$url ="http://bulksms.pginfoservices.com/api/sendmsg.php";
	$sms_user_name = "kandrarkk";
	$sms_psswd = "Jun_2107";
	$sender_id = "KRKKMV";
	
	$mobile_num = trim($mobile_num);
	//echo ($url);
	//echo ($sms_user_name);
	//echo ($sender_id);
	//echo ($mobile_num);
	$message = urlencode($message);
	$ch = curl_init();
	if (!$ch){die("Couldn't initialize a cURL handle");}
	$ret = curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt ($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
	//curl_setopt ($ch, CURLOPT_POSTFIELDS,"username=kandra&password=1493715534&sendername=KRKKMV&mobileno=".$mobileNo."&message=".$message );
	curl_setopt ($ch, CURLOPT_POSTFIELDS,"user=".$sms_user_name."&pass=".$sms_psswd."&sender=".$sender_id."&phone=".$mobile_num."&text=".$message."&priority=ndnd&stype=normal" );
	$ret = curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$curlresponse = curl_exec($ch);
	
	//return $result;
}
?>
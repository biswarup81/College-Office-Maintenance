<?php
include_once"../inc/datacon.php";
include '../classes/admin_class.php';
if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id'])){
	$user_id = $_SESSION['logged_in_user_id'];
			//if(isset($_POST['PAYMENT'])){
				$head = $_POST['head'];
				$description = $_POST['description'];
				$amount= $_POST['amount'];
				$id = $_POST['hidden_vendor_id'];
				
				
				$sql1 = "insert into pg_vendor_payment (vendor_id,amount,payment_type,payment_dt,purpose,active_flg,created,created_by,last_upd_dt,last_upd_by)
				values('$id','$amount','$head', NOW(), '$head', '1', NOW(), '$user_id', NOW(), '$user_id' )";
				
				mysql_query($sql1) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $sql1. "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
				
				$pay_id = mysql_insert_id();
				
				echo "Payment is successful. <a class='btn btn-primary' href='./print/debit_voucher_p.php?payment_id=".$pay_id."'>Click Here !!</a> to print voucher";
				
			//}
} else {
	echo "Session Expired. Please login !!";
}

?>

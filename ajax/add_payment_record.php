<?php
include_once "../inc/datacon.php";
include '../classes/admin_class.php';

$admin = new admin();


// if(isset($_POST['CREATE_PATIENT_DATA'])){
$student_id = $_POST['student_id'];
$invoice_id = $_POST['invoice_id'];
$pay_amount = $_POST['payamt'];
$pay_dt = date("Y-m-d", strtotime($_POST['thePayDate']));
$created_by = $_SESSION['logged_in_user_id'];
$last_updated_by = $_SESSION['logged_in_user_id'];

$item_list = $_POST['item_list'];
$arr = explode(",", $item_list);
$arr_len = count($arr);
$row = 0;
$res = "";
$upd = 0;
$updfail = 0;
$sql1 = "insert into pg_student_payment (student_id,invoice_id,amount,payment_dt,pay_mode, created_by, last_upd_by, last_upd_dt)
				values('$student_id', '$invoice_id', '$pay_amount', '$pay_dt','CASH','$created_by', '$last_updated_by', NOW())";
//echo $sql1;
$chk_ins = mysql_query($sql1) or die(mysql_error());
if ($chk_ins)
{
    $pay_id = mysql_insert_id();
    while ($row < $arr_len)
    {
        $sql2 = "update pg_student_invoice_item set paid_flg = 1, payment_id =" . $pay_id . " where row_id = ". $arr[$row] ." and paid_flg = 0";
        $chk_upd = mysql_query($sql2) or die(mysql_error());
        if ($chk_upd)
        {
            $upd = $upd + 1;
        }
        else 
            $updfail = $updfail + 1;
            $res="There are " . $upd . " successful update and " . $updfail . " failures. Contact administrator if there are failures.";
        $row = $row + 1;
    }
    $sql3 = "select count(*) cnt from pg_student_invoice_item where invoice_id =" . $invoice_id . " and paid_flg = 0";
    $chk_inv = mysql_query($sql3) or die(mysql_error());
    while ($row = mysql_fetch_array($chk_inv))
    {
        if($row['cnt'] == 0 )
        {
            $sql4 = "update pg_student_invoice set paid_flg = 1 where row_id = " . $invoice_id ;
            $upd_inv = mysql_query($sql4) or die(mysql_error());
        }
    }
    echo "Payment: " . $pay_amount . " Received successfully for " . $arr_len . " items." ;
}
else {echo "Payment not received.";}

// }

?>

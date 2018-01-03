<?php
include_once "../inc/datacon.php";
include '../classes/admin_class.php';

$admin = new admin();

// if(isset($_POST['CREATE_PATIENT_DATA'])){
$report_dt = $_POST['report_dt'];
$report_dt_f = date("d / M / Y", strtotime($report_dt));
echo "<div>";
$sql = "select pay_mode, sum(amount) as total_pay_amount from pg_student_payment "
    ." where payment_dt =STR_TO_DATE('".$report_dt . "','%m/%d/%Y') and active_flg = 1 group by pay_mode";
    //echo "<div>" . $sql . "</div>";
    $result = mysql_query($sql);
    $count = 0;
    while ($row = mysql_fetch_array($result)) {
        $count = $count + 1;
        
        if ($count == 1) {
            echo "<h2 class='sub-header'>Student Payments Recived: " . "</h2>";
            echo "<table class='table table-striped'>
                                <thead>
                                <tr>
								<th>Payment Mode</th>
								<th>Amount</th>
								<th>Date</th>
								</tr>
						          </thead>";
        }
        echo "<tbody>
                                <tr>
								<td>" . $row['pay_mode'] . "</td>
								<td>" . $row['total_pay_amount'] . "</td>
								<td>" . $report_dt . "</td>
								</tr>
						          </tbody>";
    }
    if ($count < 1) {
        echo "<h2 class='sub-header'>No Student Payments Recived for the date: " . $report_dt_f . "</h2>";
    }
    echo "</div>";
    echo "<div>";
    $sql = "select payment_type as pay_mode, sum(amount) as total_pay_amount from pg_vendor_payment "
        ." where payment_dt =STR_TO_DATE('".$report_dt . "','%m/%d/%Y') and active_flg = 1 group by pay_mode";
        //echo "<div>" . $sql . "</div>";
        $result = mysql_query($sql);
        $count = 0;
        while ($row = mysql_fetch_array($result)) {
            $count = $count + 1;
            
            if ($count == 1) {
                echo "<div>Vendor Payments Disbursed: " . "</div>";
                echo "<table class='table table-striped'>
                                <thead>
                                <tr>
								<th>Payment Mode</th>
								<th>Amount</th>
								<th>Date</th>
								</tr>
						          </thead>";
            }
            echo "<tbody>
                                <tr>
								<td>" . $row['pay_mode'] . "</td>
								<td>" . $row['total_pay_amount'] . "</td>
								<td>" . $report_dt . "</td>
								</tr>
						          </tbody>";
        }
        if ($count < 1) {
            echo "<h2 class='sub-header'>No Vendor Payments done for the date: " . $report_dt_f . "</h2>";
        }
        echo "</div>";

?>

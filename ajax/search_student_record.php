<?php
include_once"../inc/datacon.php";
include '../classes/admin_class.php';

    $admin = new admin();

			//if(isset($_POST['CREATE_PATIENT_DATA'])){
                $student_id = $_POST['student_id'];
                $sql = "select row_id, fst_name, last_name from pg_student where row_id =".$student_id;
				$result = mysql_query($sql);
				$count = 0;
				while ($row = mysql_fetch_array($result)) {
		        $count = $count + 1;
		        $student_name=$row['fst_name']." ".$row['last_name'];
		        $std_id = $row['row_id'];
    }
    if($count==1)
    {
        echo "<h2 class='sub-header'>Student Name: ".$student_name."</h2>";
        $sql = "SELECT a.row_id student_id, b.row_id invoice_id, b.name invoice_name, sum(c.amount) total_amount, sum(c.discount) Total_discount, min(due_dt) min_due_dt
FROM pg_student a inner join pg_student_invoice b on a.row_id = b.student_id inner join pg_student_invoice_item c on b.row_id = c.invoice_id
where a.row_id = ".$std_id." and b.paid_flg = 0
group by a.row_id , b.row_id , b.name";
        $result = mysql_query($sql);
        $count = 0;
        while ($row = mysql_fetch_array($result)) {
            $count = $count + 1;
            if($count==1)
                echo "<table class='table table-striped'>
                                <thead>
                                <tr>
								<th>Student Id</th>
								<th>Invoice Number</th>
								<th>Fee Name</th>
								<th>Invoice Total</th>
								<th>Discount Total</th>
								<th>Due Date</th>
								<th>Receive Payment</th>
							     </tr>
						          </thead>";
            echo "<tbody>
                                <tr>
								<td>".$row['student_id']."</td>
								<td><a href=receive_payment.php?invoice_id=".$row['invoice_id'].">".$row['invoice_id']."</a></td>
								<td>".$row['invoice_name']."</td>
								<td>".$row['total_amount']."</td>
								<td>".$row['Total_discount']."</td>
								<td>".$row['min_due_dt']."</td>
								<td><a href=receive_payment.php?invoice_id=".$row['invoice_id'].">"."Click Here</a></td>
							     </tr>
						          </tbody>";
        }
        if($count>0)
            echo "</table>";
        else 
            echo "<div>No invoice pending</div>";
    }
    else 
    {
        echo "<div>Student:".$student_id." not found</div>";
    }

?>

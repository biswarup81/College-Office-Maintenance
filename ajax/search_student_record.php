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
								<td><a href=receive_payment.php?student_id=".$row['student_id'].">".$row['student_id']."</a></td>
								<td>".$row['student_id']."</td>
								<td>".$row['student_id']."</td>
								<td>".$row['student_id']."</td>
								<td>".$row['student_id']."</td>
								<td><a href=receive_payment.php?student_id=".$row['student_id'].">"."Click Here</a></td>
							     </tr>
						          </tbody>";
       
    }
    else 
    {
        echo "<div>Student:".$student_id." not found</div>";
    }

?>

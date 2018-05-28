<?php
include_once"../inc/datacon.php";
include '../classes/admin_class.php';

    $admin = new admin();

			//if(isset($_POST['CREATE_PATIENT_DATA'])){
                $student_id = $_POST['student_id'];
				$esession = $_POST['esession'];
				$course = $_POST['course'];
				
				$sql1 = "insert into pg_session_course_student (session_course_id, student_id, promo_retained, created, last_upd_dt, created_by, last_upd_by)
				select row_id, '$student_id', 0, now(), now(), 1,1 from pg_session_course where session_id = '$esession' and course_id = '$course' ";
				mysql_query($sql1) or die("<b>A fatal MySQL error occured</b>.\n<br />Query: " . $sql1. "<br />\nError: (" . mysql_errno() . ") " . mysql_error());
				$rec_count = mysql_affected_rows();
				
				$url = "student_details.php?student_id=".$student_id;
				
				if($rec_count > 0)
				echo "$student_id is linked to $course for Session $esession successfully. <a class='btn btn-primary' href='".$url."'>Back</a>";
				else 
				    echo "<a color=red>Student $student_id linking FAILED to $course for Session $esession </a>";
				
			//}
		

?>

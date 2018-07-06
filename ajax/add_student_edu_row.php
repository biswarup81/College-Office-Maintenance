<?php
include_once"../inc/datacon.php";
include '../classes/admin_class.php';

    $admin = new admin();

			//if(isset($_POST['CREATE_PATIENT_DATA'])){
                $student_id = $_POST['student_id'];                $board = $_POST['board'];                $lvl = $_POST['lvl'];                $inst = $_POST['inst'];                $roll = $_POST['roll'];                $indx = $_POST['indx'];                $session_course_id = null;                				$sql1 = "insert into pg_student_board (student_id, board_name, level, instituition_name, session_course_id, roll, index_no)
				values('$student_id','$board','$lvl','$inst','$session_course_id','$roll','$indx')";
				$res=mysql_query($sql1) or die(mysql_error());				$url = "student_details.php?student_id=".$student_id;
				if($res)				    echo "Education details recorded successfully. <a class='btn btn-primary' href='".$url."'>Back</a>";				else 
				    echo "Error recording education. Contact College. <a class='btn btn-primary' href='".$url."'>Back</a>";
			//}
		

?>

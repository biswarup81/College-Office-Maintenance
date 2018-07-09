<?php
include_once"../inc/datacon.php";
include '../classes/admin_class.php';

    $all_ok = true;
    $error_msg = "";

    if (isset($_SESSION['sid']))
        $session_id = ($_SESSION['sid']);
    else 
    {
        $all_ok = false;
        $error_msg = $error_msg . " No Active Session.";
    }
    
        $title = $_POST['title'];
		$gender = $_POST['gender'];
		$fname = $_POST['fname'];
		$mname = $_POST['mname'];
		$lname = $_POST['lname'];
		$app_no = $_POST['app_no'];
		$category = $_POST['category'];
		$aadhaar_no = $_POST['aadhaar_no'];
		$dob = date("Y-m-d", strtotime($_POST['theDOB']));
		$phc = $_POST['phc'];
		
		$board = $_POST['board'];
		$lvl = 12;
		$inst = $_POST['inst'];
		$roll = $_POST['roll'];
		$indx = $_POST['indx'];
		
		$course_lvl_cd = $_POST['course_lvl_cd'];
		$course_cd = $_POST['course_cd'];
		$session_course_id = 0;
		
		$role = $_POST['role'];
		$password = "default123";
		$created_by = 1;
		$full_name = $fname . " " . $lname ;
		
		$course_sql = "select a.row_id, a.name from pg_course a".
		" inner join pg_course_level b on a.course_level_id = b.row_id".
		" inner join pg_specialisation c on a.specialisation_id = c.row_id".
		" where b.course_lvl_cd = '$course_lvl_cd' and b.row_id = c.course_level_id and c.course_cd = '$course_cd'";
		$course_res = mysql_query($course_sql) or die(mysql_error());
		while ($course_row = mysql_fetch_array($course_res))
		{
		    $course_id = $course_row['row_id'];
        	$course_name = $course_row['name'];
        	echo  "<br>"."Course Level Cd: " . $course_lvl_cd .  "</br>";
        	echo  "<br>"."Course Cd: " . $course_cd. "</br>" ;
        	echo  "<br>"."Course Name: ".$course_name .  "</br>";
		}

		$sql1 = "insert into pg_student (title,fst_name,middle_name,
				last_name,gender, dob,old_student_id, aadhaar_no, category, ph_challenged)
				values('$title','$fname','$mname', '$lname', '$gender', '$dob', '$app_no', '$aadhaar_no', '$category', '$phc' )";
		
		if($all_ok)
		{
		mysql_query($sql1) or die(mysql_error());
		$student_id = mysql_insert_id();
		echo  "<br>"."Student Id: ". $student_id. "</br>";

		$insert_query = "insert into user(user_name,	user_full_name,	user_password,	role) values(
                        '$student_id','$full_name','".md5($password)."','$role')";
		mysql_query($insert_query) or die(mysql_error());
		$user_id = mysql_insert_id();
		echo  "<br>"."User Id: ". $user_id. "</br>";
				
		$sql1 = "insert into pg_student_board (student_id, board_name, level, instituition_name, session_course_id, roll, index_no)
				values('$student_id','$board','$lvl','$inst','$session_course_id','$roll','$indx')";
		$res=mysql_query($sql1) or die(mysql_error());
		}
		
		$sql_scst = "insert into pg_session_course_student (session_course_id, student_id, promo_retained, created, last_upd_dt, created_by, last_upd_by)
				select row_id, '$student_id', 0, now(), now(), 1,1 from pg_session_course where session_id = '$session_id' and course_id = '$course_id' ";
		
		mysql_query($sql_scst) or die(mysql_error());
		$rec_count = mysql_affected_rows();
		$scs_id = mysql_insert_id();
		echo  "<br>"."SCS Id: ". $scs_id. "</br>";
				
				
		$fee_name = substr("Total Admission Fee - " . $course_name,0, 50);
				        
				        $sql1 = "SELECT a.row_id as session_course_id, c.row_id as fee_id, c.name as fee_name, c.row_id, c.active_flg, d.category as student_category, d.ph_challenged
FROM pg_session_course a inner join pg_session_course_student b on a.row_id = b.session_course_id
inner join pg_fee_master c on a.course_id = c.course_id inner join pg_student d on b.student_id = d.row_id where d.row_id = '$student_id' and a.session_id = " . $session_id . " and c.name = '$fee_name'";
				        
				        $result = mysql_query($sql1) or die(mysql_error());
				        
				        $count = 1;
				        while ($row = mysql_fetch_array($result)) {
				            $session_course_id = $row['session_course_id'];
				            $fee_id = $row['fee_id'];
				            $fee_name = $row['fee_name'];
				            $catg = $row['student_category'];
				            $ph_c = $row['ph_challenged'];
				            $ins_inv = "insert into pg_student_invoice(session_course_id, student_id,  name, fee_id, invoice_dt, created, created_by, last_upd_dt, last_upd_by)
 values(" . $session_course_id . "," . $student_id . " , '" . $fee_name . "' , " . $fee_id . ", NOW(), NOW(), '".$created_by."', NOW(), '".$created_by."')";
				            $chk_ins = mysql_query($ins_inv) or die(mysql_error());
				            if ($chk_ins) {
				                $inv_id = mysql_insert_id();
				                echo  "<br>"."Invoice Id: " . $inv_id. "</br>";
				                $sql2 = "select a.row_id item_id, a.name item_name, a.amount, a.due_by, a.due_by_unit
from pg_fee_item a where a.par_row_id = " . $fee_id . " and a.active_flg = 1 order by a.row_id asc";
				                
				                $res_item = mysql_query($sql2) or die(mysql_error());
				                while ($row_item = mysql_fetch_array($res_item)) {
				                    $item_id = $row_item['item_id'];
				                    $item_name = $row_item['item_name'];
				                    $item_amt = $row_item['amount'];
				                    $due_by = $row_item['due_by'];
				                    $due_by_unit = $row_item['due_by_unit'];
				                    if ($ph_c == 1)
				                        $sql3 = "select category, amount from pg_fee_item_discount where par_row_id = " . $item_id . " and category in ('PH', '" . $catg . "') and active_flg = 1 order by amount desc";
				                        else
				                            $sql3 = "select category, amount from pg_fee_item_discount where par_row_id = " . $item_id . " and category = '" . $catg . "' and active_flg = 1 order by amount desc";
				                            $cnt = 0;
				                            $res_disc = mysql_query($sql3) or die(mysql_error());
				                            
				                            if ($row_disc = mysql_fetch_array($res_disc)) {
				                                $cnt = $cnt + 1;
				                                $discount = $row_disc['amount'];
				                                $discount_category = $row_disc['category'];
				                            } else {
				                                $discount = 0;
				                                $discount_category = "NA";
				                            }
				                            $ins_inv_item = "insert into pg_student_invoice_item(invoice_id, item_id, name, amount, discount_category, discount, due_dt, created, created_by, last_upd_dt, last_upd_by, paid_flg, active_flg)
 values(" . $inv_id . "," . $item_id . ", '" . $item_name . "' , '" . $item_amt . "' , '" . $discount_category . "' , " . $discount . ",NOW(), NOW(), '".$created_by."', NOW(), '".$created_by."', 0, 1)";
				                            //echo $ins_inv_item;
				                            $chk_ins = mysql_query($ins_inv_item) or die(mysql_error());
				                            if ($chk_ins) {
				                                $inv_item_id = mysql_insert_id();
				                                echo "<br>" . $inv_item_id . "</br>";
				                            }
				                }
				            }
				        }
				        
            if($all_ok)
				echo "Dear  $fname $lname !! Registration is successful. Your Student Id: $student_id created with password: $password ";
			else 
                echo "No active session to take admission";

?>
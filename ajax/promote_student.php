<?php
include_once "../inc/datacon.php";
include '../classes/admin_class.php';

$admin = new admin();

// if(isset($_POST['CREATE_PATIENT_DATA'])){
$student_list = "10000001,10000002";//$_POST['student_list_csv'];
$sc_id = 9;//$_POST['sc_id'];
$arr = explode(",", $student_list);
$arr_len = count($arr);
$row = 0;
$res = "";
$ins = 0;
$ins_fail = 0;
    while ($row < $arr_len)
    {
        $sql2 = "insert into pg_session_course_student (session_course_id, student_id) values('$sc_id','$arr[$row]' )";
        $chk_ins = mysql_query($sql2) or die(mysql_error());
        if ($chk_ins)
        {
            $ins = $ins + 1;
        }
        else 
            $ins_fail = $ins_fail + 1;
            
        $row = $row + 1;
    }
   
    echo "No of Student promoted: " . $ins . "  successfully with " . $ins_fail . " failures." ;


// }

?>

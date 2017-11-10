<?php
include_once "../inc/datacon.php";
include_once "../inc/header.php"; 
if(isset($_POST['formDoor']))
    $aDoor = $_POST['formDoor'];
else 
    $aDoor = "";
    if(isset($_POST['promoteSubmit']))
        $promote = true;
    else if(isset($_POST['retainSubmit']))
        $promote = false;
    else 
        $promote = false;
    if(isset($_POST['course_id'])&&isset($_POST['as_id'])&&isset($_POST['sc_id']))
{
    $course_id = $_POST['course_id'];
    $as_id = $_POST['as_id'];
    $sc_id = $_POST['sc_id'];
    
    $sql = "select a.row_id, a.name, a.year, a.suffix from pg_course a left join pg_course_level b on a.course_level_id = b.row_id
left outer join pg_specialisation c on a.specialisation_id = c.row_id where a.par_row_id = ".$course_id;
    $res = mysql_query($sql);
    $count = 0;
    while ($rw = mysql_fetch_array($res)) {
        $count = $count + 1 ;
        $row_id = $rw['row_id'];
        $next_course_name = $rw['name'];
    }
    if($count==1)
    {
        $next_course_id = $row_id;
        if($promote)
            $sql1 = "select * from pg_session_course a where a.session_id =".$as_id." and a.course_id =".$next_course_id;
        else 
            $sql1 = "select * from pg_session_course a where a.session_id =".$as_id." and a.course_id =".$course_id;
        $resc = mysql_query($sql1);
        $count = 0;
        while ($row = mysql_fetch_array($resc))
        {
            $count = $count + 1 ;
            $nsc_id = $row['row_id'];
        }
    }
    else 
        $next_course_id = 0;
}
else
    $course_id = "";
if(empty($aDoor))
    {
        echo("You didn't select any students.");
}
else
    {
        $N = count($aDoor);
        //echo("You $as_id selected $next_course_name and $N door(s): ");
        for($i=0; $i < $N; $i++)
            {
                if($next_course_id==0)
                {
                    $upd_sql = "update pg_session_course_student set promo_retained=1 where session_course_id =".$sc_id." and student_id=".$aDoor[$i];
                    mysql_query($upd_sql);
                    echo "Student passed out: ".$aDoor[$i];
                }
                else
                {
                $ins_sql = "insert into pg_session_course_student(session_course_id, student_id)values('$nsc_id', '$aDoor[$i]')";
                mysql_query($ins_sql);
                $upd_sql = "update pg_session_course_student set promo_retained=1 where session_course_id =".$sc_id." and student_id=".$aDoor[$i];
                mysql_query($upd_sql);
                if ($promote)
                    echo "Student promoted: ".$aDoor[$i];
                else 
                    echo "Student retained: ".$aDoor[$i];
                }
        }
}
?>
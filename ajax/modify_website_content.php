<?php
include_once"../inc/datacon.php";
include '../classes/admin_class.php';
$admin = new admin();

//if(isset($_POST['CREATE_PATIENT_DATA'])){
$page_id = $_POST['page_id'];
$content = htmlentities(mysql_real_escape_string($_POST['content']));

if ( mysql_num_rows(mysql_query("select content from pg_web_content where page_id =".page_id) or die(mysql_error())) > 0) {

$sql1 = "insert into pg_web_content(page_id, content) values ('".$page_id."','".$content."')";
//echo $sql1;
echo "Page is inserted !!";
mysql_query($sql1) or die(mysql_error());
} else {
    $sql1 = "update pg_web_content set content = '".$content."' where page_id '".$page_id."'";
    mysql_query($sql1) or die(mysql_error());
    echo "Page is updated !!";
}




//}


?>

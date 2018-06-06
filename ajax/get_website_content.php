<?php
include_once"../inc/datacon.php";
include '../classes/admin_class.php';

$admin = new admin();

$page_id = $_POST['page_id'];
$query = "select content from pg_web_content where page_id ='".$page_id. "'" ;
$result = mysql_query($query) or die(mysql_error());
$content = "Content Not set..";
while($row = mysql_fetch_array($result)){
    $content = $row['content'];
}
echo $content;
?>

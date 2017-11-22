<?php
require_once "../inc/datacon.php";
if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id'])){

$q = strtolower($_GET["term"]);
if (!$q) return;

    $sql = "select CONCAT(fst_name,' ', last_name) as name from pg_staff where fst_name like '$q%' OR `last_name` like '$q%'
				UNION
				select name from pg_vendor where name like '$q%'";
//$sql = "select * from medicine_master a where a.MEDICINE_NAME LIKE '$q%' and a.MEDICINE_STATUS = 'ACTIVE' AND a.chamber_id='$chamber_name' AND a.doc_id='$doc_name'";
/* $rsd = mysql_query($sql);
while($rs = mysql_fetch_array($rsd)) {
	$cname = $rs['MEDICINE_NAME'];
	echo "$cname\n"; */

	$result = mysql_query($sql)or die(mysql_error());

	
	$return_arr= array();
	
	while ($row = mysql_fetch_array($result))
	{
		$row_array['label'] = $row['name'];
		$row_array['value'] = $row['name'];
		array_push($return_arr,$row_array);
		
	}
	echo json_encode($return_arr);
}else {
	echo "Session expired";
}
?>
<?php
require_once "../inc/datacon.php";
if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id'])){
	
	if(isset($_GET["term"])) {
		$q = strtolower($_GET["term"]);
		if (!$q) return;
		
		$sql = "select fst_name as name, row_id as id from pg_staff where fst_name like '$q%' 
		UNION
		select name, row_id as id from pg_vendor where name like '$q%'";
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
			$row_array['id'] = $row['id'];
			array_push($return_arr,$row_array);
			
		}
		echo json_encode($return_arr);
	} else if(isset($_GET["MODE"])){
		$mode = $_GET['MODE'];
		if ($mode == "ALL_RECORDS"){
			$name=$_GET['name'];
			$sql = "select CONCAT(fst_name,' ', last_name) as name, row_id as id from pg_staff where fst_name like '$name%' OR `last_name` like '$name%'
			UNION
			select name, row_id as id from pg_vendor where name like '$name%'";
			//echo $sql;
			$result = mysql_query($sql)or die(mysql_error());
			echo '<div class="col-sm-6">
				<table class="table">
					<thead>
						<tr>
						<th>Choose</th>
						<th>Name</th>
						<th>Vendor/Staff</th>
						</tr>
					</thead>
					<tbody>';
			while ($row = mysql_fetch_array($result))
			{
				echo '<tr>
						<td><input id="radio_'.$row['id'].'" type="radio" name="vendor_id_selector" onclick="getDetails('.$row['id'].');" value='.$row['id'].'></td>
						<td>'.$row['name'].'</td>
						<td>Staff</td>
						</tr>';
			}
			
			echo '</tbody>
				</table>
			</div>';
			
		}
	}
	
	

}else {
	echo "Session expired";
}
?>
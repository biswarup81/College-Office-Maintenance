<?php

include_once "./inc/datacon.php";
include_once "./inc/header.php";

if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id'])) {
	if($_SESSION['user_type'] == "PRINCIPAL" || $_SESSION['user_type'] == "PROFESSOR" ) {
    ?>

    <?php include './inc/dashboard_topnav.php'; ?>

<div class="container-fluid">
	<div class="row">
        <?php include './inc/master_sidenav.php'; ?>
        <div
			class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h1 class="page-header">Session Course List</h1>

			<div class="row">
				<div class="col-md-12">
				<h2 class="sub-header">Session Course</h2>
				

					<table id="session_list" class="table table-striped">
						<thead>
							<tr>
								<th>Session Name</th>
								<th>Course Name</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Active</th>
							</tr>
						</thead>
						<tbody>
<?php
    
    $result = mysql_query("SELECT b.row_id, a.name session_name, a.start_dt, a.end_dt, c.name course_name, b.active_flg 
FROM pg_session a inner join pg_session_course b on a.row_id = b.session_id inner join pg_course c on b.course_id =c.row_id");
    $count = 1;
    while ($row = mysql_fetch_array($result)) {
        
        ?>
                <tr>
								<td><?php echo $row['session_name']; ?></td>
								<td><?php echo $row['course_name']; ?></td>
								<td><?php echo date("d / m / Y", strtotime($row['start_dt'])); ?></td>
								<td><?php echo date("d / m / Y", strtotime($row['end_dt'])); ?></td>
								<td><?php if($row['active_flg']) echo "Y"; else echo "N"; ?></td>
							</tr>
    <?php
        $count = $count + 1;
    }
    
    ?>
              
		              </tbody>
					</table>
				</div>
			</div>



		</div>
	</div>
</div>

<?php
} else {
	echo "You are not authorized to perform any operation on this page.";
}
} else {
    echo "You are not authorized to perform any operation. Close the browser and signin again";
}
include_once './inc/footer.php';?>

</body>
</html>

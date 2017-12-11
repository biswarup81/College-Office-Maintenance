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
			<h1 class="page-header">Session Management</h1>

			<div class="row">
				<div class="col-md-12">
				<h2 class="sub-header">Session Master</h2>
				<a class="btn btn-warning" href="add_session.php" role="button">Add Session+</a>

					<table id="session_list" class="table table-striped">
						<thead>
							<tr>
								<th>Session Name</th>
								<th>Previous Session</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Active</th>

								<th>Course Linked</th>
								<th></th>

							</tr>
						</thead>
						<tbody>
<?php
    
    $result = mysql_query("SELECT a.row_id, a.name, b.name prev_session, a.start_dt, a.end_dt, a.active_flg, a.course_linked 
FROM pg_session a left outer join pg_session b on a.par_row_id = b.row_id order by a.start_dt desc");
    $count = 1;
    while ($row = mysql_fetch_array($result)) {
        
        ?>
                <tr>
								<td><?php echo $row['name']; ?></td>
								<td><?php echo $row['prev_session']; ?></td>
								<td><?php echo date("d / m / Y", strtotime($row['start_dt'])); ?></td>
								<td><?php echo date("d / m / Y", strtotime($row['end_dt'])); ?></td>
								
								<td><?php if($row['active_flg']) echo "Y"; else echo "N"; ?></td>
								<td><?php if(!$row['active_flg']) echo ""; else if($row['course_linked']) echo ""; else echo "<a href='link_course_session.php' method='POST'> Link Course</a>" ?> </td>
								
								
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
<script src ="js/courselink.js"></script>
</body>
</html>

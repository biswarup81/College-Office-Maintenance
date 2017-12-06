<?php

include_once "./inc/datacon.php";
include_once "./inc/header.php";

$_REQUEST['page'] = '2';

if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id'])) {
    ?>

    <?php include './inc/dashboard_topnav.php'; ?>

<div class="container-fluid">
	<div class="row">
        <?php include './inc/accounts_sidenav.php'; ?>
        <div
			class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h1 class="page-header">Invoice Management</h1>

			<div class="row">
				<div class="col-md-12">
				<h2 class="sub-header">Course Fee List</h2>

					<table id="session_list" class="table table-striped">
						<thead>
							<tr>
								<th>Course Name</th>
								<th>Fee Name</th>
								
								<th>Active</th>

								<th>Raise Invoice</th>
								

							</tr>
						</thead>
						<tbody>
<?php
    
    $result = mysql_query("SELECT a.row_id, a.name course_name, b.name fee_name, b.active_flg, b.row_id fee_id 
FROM pg_course a left outer join pg_fee_master b on a.row_id = b.course_id");
    $count = 1;
    while ($row = mysql_fetch_array($result)) {
        
        ?>
                <tr>
								<td><?php echo $row['course_name']; ?></td>
								<td><?php echo $row['fee_name']; ?></td>
								
								<td><?php if($row['active_flg']) echo "Y"; else echo "N"; ?></td>
								<td><a href="./inc/raise_student_invoice.php">Raise Invoice</a></td>
								
								
								
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
    echo "You are not authorized to perform any operation. Close the browser and signin again";
}
include_once './inc/footer.php';?>
<script src ="js/courselink.js"></script>
</body>
</html>

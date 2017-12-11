<?php include_once "./inc/datacon.php";
include_once "./inc/header.php"; 

if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id'])){
	if($_SESSION['user_type'] == "PRINCIPAL" || $_SESSION['user_type'] == "PROFESSOR" ) {
?>

    <?php include './inc/dashboard_topnav.php'; ?>

    <div class="container-fluid">
      <div class="row">
        <?php include './inc/master_sidenav.php'; ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Scheme Management</h1>

          <div class="row">
          <div class="col-md-12">
        		<h2 class="sub-header">Scheme Master</h2>
				<a class="btn btn-warning" href="add_scheme.php" role="button">Add Scheme+</a>
        		<table id="visit_lisr" class="table table-striped">
		              <thead>
							<tr>
								<th>Scheme Name</th>
								<th>Scheme Amount</th>
								<th>Start Date</th>
								<th>End Date</th>
								<th>Active</th>
								
								<th>Criteria</th>
								
							</tr>
						</thead>
						<tbody>
<?php

$sql = "SELECT * from pg_scheme";
$res = mysql_query($sql);
$count = 0;
while ($row = mysql_fetch_array($res)) {
    $count = $count + 1;
    ?>
    
							<tr>
								<td><?php echo $row['name']; ?></td>
								<td><?php echo $row['amount']; ?></td>
								<td><?php echo date("d / m / Y", strtotime($row['start_dt'])); ?></td>
								<td><?php echo date("d / m / Y", strtotime($row['end_dt'])); ?></td>
								<td><?php if ( $row['active_flg']) echo "Y"; else echo "N"; ?></td>
								<td><?php echo $row['criteria']; ?></td>
							</tr>

	<?php
}
	?>					
						
		              </tbody>
            	</table>
        		</div>
          </div>
          
            
          
        </div>
      </div>
    </div>

   <?php } else {
		echo "You are not authorized to perform any operation on this page.";
	}} else { echo "You are not authorized to perform any operation. Close the browser and signin again"; }
   include_once './inc/footer.php';?>
  </body>
</html>

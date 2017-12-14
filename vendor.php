<?php include_once "./inc/datacon.php";
include_once "./inc/header.php"; 
$_REQUEST['page'] = '10';
if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id'])){
?>

    <?php include './inc/dashboard_topnav.php'; ?>

    <div class="container-fluid">
      <div class="row">
         <?php if ($_SESSION['user_type'] == "ACCOUNTS") { include './inc/accounts_sidenav.php'; }else{ include './inc/student_sidenav.php'; }?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Vendor Management</h1>
          <a class="btn btn-warning" href="add_vendor.php" role="button">Add Vendor</a>
          <div class="row">
          <div class="col-md-12">
        		<h2 class="sub-header">Vendor List</h2>
        		
        		<table id="student_list" class="table table-striped">
		              <thead>
							<tr>
								<th>Vendor Id</th>
								<th>Staff/Vendor</th>	
								<th>Vendor Name</th>
								<th>Mobile</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Registration Number</th>
								<th>Address</th>
								<th>Pincode</th>
								<th>Active</th>
								
								
							</tr>
						</thead>
						<tbody>
<?php
    
    $result = mysql_query("SELECT * FROM pg_vendor a");
    $count = 1;
    while ($row = mysql_fetch_array($result)) {
        
        ?>
							<tr>
								<td><?php echo "<a href=vendor_details.php?vendor_id=". $row['row_id'].">"."Edit"."</a>"; ?></td>
								<td><?php echo $row['vendor_type']; ?></td>
								<td><?php echo $row['name']; ?></td>
								<td><?php echo $row['mobile']; ?></td>
								<td><?php echo $row['email']; ?></td>
								<td><?php echo $row['ph']; ?></td>
								<td><?php echo $row['registration_number']; ?></td>
								<td><?php echo $row['address']; ?></td>
								<td><?php echo $row['pincode']; ?></td>
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

   <?php } else { echo "You are not authorized to perform any operation. Close the browser and signin again"; }
   include_once './inc/footer.php';?>
   
  </body>
</html>

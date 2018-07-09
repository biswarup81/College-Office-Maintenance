<?php include_once "./inc/datacon.php";
include_once "./inc/header.php";
$_REQUEST['page'] = '10';
if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id'])){
    if($_SESSION['user_type'] == "PRINCIPAL") {
    ?>
  <div class="container">
    <?php include './inc/dashboard_topnav.php'; ?>

    <div class="container-fluid">
      <div class="row">
       
          <h1 class="page-header">Faculty Management.</h1>
          <a class="btn btn-warning" href="add_faculty.php" role="button">Add Faculty</a>
          <div class="row">
          <div class="col-md-12">
        		<h2 class="sub-header">Faculty List</h2>
        		
        		<table id="student_list" class="table table-striped">
		              <thead>
							<tr>
								<th>Staff Id</th>
								<th>Title</th>	
								<th>First Name</th>
								<th>Middle Name</th>
								<th>Last Name</th>
								<th>Designation</th>
								<th>Mobile</th>
								<th>Qualilification</th>
								<th>Job Role</th>
								
								
							</tr>
						</thead>
						<tbody>
<?php
    
    $result = mysql_query("SELECT `row_id`, `title`, `fst_name`, `middle_name`, `last_name`, `dob`, `staff_id`, `email`, `mobile`, `job_role`, 
                `created`, `created_by`, `last_upd_dt`, `last_upd_by`, `desig`, `qualification` FROM `pg_staff` WHERE 1");
    $count = 1;
    while ($row = mysql_fetch_array($result)) {
        
        ?>
							<tr>
								<td><?php echo "<a href=faculty_details.php?faculty_id=". $row['row_id'].">".$row['row_id']."</a>"; ?></td>
								<td><?php echo $row['title']; ?></td>
								<td><?php echo $row['fst_name']; ?></td>
								<td><?php echo $row['middle_name']; ?></td>
								<td><?php echo $row['last_name']; ?></td>
								<td><?php echo $row['desig']; ?></td>
								<td><?php echo $row['mobile']; ?></td>
								<td><?php echo $row['qualification']; ?></td>
								<td><?php echo $row['job_role']; ?></td>
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
   <?php } else { echo "You are not authorized to perform any operation. Close the browser and signin again";}
} else { echo "Session is expired. Close the browser and signin again"; }
   include_once './inc/footer.php';?>
   
  </body>
</html>

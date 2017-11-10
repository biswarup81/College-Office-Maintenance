<?php include_once "./inc/datacon.php";
include_once "./inc/header.php"; 

if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id'])){
?>

    <?php include './inc/dashboard_topnav.php'; ?>

    <div class="container-fluid">
      <div class="row">
        <?php include './inc/student_sidenav.php'; ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Student Management</h1>
          <a class="btn btn-warning" href="add_student.php" role="button">Add Student</a>
          <div class="row">
          <div class="col-md-12">
        		<h2 class="sub-header">Student List</h2>
        		
        		<table id="student_list" class="table table-striped">
		              <thead>
							<tr>
								<th>Student Id</th>
								<th>Title</th>	
								<th>First Name</th>
								<th>Middle Name</th>
								<th>Last Name</th>
								<th>Date Of Birth</th>
								<th>Category</th>
								<th>Old Student Id</th>
								<th>Active</th>
								
								
							</tr>
						</thead>
						<tbody>
<?php
    
    $result = mysql_query("SELECT a.row_id, a.title, a.fst_name, a.middle_name, a.last_name, a.dob, a.category, a.old_student_id, a.active_flg 
FROM pg_student a");
    $count = 1;
    while ($row = mysql_fetch_array($result)) {
        
        ?>
							<tr>
								<td><?php echo "<a href=student_details.php?student_id=". $row['row_id'].">".$row['row_id']."</a>"; ?></td>
								<td><?php echo $row['title']; ?></td>
								<td><?php echo $row['fst_name']; ?></td>
								<td><?php echo $row['middle_name']; ?></td>
								<td><?php echo $row['last_name']; ?></td>
								<td><?php echo date("d / m / Y", strtotime($row['dob'])); ?></td>
								<td><?php echo $row['category']; ?></td>
								<td><?php echo $row['old_student_id']; ?></td>
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

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
          <h1 class="page-header">Student Scheme Applicaion Management</h1>
          
          <div class="row">
          <div class="col-md-12">
        		<h2 class="sub-header">Scheme Application List</h2>
        		
        		<table id="student_scheme_list" class="table table-striped">
		              <thead>
							<tr>
								<th>Student Id</th>
								<th>Student Name</th>
								
								<th>Category</th>
								<th>Scheme Name</th>
								<th>Amount</th>
								<th>Date Of Applicaion</th>
								<th>Criteria</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
<?php
    
    $result = mysql_query("SELECT a.row_id, a.fst_name, a.last_name, c.name scheme, c.criteria, b.amount, b.created
, a.last_name, a.dob, a.category, b.status
FROM pg_schm_application b left join pg_student a on b.student_id = a.row_id  left join pg_scheme c on b.scheme_id = c.row_id");
    $count = 1;
    while ($row = mysql_fetch_array($result)) {
        
        ?>
							<tr>
								<td><?php echo "<a href=student_details.php?student_id=". $row['row_id'].">".$row['row_id']."</a>"; ?></td>
								<td><?php echo $row['fst_name'].$row['last_name']; ?></td>
								<td><?php echo $row['category']; ?></td>
								<td><?php echo $row['scheme']; ?></td>
								<td><?php echo $row['amount']; ?></td>
								<td><?php echo date("d / m / Y", strtotime($row['created'])); ?></td>
								<td><?php echo $row['criteria']; ?></td>
								<td><?php echo $row['status']; ?></td>
								
								
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

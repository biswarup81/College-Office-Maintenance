<?php include_once "./inc/datacon.php";
include_once "./inc/header.php";

if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id']) && isset($_GET['student_id'])){
    ?>

    <?php include './inc/dashboard_topnav.php'; ?>

    <div class="container-fluid">
      <div class="row">       			
<?php include './inc/student_sidenav.php'; ?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<?php 
$student_id = $_GET['student_id'];
?>
		 <h1 class="page-header">Apply for Scheme - Student Id : <?php echo $student_id; ?></h1>
        			<h2 class="sub-header">Presently Active Schemes</h2>
        		
        		<form action="scheme_apply.php" method="post">
        		
        		<input type="hidden" name="student_id" id="student_id" value=<?php echo $student_id; ?> />
        		
        		
        		<table id="scheme_list" class="table table-striped">
		              <thead>
							<tr>
								<th></th>
								<th>Scheme</th>
								<th>Criteria</th>
								<th>Amount</th>
								<th>Start Date</th>
								<th>End Date</th>
								
								
							</tr>
						</thead>
						<tbody>
<?php

$sql1 = "SELECT * from pg_scheme where active_flg=1";
$result = mysql_query($sql1);
    $count = 1;
    while ($row = mysql_fetch_array($result)) {
        
        ?>
							<tr>
							<td><input type="checkbox" name="formDoor[]" value=<?php echo $row['row_id']; ?>></td>
								<td><?php echo $row['name']; ?></td>
								<td><?php echo $row['criteria']; ?></td>
								<td><?php echo $row['amount']; ?></td>
								<td><?php echo date("d / m / Y", strtotime($row['start_dt'])); ?></td>
								<td><?php echo date("d / m / Y", strtotime($row['end_dt'])); ?></td>
								
							</tr>
    <?php
        $count = $count + 1;
                
    }
    
    ?>
		              </tbody>
            	</table>
            	<input type="submit" name="applyscheme" id="applyscheme" value="Apply For Scheme" />
            	</form>
  
 </div>
      </div>
    </div>

   <?php } else { echo "You are not authorized to perform any operation. Close the browser and signin again"; }
   include_once './inc/footer.php';?>
   <script src ="js/applyscheme.js"></script>
   
  </body>
</html>

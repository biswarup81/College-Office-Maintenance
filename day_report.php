<?php include_once "./inc/datacon.php";
include_once "./inc/header.php"; 

if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id'])){
	if($_SESSION['user_type'] == "PRINCIPAL" || $_SESSION['user_type'] == "PROFESSOR" ) {
?>

    <?php include './inc/dashboard_topnav.php'; ?>

    <div class="container-fluid">
      <div class="row">
        <?php include './inc/dashboard_sidenav.php'; ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Day Report</h1>

          

          
          <div class="row">
        		<div class="col-md-6">
        		<h2 class="sub-header">Day Wise Visit report</h2>
        		<p>Place you content</p>
        		</div>
        		<div class="col-md-6">
        		<h2 class="sub-header">Month Wise Visit report</h2>
        		<table id="visit_list" class="table table-bordered">
		              <thead>
							<tr>
								<th>Total Visit</th>
								
								<th>Month</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Total Visit</th>
								
								<th>Month</th>
							</tr>
						</tfoot>
		              </tbody>
            	</table>
        		</div>
          </div>
          <div class="row">
          <div class="col-md-12">
        		<h2 class="sub-header">Student List</h2>
        		
        		<table id="visit_lisr" class="table table-striped">
		              <thead>
							<tr>
								<th>Visit ID</th>
								
								<th>Patient ID</th>
								<th>Visited</th>
								<th>First Name</th>
								
								<th>Last Name</th>
								<th>Mobile</th>
								
								<th>Visit date</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>Visit ID</th>
								
								<th>Patient ID</th>
								<th>Visited</th>
								<th>First Name</th>
								
								<th>Last Name</th>
								<th>Mobile</th>
								
								<th>Visit date</th>
							</tr>
						</tfoot>
		              </tbody>
            	</table>
            	
            	<a class="btn btn-warning" href="create_student.php" role="button">Create Student</a>
        		</div>
          </div>
          
            
          
        </div>
      </div>
    </div>

   <?php }else {
   	echo "You are not authorized to perform any operation on this page. ";
   }} else { echo "You are not authorized to perform any operation. Close the browser and signin again"; }
   include_once './inc/footer.php';?>
  </body>
</html>

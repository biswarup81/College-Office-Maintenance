<?php include_once "./inc/datacon.php";
include_once "./inc/header.php"; 

if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id'])){
?>

    <?php include './inc/dashboard_topnav.php'; ?>

    <div class="container-fluid">
      <div class="row">
        <?php include './inc/dashboard_sidenav.php'; ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Session Management</h1>

          <div class="row">
          <div class="col-md-12">
        		<h2 class="sub-header">Session Master</h2>
        		
        		<table id="visit_lisr" class="table table-striped">
		              <thead>
							<tr>
								<th>Session Name</th>
								
								<th>Start Date</th>
								<th>End Date</th>
								<th>Active</th>
								
								<th>Course Linked</th>
								<th></th>
								
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>2017-18</th>
								
								<th>01-Jun-17</th>
								<th>31-Mar-18</th>
								<th>Y</th>
								
								<th>Linked</th>
								<th>Link Course</th>
								

							</tr>
						</tfoot>
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

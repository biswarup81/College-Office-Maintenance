<?php include_once "./inc/datacon.php";
include_once "./inc/header.php"; 

if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id'])){
?>

    <?php include './inc/dashboard_topnav.php'; ?>

    <div class="container-fluid">
      <div class="row">
        <?php include './inc/dashboard_sidenav.php'; ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Fee Setup</h1>

          <div class="row">
          <div class="col-md-12">
        		<h2 class="sub-header">Student Fee Setup</h2>
        		
        		<table id="course_list" class="table table-striped">
		              <thead>
							<tr>
								<th>Course Name</th>
								
								<th>Year</th>
								<th>Fee Name</th>
								<th>Session Name</th>
								<th>Active</th>
								
								
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>B.A. Hons - English</th>
								
								<th>1st Year</th>
								<th>Session Fee</th>
								<th>2017-18</th>
								<th>Y</th>
							</tr>
							<tr>
								<th>B.A. Hons - English</th>
								
								<th>1st Year</th>
								<th>1st Semester Exam Fee</th>
								<th>2017-18</th>
								<th>Y</th>
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

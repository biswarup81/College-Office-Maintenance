<?php include_once "./inc/datacon.php";
include_once "./inc/header.php"; 

if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id'])){
?>

    <?php include './inc/dashboard_topnav.php'; ?>

    <div class="container-fluid">
      <div class="row">
        <?php include './inc/dashboard_sidenav.php'; ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Student Management</h1>

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
						<tfoot>
							<tr>
								<th>10000001</th>
								<th>Mr.</th>	
								<th>Mridul</th>	
								<th>Chandra</th>
								<th>Bera</th>
								<th>17-Sep-89</th>
								<th>SC</th>
								<th>KRKK-EH-1011</th>
								<th>Y</th>
							</tr>
							<tr>
								<th>10000002</th>
								<th>Ms.</th>	
								<th>Kusum</th>	
								<th>Kumari</th>
								<th>Mondal</th>
								<th>17-Sep-90</th>
								<th>General</th>
								<th>KRKK-EH-1012</th>
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

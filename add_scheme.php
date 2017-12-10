<?php include_once "./inc/datacon.php";
include_once "./inc/header.php"; 
//Added MP
if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id'])){
?>

    <?php include './inc/dashboard_topnav.php'; ?>

    <div class="container-fluid">
      <div class="row">
        <?php include './inc/master_sidenav.php'; ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Add Scheme</h1>

          <div class="row">
          <div class="col-md-12">
<form id="create_scheme_form" class="form-horizontal" >
<input type="hidden" name="role" id="role" value="STUDENT"  >
			<div class="alert alert-danger" role="alert" id="search_alert_2" hidden="true">
			
			</div>
		
			

			<div class="form-group">
			<label for="fname" class="col-sm-2 control-label">Scheme Name</label>
			<div class="col-sm-6">
			<input type="text" class="form-control" name="fname" id="fname" placeholder="Enter Scheme Name">
			</div>
			</div>
			
			<div class="form-group">
			<label for="sAmt" class="col-sm-2 control-label">Scheme Amount</label>
			<div class="col-sm-6">
			<input type="number" class="form-control" name="sAmt" id="sAmt" placeholder="Enter Scheme Amount">
			</div>
			</div>
			
			<div class="form-group">
			<label for="theStartDate" class="col-sm-2 control-label">Start Date</label>
			<div class="col-sm-2">
			<input type="text" class="form-control" name="theStartDate" id="theStartDate" placeholder="Enter Scheme Start Date">
			</div>
			</div>
			
			
			<div class="form-group">
			<label for="theEndDate" class="col-sm-2 control-label">End Date</label>
			<div class="col-sm-2">
			<input type="text" class="form-control" name="theEndDate" id="theEndDate" placeholder="Enter Scheme End Date">
			</div>
			</div>
			
			
			<div class="form-group">
			<label for="theCriteria" class="col-sm-2 control-label">Scheme Criteria</label>
			<div class="col-sm-6">
			<input type="text" class="form-control" name="theCriteria" id="theCriteria" placeholder="Enter Scheme Criteria">
			</div>
			</div>
			
			
			<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			<input type="button" id="add_by_scheme" class="btn btn-default"  value="ADD SCHEME" name="ADD" >
			</div>
			</div>
			</form>
			<!--END of form-->
			<div class="alert alert-info" role="alert" id="create_u_result" hidden="true">
			
			</div>
			</div>
          </div>
          
            
          
        </div>
      </div>
    </div>

   <?php } else { echo "You are not authorized to perform any operation. Close the browser and signin again"; }
   include_once './inc/footer.php';?>
   	<script src ="js/scheme.js"></script>
   	
   	
  </body>
</html>


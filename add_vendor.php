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
          <h1 class="page-header">Add Vendor</h1>

          <div class="row">
          <div class="col-md-12">
<form id="create_vendor_form" class="form-horizontal" >
<input type="hidden" name="role" id="role" value="VENDOR"  >
			<div class="alert alert-danger" role="alert" id="search_alert_2" hidden="true">
			
			</div>
			
		
		
			
			<div class="form-group">
			<label for="fname" class="col-sm-2 control-label">Vendor Name</label>
			<div class="col-sm-6">
			<input type="text" class="form-control" name="fname" id="fname" placeholder="Enter Vendor Name">
			</div>
			</div>
			
			<div class="form-group">
			<label for="mobile" class="col-sm-2 control-label">Mobile Number</label>
			<div class="col-sm-6">
			<input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile Number">
			</div>
			</div>
			
			
			<div class="form-group">
			<label for="email" class="col-sm-2 control-label">Email Address</label>
			<div class="col-sm-6">
			<input type="text" class="form-control" name="email" id="email" placeholder="Enter email address">
			</div>
			</div>

			<div class="form-group">
			<label for="ph" class="col-sm-2 control-label">Phone Number</label>
			<div class="col-sm-6">
			<input type="text" class="form-control" name="ph" id="ph" placeholder="Enter Phone Number">
			</div>
			</div>

			
			<div class="form-group">
			<label for="regno" class="col-sm-2 control-label">Registration Number</label>
			<div class="col-sm-6">
			<input type="text" class="form-control" name="regno" id="regno" placeholder="Enter Regitration No">
			</div>
			</div>
			
			<div class="form-group">
			<label for="address" class="col-sm-2 control-label">Address</label>
			<div class="col-sm-6">
			<input type="text" class="form-control" name="address" id="address" placeholder="Enter Address Details">
			</div>
			</div>
			
			<div class="form-group">
			<label for="pincode" class="col-sm-2 control-label">Pincode</label>
			<div class="col-sm-6">
			<input type="text" class="form-control" name="pincode" id="pincode" placeholder="Enter Pincode">
			</div>
			</div>
			
						
			<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			<input type="button" id="add_by_vendor" class="btn btn-default"  value="Add Vendor" name="ADD" >
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
   <script src ="js/vendor.js"></script>
  </body>
</html>
			
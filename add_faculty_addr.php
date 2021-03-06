<?php include_once "./inc/datacon.php";
include_once "./inc/header.php"; 
 if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id']) && isset($_GET['faculty_id'])){
?>
<div class="container">
    <?php include './inc/dashboard_topnav.php'; ?>

    <div class="container-fluid">
      <div class="row">

<?php $faculty_id = $_GET['faculty_id']; ?>
        
          <h1 class="page-header">Add Faculty Address for <?php echo $faculty_id; ?></h1>

          <div class="row">
          <div class="col-md-12">
<form id="create_faculty_addr_form" class="form-horizontal" >
<input type="hidden" name="faculty_id" id="faculty_id" value=<?php echo $faculty_id; ?>  >
			<div class="alert alert-danger" role="alert" id="search_alert_2" hidden="true">
			
			</div>
			
			<div class="form-group">
			<label class="col-sm-2 control-label">Address Type</label>
			<div class="col-sm-2">
			<select class="form-control" name="addr_type" id="addr_type">
			<option value="0">--SELECT--</option>
			<option value="PERMANENT">Permanent</option>
			<option value="PRESENT">Present</option>
			</select>
			</div>
			</div>
		
			
			<div class="form-group">
			<label for="addr" class="col-sm-2 control-label">Address Line 1</label>
			<div class="col-sm-6">
			<input type="text" class="form-control" name="addr" id="addr" placeholder="Enter House No, Flat No, Village etc">
			</div>
			</div>
			
			<div class="form-group">
			<label for="addr2" class="col-sm-2 control-label">Address Line 2</label>
			<div class="col-sm-6">
			<input type="text" class="form-control" name="addr2" id="addr2" placeholder="Enter Block, District etc">
			</div>
			</div>
			
			<div class="form-group">
			<label for="addr3" class="col-sm-2 control-label">Address Line 3</label>
			<div class="col-sm-6">
			<input type="text" class="form-control" name="addr3" id="addr3" placeholder="Enter City">
			</div>
			</div>
			
			
			<div class="form-group">
			<label for="state" class="col-sm-2 control-label">State</label>
			<div class="col-sm-6">
			<input type="text" class="form-control" name="state" id="state" placeholder="Enter State">
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
			<input type="button" id="add_by_faculty_addr" class="btn btn-default"  value="ADD" name="ADD" >
			<a class="btn btn-default" href="<?php echo "faculty_details.php?faculty_id=".$faculty_id;?>">Back</a>
            	
			
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
   <script src ="js/faculty.js"></script>
  </body>
</html>
			
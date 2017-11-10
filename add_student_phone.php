<?php include_once "./inc/datacon.php";
include_once "./inc/header.php"; 

if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id']) && isset($_GET['student_id'])){
?>

    <?php include './inc/dashboard_topnav.php'; ?>

    <div class="container-fluid">
      <div class="row">
        <?php include './inc/student_sidenav.php'; ?>
<?php $student_id = $_GET['student_id']; ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Add Student Phone for <?php echo $student_id; ?></h1>

          <div class="row">
          <div class="col-md-12">
<form id="create_student_ph_form" class="form-horizontal" >
<input type="hidden" name="student_id" id="student_id" value=<?php echo $student_id; ?>  >
			<div class="alert alert-danger" role="alert" id="phone_alert_2" hidden="true">
			
			</div>
			
				
			<div class="form-group">
			<label for="std_code" class="col-sm-2 control-label">STD Code</label>
			<div class="col-sm-6">
			<input type="text" class="form-control" name="std_code" id="std_code" placeholder="Enter STD Code">
			</div>
			</div>
					
			<div class="form-group">
			<label for="ph_num" class="col-sm-2 control-label">Phone Number</label>
			<div class="col-sm-6">
			<input type="text" class="form-control" name="ph_num" id="ph_num" placeholder="Enter Phone No">
			</div>
			</div>	
			
			<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			<input type="button" id="add_by_student_ph" class="btn btn-default"  value="ADD" name="ADD" >
			</div>
			</div>
			</form>
			<!--END of form-->
			<div class="alert alert-info" role="alert" id="create_phone_result" hidden="true">
			
			</div>
			</div>
          </div>
          
            
          
        </div>
      </div>
    </div>

   <?php } else { echo "You are not authorized to perform any operation. Close the browser and signin again"; }
   include_once './inc/footer.php';?>
   <script src ="js/student_addr.js"></script>
  </body>
</html>
			
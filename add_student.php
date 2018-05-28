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
          <h1 class="page-header">Add Student</h1>

          <div class="row">
          <div class="col-md-12">
<form id="create_student_form" class="form-horizontal" >
<input type="hidden" name="role" id="role" value="STUDENT"  >
			<div class="alert alert-danger" role="alert" id="search_alert_u" hidden="true">
			
			</div>
			
			<div class="form-group">
			<label class="col-sm-2 control-label">Title</label>
			<div class="col-sm-2">
			<select class="form-control" name="title" id="title">
			<option value="0">--SELECT--</option>
			<option value="MR.">Mr.</option>
			<option value="MS.">Ms.</option>
			<option value="MRS.">Mrs.</option>
			<option value="KR.">Kr.</option>
			</select>
			</div>
			</div>
		
			
			<div class="form-group">
			<label for="fname" class="col-sm-2 control-label">First Name</label>
			<div class="col-sm-6">
			<input type="text" name="fname" id="fname" class="text-uppercase" placeholder="Enter First Name">
			</div>
			</div>
			
			<div class="form-group">
			<label for="mname" class="col-sm-2 control-label">Middle Name</label>
			<div class="col-sm-6">
			<input type="text" class="form-control" name="mname" id="mname" placeholder="Enter First Name">
			</div>
			</div>
			
			
			<div class="form-group">
			<label for="lname" class="col-sm-2 control-label">Last Name</label>
			<div class="col-sm-6">
			<input type="text" class="form-control" name="lname" id="lname" placeholder="Enter Last Name">
			</div>
			</div>

			<div class="form-group">
			<label class="col-sm-2 control-label">Gender</label>
			<div class="col-sm-2">
			<select class="form-control" name="gender" id="gender">
			<option value="0">--SELECT--</option>
			<option value="Female">Female</option>
			<option value="Male">Male</option>
			<option value="Trans">Transgender</option>
			</select>
			</div>
			</div>

			
			<div class="form-group">
			<label for="theDOB" class="col-sm-2 control-label">Date of Birth</label>
			<div class="col-sm-2">
			<input type="text" class="form-control" name="theDOB" id="theDOB" placeholder="Enter Date of Birth">
			</div>
			</div>
			
			<div class="form-group">
			<label class="col-sm-2 control-label">Category</label>
			<div class="col-sm-2">
			<select class="form-control" name="category" id="category">
			<option value="0">--SELECT--</option>
			<option value="GENERAL">General</option>
			<option value="SC">SC</option>
			<option value="ST">ST</option>
			<option value="OBC-A">OBC-A</option>
			<option value="OBC-B">OBC-B</option>
			</select>
			</div>
			</div>
			
			<div class="form-group">
			<label class="col-sm-2 control-label">Physically Challenged</label>
			<div class="col-sm-2">
			<select class="form-control" name="phc" id="phc">
			<option value="0">--SELECT--</option>
			<option value="1">Yes</option>
			<option value="0">No</option>
			</select>
			</div>
			</div>
			
			<div class="form-group">
			<label for="aadhaar_no" class="col-sm-2 control-label">Aadhaar</label>
			<div class="col-sm-6">
			<input type="text" class="form-control" name="aadhaar_no" id="aadhaar_no" placeholder="Enter Aadhaar No">
			</div>
			</div>
			
			
			<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			<input type="button" id="add_by_student" class="btn btn-default"  value="ADD" name="ADD" >
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
   <script src ="js/student.js"></script>
  </body>
</html>
			
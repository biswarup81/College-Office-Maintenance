<?php include_once "./inc/datacon.php";
include_once "./inc/header.php"; ?>



    <div class="container-fluid">
      <div class="row">
        
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Register</h1>

          <div class="row">
          <div class="col-md-12">
<form id="create_user_form" class="form-horizontal" >
<input type="hidden" name="role" id="role" value="STUDENT"  >
			<div class="alert alert-danger" role="alert" id="search_alert_2" hidden="true">
			
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
			<label for="fname" class="col-sm-2 control-label">First Name</label>
			<div class="col-sm-6">
			<input type="text" onkeyup="this.value = this.value.toUpperCase();" class="form-control" name="fname" id="fname" placeholder="Enter First Name" required>
			</div>
			</div>
			<div class="form-group">
			<label for="lname" class="col-sm-2 control-label">Last Name</label>
			<div class="col-sm-6">
			<input type="text" onkeyup="this.value = this.value.toUpperCase();" class="form-control" name="lname" id="lname" placeholder="Enter Last Name" required>
			</div>
			</div>
			<div class="form-group">
			<label class="col-sm-2 control-label">Category</label>
			<div class="col-sm-2">
			<select class="form-control" name="category" id="category">
			<option value="0">--SELECT--</option>
			<option value="Gen">General</option>
			<option value="SC">SC</option>
			<option value="ST">ST</option>
			</select>
			</div>
			</div>
			<div class="form-group">
			<label for="uid" class="col-sm-2 control-label">College Roll</label>
			<div class="col-sm-4">
			<input type="text" class="form-control" name="uid" id="uid" placeholder="Enter userid" required>
			</div>
			</div>
			<div class="form-group">
			<label for="password" class="col-sm-2 control-label">Password</label>
			<div class="col-sm-3">
			<input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
			</div>
			</div>
			<div class="form-group">
			<label for="theDate" class="col-sm-2 control-label">Date of Birth</label>
			<div class="col-sm-2">
			<input type="text" class="form-control" name="theDate" id="theDate" placeholder="Enter Date of Birth">
			</div>
			</div>
			<div class="form-group">
			<label for="cellnum" class="col-sm-2 control-label">Aadhaar number</label>
			<div class="col-sm-6">
			<input type="text" class="form-control" name="aadhaar_no" id="aadhaar_no" placeholder="Enter Aadhaar number">
			</div>
			</div>
			<div class="form-group">
			<label for="cellnum" class="col-sm-2 control-label">Mobile number</label>
			<div class="col-sm-6">
			<input type="tel" class="form-control" name="mobile_no" id="mobile_no" placeholder="Enter Mobile number">
			</div>
			</div>
			
			
			
			<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			<input type="button" id="register_user" class="btn btn-primary"  value="ADD" name="ADD" >			<a class="btn btn-default" href="index.php" role="button">Go Back</a>
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

   <?php  include_once './inc/footer.php';?>
  </body>
</html>
			
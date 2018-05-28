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
			<label for="uid" class="col-sm-2 control-label">College Roll</label>
			<div class="col-sm-4">
			<input type="text" class="form-control" name="uid" id="uid" placeholder="Enter College Roll Number" required>
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
			<p>
			<input type="button" id="send_password" class="btn btn-default"  value="Send Password" name="Send" >
			<a href="./index.php" class="btn btn-info">Go to Login</a>
			</p>
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
			
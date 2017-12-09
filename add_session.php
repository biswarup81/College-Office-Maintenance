<?php include_once "./inc/datacon.php";
include_once "./inc/header.php"; 
//Change - Biswa
if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id'])){
?>

    <?php include './inc/dashboard_topnav.php'; ?>

    <div class="container-fluid">
      <div class="row">
        <?php include './inc/master_sidenav.php'; ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Add Session</h1>

          <div class="row">
          <div class="col-md-12">
<form id="create_session_form" class="form-horizontal" >
<input type="hidden" name="role" id="role" value="STUDENT"  >
			<div class="alert alert-danger" role="alert" id="search_alert_u" hidden="true">
			
			</div>
			<div class="form-group">
			<label class="col-sm-2 control-label">Previous Session</label>
			<div class="col-sm-2">
			<select class="form-control" name="gender" id="gender">
			<option value="0">--SELECT--</option>
			<?php
			$result = mysql_query("SELECT a.row_id, a.name FROM pg_session a left outer join pg_session b on a.row_id = b.par_row_id where b.name is null order by a.start_dt desc");
			$count = 1;
			while ($row = mysql_fetch_array($result)) {
			?>
			<option value=<?php echo $row['row_id']; ?>><?php echo $row['name']; ?></option>
			<?php
			$count = $count + 1;
			}
			?>
			</select>
			</div>
			</div>
			

			<div class="form-group">
			<label for="fname" class="col-sm-2 control-label">Session Name</label>
			<div class="col-sm-6">
			<input type="text" class="form-control" name="fname" id="fname" placeholder="Enter Session Name">
			</div>
			</div>
			
			
			<div class="form-group">
			<label for="theStartDate" class="col-sm-2 control-label">Start Date</label>
			<div class="col-sm-2">
			<input type="text" class="form-control" name="theStartDate" id="theStartDate" placeholder="Enter Session Start Date">
			</div>
			</div>
			
			<div class="form-group">
			<label for="theEndDate" class="col-sm-2 control-label">End Date</label>
			<div class="col-sm-2">
			<input type="text" class="form-control" name="theEndDate" id="theEndDate" placeholder="Enter Session End Date">
			</div>
			</div>
			
			
			<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			<input type="button" id="add_by_session" class="btn btn-default"  value="ADD" name="ADD" >
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
   	<script src ="js/customr.js"></script>
   	
   	
  </body>
</html>


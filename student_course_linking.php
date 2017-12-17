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
          <h1 class="page-header">Link Course for Student <?php echo $student_id; ?></h1>

          <div class="row">
          <div class="col-md-12">
<form id="link_student_course_form" class="form-horizontal" >
<input type="hidden" name="student_id" id="student_id" value=<?php echo $student_id; ?>  >

			<div class="alert alert-danger" role="alert" id="search_alert_2" hidden="true">
			</div>
			
			<div class="form-group">
			<label class="col-sm-2 control-label">Session</label>
			<div class="col-sm-2">
			<select class="form-control" name="esession" id="esession">
			<option value="">--SELECT--</option>
			<?php
			$result = mysql_query("SELECT a.row_id, a.name FROM pg_session a where active_flg = 1 order by a.start_dt desc");
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
			<label class="col-sm-2 control-label">Course</label>
			<div class="col-sm-4">
			<select class="form-control" name="course" id="course">
			<option value="">--SELECT--</option>
			<?php
			$result = mysql_query("SELECT a.row_id, a.name FROM pg_course a order by a.name asc");
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
	<?php
	$result = mysql_query("SELECT * FROM pg_session_course_student a where student_id = '$student_id' and active_flg = 1");
	$rec_count = mysql_num_rows($result);
			?>
			
			<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			<?php 
			if ($rec_count>0)
			    echo "<input type='button' disabled='disabled' id='link_student_course' class='btn btn-default' value='Course Already Linked' name='Link' >";
			else
			    
			    echo "<input type='button' id='link_student_course' class='btn btn-default' value='Link Course' name='Link' >";
			?> 
			
			</div>
			</div>
			</form>
			<!--END of form-->
			<div class="alert alert-info" role="alert" id="link_course_result" hidden="true">
			
			</div>
			</div>
          </div>
          
            
          
        </div>
      </div>
    </div>

   <?php } else { echo "You are not authorized to perform any operation. Close the browser and signin again"; }
   include_once './inc/footer.php';?>
   <script src ="js/student_course.js"></script>
  </body>
</html>
			
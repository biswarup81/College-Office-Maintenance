<?php
include_once "./inc/datacon.php";
include_once "./inc/header.php";
$_REQUEST['page'] = '4';
if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id'])) {
    ?>

    <?php include './inc/dashboard_topnav.php'; ?>

<div class="container-fluid">
	<div class="row">
        <?php include './inc/accounts_sidenav.php'; ?>
		</div>
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<h1 class="page-header">Search Student</h1>

		<div class="row">
			<div class="col-md-12">
				<form id="search_student_form" class="form-horizontal">
					
					<div class="alert alert-danger" role="alert" id="search_alert_2"></div>

					<div class="form-group">
						<label for="student_id" class="col-sm-2 control-label">Student Id</label>
						<div class="col-sm-2">
							<input type="number" class="form-control" name="student_id"
								id="student_id" placeholder="Enter Student Id">
						</div>
					</div>
					
						<div class="form-group">
						<label for="fst_name" class="col-sm-2 control-label">First Name</label>
						<div class="col-sm-2">
							<input type="text" class="form-control" name="fst_name"
								id="fst_name" placeholder="Enter First Name">
						</div>
					</div>
					
					<div class="form-group">
						<label for="last_name" class="col-sm-2 control-label">Last Name</label>
						<div class="col-sm-2">
							<input type="text" onblur="this.value=this.value.toUpperCase()" class="form-control" name="last_name"
								id="last_name" placeholder="Enter Last Name">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type="button" id="search_student_det" class="btn btn-default"
								value="Search Student" name="search_student_det">
						</div>
					</div>
				</form>
				<!--END of form-->
				<div class="alert alert-info" role="alert" id="create_u_result"></div>
			</div>
		</div>



	</div>

</div>
<?php
} else {
    echo "You are not authorized to perform any operation. Close the browser and signin again";
}
include_once './inc/footer.php';
?>
<script src="js/search_student.js"></script>
</body>
</html>

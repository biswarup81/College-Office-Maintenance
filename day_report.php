<?php
include_once "./inc/datacon.php";
include_once "./inc/header.php";
$_REQUEST['page'] = '52';
if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id'])) {
    ?>

    <?php include './inc/dashboard_topnav.php'; ?>

<div class="container-fluid">
	<div class="row">
        <?php include './inc/reports_sidenav.php'; ?>
		</div>
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<h1 class="page-header">Day Report</h1>

		<div class="row">
			<div class="col-md-12">
				<form id="search_student_form" class="form-horizontal">
					
					<div class="alert alert-danger" role="alert" id="search_alert_2"></div>

        			<div class="form-group">
        			<label for="report_dt" class="col-sm-2 control-label">Date:</label>
        			<div class="col-sm-2">
        			<input type="text" class="form-control" name="report_dt" id="report_dt" placeholder="Enter Date">
        			</div>
        			</div>
        			
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input type="button" id="show_report" class="btn btn-default"
								value="SUBMIT" name="show_report">
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
<script src="js/reportt.js"></script>
</body>
</html>

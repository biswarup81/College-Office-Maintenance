<?php
include_once "./inc/datacon.php";
include_once "./inc/header.php";


if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id']) && isset($_REQUEST['pp_id'])) {
    include './inc/dashboard_topnav.php';
    $page_id = $_REQUEST['pp_id'];
    ?>


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
						<div class="col-sm-offset-2 col-sm-10">
							<input type="button" id="search_student" class="btn btn-default"
								value="Search Student" name="search_student">
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
<script type="text/javascript">
$(document).ready(function(){
	//alert("loading");
	//alert("./inc/master-sidenav.php?page_id=<?php echo $page_id?>");
	$("#side_nav").addClass("col-sm-3 col-md-2 sidebar");
	$("#side_nav").load("./inc/master_sidenav.php?pp_id=<?php echo $page_id?>");
});
</script>
</body>
</html>

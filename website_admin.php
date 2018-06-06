<?php include_once "./inc/datacon.php";
include_once "./inc/header.php";


if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id'])){
    if($_SESSION['logged_in_user_id']=19) {
?>
<?php include './inc/dashboard_topnav.php'; ?>
<div class="row">


           
<div class="alert alert-danger" role="alert" id="search_alert_u" hidden="true">
			
</div>
<div class="form-group">
			<label class="col-sm-2 control-label" >Select Page</label>
			<div class="col-sm-2">
			<select class="form-control" name="page_id" id="page_id">
			<option value="0">--SELECT--</option>
			<option value="1">About Us</option>
			</select>
			</div>
</div>
<div class="form-group">
			<label for="fname" class="col-sm-2 control-label">Enter Content Here</label>
			<div class="col-sm-6">
			
			<textarea name="content" id="content" rows="10" cols="80"></textarea>
			</div>
			</div>
<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			<input type="button" id="web_admin_add" class="btn btn-default"  value="Add/Update" name="ADD" >
			
			</div>
			</div>
<div class="alert alert-info" role="alert" id="create_u_result" hidden="true">
			
			</div>
</div>
 <?php }
}?>

<?php  include_once './inc/footer.php';?>
<script src ="js/website_admin.js"></script>
  </body>
</html>
<?php include_once "./inc/datacon.php";
include_once "./inc/header.php";

if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id'])){
    if($_SESSION['logged_in_user_id']=19) {
    	if(isset($_REQUEST['action'])){
    		$action=$_REQUEST['action'];
    		if($action=='login'){
    			$page_id = $_POST['page_id'];
    			$content = htmlentities(mysql_real_escape_string($_POST['content']));
    			
    			
    			$sql1 = "insert into pg_web_content(page_id, content) values ('".$page_id."','".$content."')";
    			//echo $sql1;
    			
    			mysql_query($sql1) or die(mysql_error());
    			$message = "Page is inserted !!";
    		}
    	}
?>
<?php include './inc/dashboard_topnav.php'; ?>
<div class="container-fluid">
<div class="row">
<?php include './inc/dashboard_sidenav.php'; ?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Content Administrator Page</h1>
<FORM action="<?php echo $_SERVER['PHP_SELF']; ?>?action=login" method="post">
<div class="alert alert-danger" role="alert" id="search_alert_u" hidden="true">
			
</div>
<div class="row">

<?php 
			$sql_menu = "SELECT `row_id`, `par_row_id`, `has_sub_menu`, `name`, `disp_name`, `menu_type`, `url`, `order`, `active_flg`, `created`, 
				`created_by`, `last_upd_by`, `last_upd_dt` FROM `pg_navigation_menu` WHERE 1 ";
			$result = mysql_query($sql_menu) or die(mysql_error());			
			?>
			<label class="col-sm-2 control-label" >Select Page</label>
			<div class="col-sm-2">
			<select class="form-control" name="page_id" id="page_id">
			<option value="0">--SELECT--</option>
			<?php if(mysql_num_rows($result)){
				
				while($row=mysql_fetch_array($result)){
			?>
			<option value='<?php echo $row['row_id']?>'><?php echo htmlspecialchars($row['disp_name'])?></option>
			<?php }}?>
				
			</select>
			</div>

</div>
<div class="row">
			<label for="fname" class="col-sm-2 control-label">Enter Content Here</label>
			<div class="col-sm-6">
			
			<textarea name="content" id="content" rows="10" cols="80"></textarea>
			 <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'content' );
            </script>
			</div>
</div>
<div class="row">
			<div class="col-sm-offset-2 col-sm-10">
			<input type="submit" id="web_admin_add1" class="btn btn-default"  value="Add/Update" name="ADD" >
			
			</div>
</div>
<div class="row">
<div class="alert alert-info" role="alert" id="create_u_result" hidden="true">
			<?php echo $message;?>
			</div>
</div>
</FORM>
</div>
</div>
</div>

 <?php }
}?>

<?php  include_once './inc/footer.php';?>
<script src ="js/website_admin.js"></script>
  </body>
</html>
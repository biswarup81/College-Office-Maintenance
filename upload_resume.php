<?php include_once "./inc/datacon.php";
include_once "./inc/header.php";
$message = "";
$content = "";
$display_name = "";
if(isset($_REQUEST['message'])){
    $message = $_REQUEST['message'];
}
if(isset($_REQUEST['content'])){
    $content = $_REQUEST['content'];
}

if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id'])){
    if($_SESSION['logged_in_user_id']==19 || $_SESSION['user_type'] == "PRINCIPAL") {
        if(isset($_REQUEST['action'])){
            $action=$_REQUEST['action'];
            if($action=='update'){
                $staff_id = $_POST['staff_id'];
                $content = htmlentities(mysql_real_escape_string($_POST['content']));
                
                
                $sql1 = "insert into pg_staff_resume(par_row_id, content) values ('".$staff_id."','".$content."')";
                //echo $sql1;
                
                mysql_query($sql1) or die(mysql_error());
                $message = "Page is Updated !!";
                $_REQUEST['message'] = $message;
                $query = "SELECT `row_id`, `par_row_id`, `content` FROM `pg_staff_resume` where par_row_id ='".$staff_id. "'" ;
                $result = mysql_query($query) or die(mysql_error());
                $content = "Content Not set..";
                while($row = mysql_fetch_array($result)){
                    $content = $row['content'];
                }
                $_REQUEST['content'] = $content;
            }
        }
        if(isset($_REQUEST['staff_id'])){
            $staff_id = $_REQUEST['staff_id'];
            
            $query_1 = "SELECT `row_id`, `title`, `fst_name`, `middle_name`, `last_name`, `dob`, `staff_id`, `email`, `mobile`, `job_role`, 
                        `created`, `created_by`, `last_upd_dt`, `last_upd_by`, `desig`, `qualification` FROM `pg_staff` where row_id ='".$staff_id. "'";
            $result1 = mysql_query($query_1) or die(mysql_error());
            $content = "Content Not set..";
            while($row1 = mysql_fetch_array($result1)){
                $display_name = $row1['title']. ' ' . $row1['fst_name']. ' '.$row1['middle_name']. ' '.$row1['last_name']. ' ';
                
            }
            
            $query = "SELECT `row_id`, `par_row_id`, `content` FROM `pg_staff_resume` where par_row_id ='".$staff_id. "'" ;
            //echo $query;
            $result = mysql_query($query) or die(mysql_error());
            $content = "Content Not set..";
            while($row = mysql_fetch_array($result)){
                $content = $row['content'];
                
            }
            $_REQUEST['content'] = $content;
        }
        ?>
<?php include './inc/dashboard_topnav.php'; ?>
<div class="container-fluid">
<div class="row">
<?php include './inc/dashboard_sidenav.php'; ?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Upload Resume</h1>
<FORM id="wp_admin_form" action="<?php echo $_SERVER['PHP_SELF']; ?>?action=update" method="post">
<div class="alert alert-danger" role="alert" id="search_alert_u" hidden="true">
		
</div>
<div class="row">
<div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Select The Page for Edit <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <?php 
              $sql_menu = "SELECT `row_id`, `title`, `fst_name`, `middle_name`, `last_name`, `dob`, `staff_id`, `email`, `mobile`, `job_role`, 
                        `created`, `created_by`, `last_upd_dt`, `last_upd_by`, `desig`, `qualification` FROM `pg_staff` WHERE 1";
              $result = mysql_query($sql_menu) or die(mysql_error());		
              if(mysql_num_rows($result)){
				
				while($row=mysql_fetch_array($result)){
			?>
			<li><a href="./upload_resume.php?staff_id=<?php echo $row['row_id']?>"><?php echo $row['title']. ' '. $row['fst_name'].' '.$row['middle_name'].' '.$row['last_name']  ?></a></li>
			
			<?php }}?>
                
               
              </ul>
            </li>
          </ul>
          
        </div><!--/.nav-collapse -->
</div>

<div class="row">

			<label class="col-sm-2 control-label" >Faculty - </label>
			<div class="col-sm-2">
			<?php echo $display_name; ?>
			
			<input type="hidden" name="staff_id" id="staff_id" value="<?php echo $staff_id?>">
			</div>

</div>
<div class="row">
			<label for="fname" class="col-sm-2 control-label">Enter Content Here</label>
			<div class="col-sm-6">
			
			<textarea name="content" id="content" rows="10" cols="80"><?php echo $content;?></textarea>
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
<div class="alert alert-info" role="alert" id="create_u_result">
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
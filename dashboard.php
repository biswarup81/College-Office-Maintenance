<?php include_once "./inc/datacon.php";
include_once "./inc/header.php"; 

if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id'])){
	if($_SESSION['user_type'] == "PRINCIPAL" || $_SESSION['user_type'] == "PROFESSOR" ) {
?>

    <?php include './inc/dashboard_topnav.php'; ?>

    <div class="container-fluid">
      <div class="row">
        <?php include './inc/dashboard_sidenav.php'; ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">My Dashboard</h1>

        <div class="row">
        <div class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Addmission information</h3>
            </div>
            <div class="panel-body">
			   		Place content !!
            </div>
          </div>
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Student Information</h3>
            </div>
            <div class="panel-body">
              	Place Content
            </div>
          </div>
          <div class="panel panel-warning">
            <div class="panel-heading">
              <h3 class="panel-title">Tenders</h3>
            </div>
            <div class="panel-body">
              	Place Content
            </div>
          </div>
        </div><!-- /.col-sm-4 -->
        
        <div class="col-sm-4">
          <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title">Faculty Information</h3>
            </div>
            <div class="panel-body">
            here !!
            </div>
          </div>
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Courses</h3>
            </div>
            <div class="panel-body">
              Panel content
            </div>
          </div>
          <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title">News and Events</h3>
            </div>
            <div class="panel-body">
              	Place Content
            </div>
          </div>
        </div><!-- /.col-sm-4 -->
        <div class="col-sm-4">
          <div class="panel panel-warning">
            <div class="panel-heading">
              <h3 class="panel-title">Different Schemes</h3>
            </div>
            <div class="panel-body">
              Panel content
            </div>
          </div>
          <div class="panel panel-danger">
            <div class="panel-heading">
              <h3 class="panel-title">Payment information</h3>
            </div>
            <div class="panel-body">
              Panel content
            </div>
          </div>
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Student Affair</h3>
            </div>
            <div class="panel-body">
              	Place Content
            </div>
          </div>
        </div><!-- /.col-sm-4 -->
        
        
        
      </div>  

         
          
        </div>
      </div>
    </div>

   <?php }else {
   	echo "You are not authorized to perform any operation on this page. ";
   }} else { echo "You are not authorized to perform any operation. Close the browser and signin again"; }
   include_once './inc/footer.php';?>
  </body>
</html>

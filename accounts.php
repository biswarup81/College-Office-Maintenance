<?php
//CHange

include_once "./inc/datacon.php";
include_once "./inc/header.php";

if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id']) && isset($_REQUEST['pp_id'])) {
    include './inc/dashboard_topnav.php';  
    $page_id = $_REQUEST['pp_id'];
    ?>

<div class="container-fluid">
	<div class="row">
        <div class="col-sm-3 col-md-2 sidebar" id="side_nav">
        
  		</div>
        <div
			class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h1 class="page-header">Master Management</h1>
			<ul>
				<li><a href="raise_invoice.php">Raise Invoice</a></li>
				<li><a href="receive_payment.php">Receive Payment</a></li>
				<li><a href="reports.php">Accounts Report..</a></li>
				
			</ul>
		</div>
	</div>
</div>

<?php

} else {
    echo "You are not authorized to perform any operation. Close the browser and signin again";
}
include_once './inc/footer.php';

?>
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

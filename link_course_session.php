<?php

include_once "./inc/datacon.php";
include_once "./inc/header.php";

if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id'])) {
	if($_SESSION['user_type'] == "PRINCIPAL" || $_SESSION['user_type'] == "PROFESSOR" ) {
    ?>

    <?php include './inc/dashboard_topnav.php'; ?>

<div class="container-fluid">
	<div class="row">
        <?php include './inc/master_sidenav.php'; ?>
        <div
			class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h1 class="page-header">Session Course Linking:</h1>
			<a>
			 <?php
			 $SID = 6;
			 $sql1 = "CALL SP_LINK_COURSE('$SID', @CNT)";
			 mysql_query($sql1) or die(mysql_error());
			 ?>
			 </a>
		</div>
	</div>
</div>

<?php

	}else {
		echo "You are not authorized to perform any operation on this page. ";
	} } else {
    echo "You are not authorized to perform any operation. Close the browser and signin again";
}
include_once './inc/footer.php';?>
<script src ="js/courselink.js"></script>
</body>
</html>

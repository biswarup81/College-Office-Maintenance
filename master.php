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
			<h1 class="page-header">Master Management</h1>
			<ul>
				<li><a href="course.php">Course Master</a></li>
				<li><a href="scheme.php">Scheme Master</a></li>
				<li><a href="session.php">Session Master</a></li>
				<li><a href="fee.php">Student Fee Setup</a></li>
			</ul>
		</div>
	</div>
</div>

<?php
	} else {
		echo "You are not authorized to perform any operation on this page.";
	}
} else {
    echo "You are not authorized to perform any operation. Close the browser and signin again";
}
include_once './inc/footer.php';
?>
</body>
</html>

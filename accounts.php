<?php
//CHange

include_once "./inc/datacon.php";
include_once "./inc/header.php";
$_REQUEST['page'] = '1';
if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id'])) {
    ?>

    <?php include './inc/dashboard_topnav.php'; ?>

<div class="container-fluid">
	<div class="row">
        <?php include './inc/accounts_sidenav.php'; ?>
        <div
			class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h1 class="page-header">Master Management</h1>
			<ul>
				<li><a href="raise_invoice.php">Raise Invoice</a></li>
				<li><a href="receive_payment.php">Receive Payment</a></li>
				<li><a href="reports.php">Accounts Report</a></li>
				
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
</body>
</html>

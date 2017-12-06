<?php

include_once "./inc/datacon.php";
include_once "./inc/header.php";
$_REQUEST['page'] = '6';
if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id'])) {
    ?>

    <?php include './inc/dashboard_topnav.php'; ?>

<div class="container-fluid">
	<div class="row">
        <?php include './inc/accounts_sidenav.php'; ?>
        <div
			class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h1 class="page-header">Money Receipt List</h1>

			<div class="row">
				<div class="col-md-12">
				   <table id="session_list" class="table table-striped">
						<thead>
							<tr>
								<th>Student Id</th>
								<th>Invoice Number</th>
								<th>Fee Name</th>
								<th>Invoice Total</th>
								<th>Discount Total</th>
								<th>Due Date</th>
								<th>Payment Status</th>
							</tr>
						</thead>
						<tbody>
<?php
$sql = "SELECT a.row_id student_id, b.row_id invoice_id, b.name invoice_name, sum(c.amount) total_amount, sum(c.discount) Total_discount, min(due_dt) min_due_dt
FROM pg_student a inner join pg_student_invoice b on a.row_id = b.student_id inner join pg_student_invoice_item c on b.row_id = c.invoice_id
where b.paid_flg = 1
group by a.row_id , b.row_id , b.name";
$result = mysql_query($sql) or die(mysql_error());

    $count = 1;
    while ($row = mysql_fetch_array($result)) {
        
        ?>
                <tr>
								<td><?php echo $row['student_id']; ?></td>
								<td><?php echo $row['invoice_id']; ?></td>
								<td><?php echo $row['invoice_name']; ?></td>
								<td><?php echo $row['total_amount']; ?></td>
								<td><?php echo $row['Total_discount']; ?></td>
								<td><?php echo $row['min_due_dt']; ?></td>
								<td><a href=<?php echo "money_receipt_details.php?invoice_id=".$row['invoice_id']; ?>>Print Receipt</a><td>
							</tr>
    <?php
        $count = $count + 1;
    }
    
    ?>
              
		              </tbody>
					</table>
				</div>
			</div>



		</div>
	</div>
</div>

<?php

} else {
    echo "You are not authorized to perform any operation. Close the browser and signin again";
}
include_once './inc/footer.php';?>
<script src ="js/courselink.js"></script>
</body>
</html>

<?php 
$page = $_REQUEST['page'];

?>

<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
          
			
          	<?php if ($page == 1 ) {?>
			<li class="active"><a href="accounts.php">Overview</a></li>
			<?php } else {?>
			<li><a href="accounts.php">Overview</a></li>
			<?php }?>
			
            <?php if ($page == 9 ) {?>
			<li class="active"><a href="fee.php">Fee Setup</a></li>
			<?php } else {?>
			<li><a href="fee.php">Fee Setup</a></li>
			<?php }?>
			
			<?php if ($page == 10 ) {?>
			<li class="active"><a href="student.php">Student Management</a></li>
			<?php } else {?>
			<li><a href="student.php">Student Management</a></li>
			<?php }?>
			
            <?php if ($page == 2 ) {?>
			<li class="active"><a href="raise_invoice.php">Raise Invoice</a></li>
			<?php } else {?>
			<li><a href="raise_invoice.php">Raise Invoice</a></li>
			<?php }?>
			
			<?php if ($page == 3 ) {?>
			<li class="active"><a href="invoice_list.php">Invoice List</a></li>
			<?php } else {?>
			<li><a href="invoice_list.php">Invoice List</a></li>
			<?php }?>
			
			<?php if ($page == 4 ) {?>
			<li class="active"><a href="receive_payment_by_student.php">Invoice by Student</a></li>
			<?php } else {?>
			<li><a href="receive_payment_by_student.php">Invoice by Student</a></li>
			<?php }?>
			
			<?php if ($page == 5 ) {?>
				<li class="active"><a href="debit_voucher.php">Debit Voucher</a></li>
				<?php } else {?>
				<li><a href="debit_voucher.php">Debit Voucher</a></li>
				<?php }?>
			
			<?php if ($page == 6 ) {?>
			<li class="active"><a href="money_receipt.php">Money Receipt List</a></li>
			<?php } else {?>
			<li><a href="money_receipt.php">Money Receipt List</a></li>
			<?php }?>
			
			<?php if ($page == 7 ) {?>
			<li class="active"><a href="debit_voucher_list.php">Debit Voucher List</a></li>
			<?php } else {?>
			<li><a href="debit_voucher_list.php">Debit Voucher List</a></li>
			<?php }?>
			
			<?php if ($page == 8 ) {?>
			<li class="active"><a href="reports.php">Accounts Report</a></li>
			<?php } else {?>
			<li><a href="reports.php">Accounts Report</a></li>
			<?php }?>
			
			
            
            <!--  <li><a href="raise_invoice.php">Raise Invoice</a></li>
				<li><a href="invoice_list.php">Invoice List</a></li>
				<li><a href="receive_payment_by_student.php">Invoice by Student</a></li>
				<li><a href="money_receipt.php">Money Receipt</a></li>
				
				<li><a href="debit_voucher_list.php">Debit Voucher List</a></li>
				<li><a href="reports.php">Accounts Report</a></li> -->
          </ul>
         
          
</div>
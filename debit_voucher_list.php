<?php include_once "./inc/datacon.php";
include_once "./inc/header.php"; 

if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id']) && isset($_GET['invoice_id']) ){
	
	$_REQUEST['page'] = '7';
?>

    <?php include './inc/dashboard_topnav.php'; ?>

    <div class="container-fluid">
      <div class="row">       			
<?php include './inc/accounts_sidenav.php'; ?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<?php 
$invoice_id = $_GET['invoice_id'];
$sql = "SELECT a.row_id student_id, a.fst_name, a.last_name
from pg_student a left join pg_student_invoice b on a.row_id = b.student_id where b.row_id = " . $invoice_id;
$res = mysql_query($sql);
$count = 0;
while ($row = mysql_fetch_array($res)) {
    $count = $count + 1;
    $student_id = $row['student_id'];
    $fst_name = $row['fst_name'];
    $last_name = $row['last_name'];
    
}

?>
		 <h1 class="page-header"><?php echo "Receive Payment for ".$fst_name." ".$last_name; ?></h1>
        			<h2 class="sub-header"><?php echo "Item List - for invoice ".$invoice_id; ?></h2>
        		
        		<form action="checkbox-payment.php" method="post">
        		<input type="hidden" name="invoice_id" id="invoice_id" value=<?php echo $invoice_id; ?>  >
        		<input type="hidden" name="student_id" id="student_id" value=<?php echo $student_id; ?> />
        		<div class="row">
        		<div class="col-md-6">
        		<table id="student_list" class="table table-striped">
		              <thead>
							<tr>
								<!--  <th>Check</th>-->
								<th>Item Name</th>
								<!--<th>Amount</th>
								<th>Discount Category</th>
								<th>Discount</th> -->
								<th>Total</th>
								<!--<th>Due Date</th> -->
							</tr>
						</thead>
						<tbody>
<?php

$sql1 = "SELECT row_id, name, amount, discount_category, discount, (amount - discount) item_total, due_dt, paid_flg 
from pg_student_invoice_item where invoice_id = " . $invoice_id. " and paid_flg=1";
$result = mysql_query($sql1) or die(mysql_error());
    $count = 1;
    $student_list = "";
    while ($row = mysql_fetch_array($result)) {
        
        ?>
							<tr>
							<!-- <td> <input type="checkbox" checked="checked" name="formDoor[]" value=<?php echo $row['row_id']; ?>></td>-->
								<td><?php echo $row['name']; ?></td>
								<!--  <td><?php echo $row['amount']; ?></td>
								<td><?php echo $row['discount_category']; ?></td>
								<td><?php echo $row['discount']; ?></td> -->
								<td><?php echo $row['item_total']; ?></td>
								<!--  <td><?php echo date("d / m / Y", strtotime($row['due_dt'])); ?></td>-->
							
							</tr>
    <?php
        $count = $count + 1;
                
    }
    
    ?>
		              </tbody>
            	</table>
            	</div>
            	</div>
            	<div class="row" >    
            	  <p>
            	  	<a href="/college-office-software/money_receipt.php"  class="btn btn-lg btn-warning">Back</a>
			        <a href="/college-office-software/print/fees_p.php?invoice_id=<?php echo $invoice_id ?>" target="_blank" class="btn btn-lg btn-success" >Print</a>
			        
			        
			      </p>
			      </div>
            	
            	</form>
  
 </div>
      </div>
    </div>

   <?php } else { echo "You are not authorized to perform any operation. Close the browser and signin again"; }
   include_once './inc/footer.php';?>
   <script src ="js/yearend.js"></script>
   
  </body>
</html>

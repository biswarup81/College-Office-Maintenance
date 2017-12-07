<?php include_once "./inc/datacon.php";
include_once "./inc/header.php"; 
$_REQUEST['page'] = '7';
if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id']) ){
	
?>

    <?php include './inc/dashboard_topnav.php'; ?>

    <div class="container-fluid">
      <div class="row">       			
<?php include './inc/accounts_sidenav.php'; ?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

		 <h1 class="page-header">Debit Voucher List</h1>
        		
        		<div class="row">
        		<div class="col-md-6">
        		<table id="student_list" class="table table-striped">
		              <thead>
							<tr>
								<!--  <th>Check</th>-->
								<th>Name</th>
								<!--<th>Amount</th>
								<th>Discount Category</th>
								<th>Discount</th> -->
								<th>Total</th>
								<th>Paid On</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
<?php

$sql = "SELECT * from pg_vendor_payment";
$res = mysql_query($sql);
$count = 0;
while ($row = mysql_fetch_array($res)) {
	
	
	$vendor_id = $row['vendor_id'];
	
	$_QUERY_2 = "SELECT concat(fst_name,' ',last_name) as name FROM pg_staff where row_id='$vendor_id' UNION SELECT name from pg_vendor where row_id='$vendor_id'";
	$result2 = mysql_query($_QUERY_2) or die(mysql_error());
	$row2 = mysql_fetch_array($result2) or die(mysql_error());
	
	$name = $row2['name'];

        
        ?>
							<tr>
							<!-- <td> <input type="checkbox" checked="checked" name="formDoor[]" value=<?php echo $row['row_id']; ?>></td>-->
								<td><?php echo $name; ?></td>
								  <td><?php echo $row['amount']; ?></td>
								<!--<td><?php echo $row['discount_category']; ?></td>
								<td><?php echo $row['discount']; ?></td> 
								<td><?php echo $row['item_total']; ?></td> -->
								<td><?php echo date("d / m / Y", strtotime($row['created'])); ?></td>
								<td><a href="./print/debit_voucher_p.php?payment_id=<?php echo $row['row_id'];?>" target="_blank">Print</a></td>
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

   <?php } else { echo "You are not authorized to perform any operation. Close the browser and signin again"; }
   include_once './inc/footer.php';?>
   <script src ="js/yearend.js"></script>
   
  </body>
</html>

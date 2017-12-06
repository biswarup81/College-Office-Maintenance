<?php include_once "./inc/datacon.php";
include_once "./inc/header.php"; 
$_REQUEST['page'] = '5';
if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id']) ){
	
	
	
?>

    <?php include './inc/dashboard_topnav.php'; ?>

    <div class="container-fluid">
      <div class="row">
        <?php include './inc/accounts_sidenav.php'; ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Debit Voucher</h1>

          <div class="row">

				<div class="alert alert-danger" role="alert" id="search_alert_u" hidden="true">
				
				</div>
				
				
				
				<div class="form-group">
				<label for="fname" class="col-sm-2 control-label">Name</label>
				<div class="col-sm-6">
				<input type="text" class="form-control" name="fname" id="fname" placeholder="Enter Name">
				
				</div>
				<button type="button" class="btn btn-success" id="vedor_search">Search</button>
				</div>
			</div>
			
			<!--END of form-->
			<div class="row" id="vendor_result" hidden="true">
			<div class="col-sm-6">
				<table class="table">
					<thead>
						<tr>
						<th>Choose</th>
						<th>Name</th>
						<th>Vendor/Staff</th>
						</tr>
					</thead>
					<tbody>
						<tr>
						<td><input type="radio" onclick="getDetails('Biswarup');"></td>
						<td>Biswarup Ghoshal</td>
						<td>Staff</td>
						</tr>
					</tbody>
				</table>
			</div>
			</div>
			
			<div class="row">
			<form id="payment_form" class="form-horizontal" method="post">
			<div class="col-md-6" id="vendor_payment" hidden="true">
			
			<input type="hidden" id="hidden_vendor_id" name="hidden_vendor_id">
			
				<div class="form-group">
					<label class="col-sm-4 control-label">Select Payment Head</label>
					<div class="col-sm-2">
						<select class="form-control" name="head" id="head">
						<option value="0">--SELECT--</option>
						<option value="Sports">Sports</option>
						<option value="Stationery">Stationery</option>
						<option value="Books">Books</option>
						<option value="Lab Equipments">Lab Equipments</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="fname" class="col-sm-2 control-label">Description</label>
					<div class="col-sm-4">
					<input type="text" class="form-control" name="description" id="description" placeholder="Enter Description">
					</div>
				</div>
				
				<div class="form-group">
					<label for="amount" class="col-sm-2 control-label">Amount (Rs.)</label>
					<div class="col-sm-2">
					<input type="number" class="form-control" name="amount" id="amount" placeholder="Enter Amount (No decimal allowed)">
					</div>
				</div>
				<button type="button" class="btn btn-success" id="vedor_pay" name="PAYMENT">Pay</button>
				
				
				</div>
				</form>  
				</div>
				<div class="alert alert-info" role="alert" id="payment_u_result" hidden="true">
			
				</div>
			</div>
			</div>
			

          </div>
          
            

   <?php } else { echo "You are not authorized to perform any operation. Close the browser and signin again"; }
   include_once './inc/footer.php';?>
   <script src ="js/debit_voucher.js"></script>
  </body>
</html>
			
<?php include_once "../inc/datacon.php"; 
include '../classes/admin_class.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title></title>
<link rel="stylesheet" href="css/style.css" media="all">

</head>
<?php 
if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id']) && isset($_GET['payment_id']) ){
	$admin = new admin();
	$payment_id = $_GET['payment_id'];
	$_QUERY = "SELECT * FROM pg_vendor_payment where row_id = '$payment_id' ";
	
	$result = mysql_query($_QUERY) or die(mysql_error());
	//$count = 0;
	$student_list = "";
	$row = mysql_fetch_array($result);
	$payment_date = date("d / m / Y", strtotime($row['created']));
	
	?>
<body>
  <page size="A4">
  		<div class="leater-head text-center clrfix">
        			<h1 class="lrg-text text-center">KANDRA RADHA KANTA KUNDU MAHAVIDYALAYA</h1>	
                    <h3 class="medi-text text-center">KANDRA * BURDWAN</h3>
                    <h4 class="smll-text bgg-add text-center">DEBIT VOUCHER</h4>
        </div>
        <div class="leater-head-sub text-left clrfix">
        		
                		<div class="col-xs-6 text-col pull-left"><span>No</span><input type="text" value="<?php echo $row['row_id']; ?>"></div>
                        <div class="col-xs-6 text-col pull-right text-right"><span>Date</span><input type="text" value="<?php echo $payment_date; ?>"></div>
                        <div class="col-xs-12 text-col-full pull-left"><span>A/c</span><textarea class="notes" rows="2"><?php echo $row['payment_type'];?></textarea></div>
                
        </div>
        
        <div class="bill-main-body clrfix">
        
        	<div class="col-xs-12 pull-left">
            		<div class="bill-top-panel col-xs-12 pull-left">
                        <div class="col-xs-7 pull-left bill-body-left">
                                <div class="bill-top-panel-left col-xs-12 pull-left">Particulars</div>
                        </div>
                        <div class="col-xs-5 pull-right">
                                <div class="bill-top-panel-right col-xs-12 pull-right">
                                        <div class="bill-top-panel-right-top col-xs-12 pull-left text-center">Amount</div>
                                        <div class="bill-top-panel-right-bottom col-xs-12 pull-left">
                                                <div class="bill-top-panel-right-bottom-col col-xs-7 pull-left">Rs</div>
                                                <div class="bill-top-panel-right-bottom-col col-xs-5 pull-right">P</div>
                                        </div>
                                </div>
                        </div>
                    </div>
                    <?php 
                    	//$count = $count + 1;
						
						
						$f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
						$total_in_words = strtoupper($f->format($row['amount']));  
						$vendor_id = $row['vendor_id'];
						
						$_QUERY_2 = "SELECT concat(fst_name,' ',last_name) as name FROM pg_staff where row_id='$vendor_id' UNION SELECT name from pg_vendor where row_id='$vendor_id'";
						$result2 = mysql_query($_QUERY_2) or die(mysql_error());
						$row2 = mysql_fetch_array($result2)
						
						?>
						
                    <div class="bill-main-wrapp col-xs-12 pull-left">
                    	<div class="col-xs-7 bill-main-text-col pull-left"><textarea><?php echo $row['purpose']; ?></textarea></div>
                        <div class="col-xs-3 bill-main-text-col pull-left"><textarea><?php echo $row['amount']; ?></textarea></div>
                        <div class="col-xs-2 bill-main-text-col pull-right"><textarea>00</textarea></div>		
                    </div>
                  
                    
            </div>
        
        </div>
        
        <div class="bill-footer col-xs-12 clrfix">
        		<div class="bill-footer-text">Recevied from kandra R.K.K. Mahavidyalaya the sum of</div>
                <div class="bill-footer-text-rupees">Rupees<input type="text" value="<?php echo $total_in_words; ?>"></div>
                <div class="bill-footer-text-signature">(<?php echo $row2['name'];?>)</div>
                <div class="bill-footer-text-rupees">Pay Rs<input type="text" value="<?php echo $total_in_words; ?>"></div>
                <div class="bill-footer-text-principal-teac pull-left text-left">
                <strong>Principal/Teacher-in-charge</strong>

				Kandra R.K.K.Mahavidyalaya
                </div>
                <div class="bill-footer-text-principal-teac pull-right text-center">
               <strong>Accountant/Cashier</strong>
Kandra R.K.K.Mahavidyalaya
                </div>
        </div>
  </page>
<?php } else { echo "You are not authorized to perform any operation. Close the browser and signin again"; } ?>
</body>
</html>

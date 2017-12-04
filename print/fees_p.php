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
if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id']) && isset($_GET['invoice_id'])){
	$admin = new admin();
	$invoice_id = $_GET['invoice_id'];
	$sql = "SELECT a.row_id student_id, a.fst_name, a.last_name, b.created 
	from pg_student a left join pg_student_invoice b on a.row_id = b.student_id where b.row_id = " . $invoice_id;
	$res = mysql_query($sql);
	$count = 0;
	while ($row = mysql_fetch_array($res)) {
		$count = $count + 1;
		$student_id = $row['student_id'];
		$fst_name = $row['fst_name'];
		$last_name = $row['last_name'];
		$payment_date = date("d / m / Y", strtotime($row['created']));
	}
?>
<body>
  <page size="A4">
  		<div class="bill-3-main-wrapper clrfix pull-left col-xs-12">
        <div class="bill-3-main-wrapper-inner clrfix pull-left col-xs-12">
        		<div class="bill-3-main-leater-head pull-left col-xs-12">
                		<div class="print-logo-box pull-left"><img src="images/logo-print-2.png" width="100" height="121"></div>
                        <div class="head-right pull-right">
                        		<div class="hear-right-row-1 col-xs-12 pull-left">
                                		<div class="ph-no pull-left"><img src="images/ph-icon.png" width="22">Ph. - (03453)-273372</div>
                                        <div class="billno pull-right">No.- <input class="text-line" type="text"></div>
                                </div>
                                <h1 class="text-center">KANDRA RADHA KANTA KUNDU<br>MAHAVIDYALAYA</h1>
                                <h2 class="text-center">KANDRA * BURDWAN</h2>
                        </div>
                </div>
                <div class="bill-3-main-leater-name-sec pull-left col-xs-12">
                		<div class="name-row name-tetet stuad-roe-text pull-left col-xs-12 line-brae">
                        		To the credit of (Name of the student) <input type="text" class="text-line" value="<?php echo $fst_name . " ".$last_name ;?>">
                        </div>
                        
                        <div class="name-row stuad-roe-text pull-left col-xs-12">
                        		<div class="col-xs-4 pull-left">Class<input type="text" class="text-line"></div>
                                <div class="col-xs-4 pull-left">Year <input type="text" class="text-line"></div>
                                <div class="col-xs-4 pull-left rollno">Roll No <input type="text" class="text-line" value="<?php echo $student_id; ?>"></div>
                        </div>
                </div>
                
                <div class="bill-3-main-body-wrapper clrfix pull-left col-xs-12">
                	<div class="bill-3-main-body-wrapper-top pull-left col-xs-12">
                    		<div class="col-xs-7 bill-3col-box pull-left">Received the following fees as per detailed below</div>
                            <div class="col-xs-3 bill-3col-box pull-left">Rs</div>
                            <div class="col-xs-2 bill-3col-box pull-left">P.</div>
                    </div>
                    
                    <div class="bill-3-main-body-wrapper-medile pull-left col-xs-12">
                   			
                   			<?php

								$sql1 = "SELECT row_id, name, amount, discount_category, discount, (amount - discount) item_total, due_dt, paid_flg 
								from pg_student_invoice_item where invoice_id = " . $invoice_id. " and paid_flg=1";
								$result = mysql_query($sql1) or die(mysql_error());
								    $count = 1;
								    $student_list = "";
								    $total = 0;
								    while ($row = mysql_fetch_array($result)) {
								    	$total += $row['item_total'];
        					?>
                   			<div class="medil-row pull-left col-xs-12">
                    		<div class="col-xs-7 bill-3col-box pull-left">
                            <div class="texttboxx"><?php echo $row['name']; ?>-------------------------------------------------------------</div>
                            </div>
                            <div class="col-xs-3 bill-3col-box pull-left">
                            <input type="text" value="<?php echo $row['item_total']; ?>">
                            </div>
                            <div class="col-xs-2 bill-3col-box pull-left">
                             <input type="text" value="00">
                            </div>
                            </div>
                            <?php }?>
                        
                            
                    </div>
                    <div class="bill-3-main-body-wrapper-bott pull-left col-xs-12">
                    <div class="col-xs-7 bill-3col-box pull-left"><div class="gre-total">Total Rs</div></div>
                            <div class="col-xs-3 bill-3col-box pull-left"><input type="text" value="<?php echo $total; ?>"></div>
                            <div class="col-xs-2 bill-3col-box pull-left"></div>
                    
                    </div>
                    
                </div>
                
                <div class="bill-3-main-footer col-xs-12 pull-left">
                <?php 
                $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
                $total_in_words = strtoupper($f->format($total));  ?>
                		<div class="bill-3footer-text col-xs-12 pull-left recev-rs">Received(in word) Rupees <input type="text" class="text-line" value="<?php echo $total_in_words. " ONLY"; ?> "></div>
                        <div class="bill-3footer-text col-xs-4 pull-left recev-date">Date <input type="text" class="text-line" value="<?php echo $payment_date?>"></div>
                        <div class="bill-3footer-text col-xs-a pull-right recev-clerk">Receiving clerk</div>
                </div>
        </div>
        </div>
  </page>
<?php } else { echo "You are not authorized to perform any operation. Close the browser and signin again"; } ?>
</body>
</html>

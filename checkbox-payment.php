<?php include_once "./inc/datacon.php";
include_once "./inc/header.php";

if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id']) && isset($_POST['invoice_id'])){
    ?>

    <?php include './inc/dashboard_topnav.php'; ?>
    <?php $invoice_id = $_POST['invoice_id'];
    $student_id = $_POST['student_id']; ?>

    <div class="container-fluid">
      <div class="row">       			
<?php include './inc/accounts_sidenav.php'; ?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<h1 class="page-header">Receive Payment for invoice - <?php echo $invoice_id; ?></h1>

<?php
if(isset($_POST['formDoor']))
    $aDoor = $_POST['formDoor'];
else 
    $aDoor = "";
    if(isset($_POST['makepayment']))
        $pay = true;

   if(empty($aDoor))
    {
        echo("<div>You didn't select any item.</div>");
    }
else
    {
        $N = count($aDoor);
        $total=0;
        $total_disc=0;
        $net=0;
        $item_list="";
        //echo("You $as_id selected $next_course_name and $N door(s): ");
        for($i=0; $i < $N; $i++)
            {
                    $sql = "SELECT row_id, name, amount, discount_category, discount, (amount - discount) item_total, due_dt, paid_flg from pg_student_invoice_item where row_id = " . $aDoor[$i];
                    $result = mysql_query($sql) or die(mysql_error());
                    while ($row = mysql_fetch_array($result)) {
                        $total = $total + $row['amount'];
                        $total_disc = $total_disc + $row['discount'];
                        $net = $net + $row['item_total'];
                        if ($i==0)
                            $item_list = $row['row_id'];
                        else
                            $item_list = $item_list . "," . $row['row_id'];
                    }
        }
        
        ?>
        <form id="create_payment_form" class="form-horizontal" >
        <input type="hidden" id="totalpayable" value=<?php echo $net; ?>  >
        <input type="hidden" name="invoice_id" id="invoice_id" value=<?php echo $invoice_id; ?>  >
        <input type="hidden" name="item_list" id="item_list" value=<?php echo $item_list; ?>  >
        <input type="hidden" name="student_id" id="student_id" value=<?php echo $student_id; ?>  >
        	
        	<div class="alert alert-danger" role="alert" id="search_alert_2"></div>
       		
       		<div class="form-group">
			<label for="payablamt" class="col-sm-2 control-label">Payable Amount</label>
			<div class="col-sm-2">
			<input type=number readonly="readonly" class="form-control" name="payablamt" id="payablamt" value=<?php echo $net; ?>>
			</div>
			</div>
			
			<div class="form-group">
			<label for="payamt" class="col-sm-2 control-label">Payment Amount</label>
			<div class="col-sm-2">
			<input type=number class="form-control" name="payamt" id="payamt" placeholder="Payment Amount">
			</div>
			</div>
			
			
			
			<div class="form-group">
			<label for="thePayDate" class="col-sm-2 control-label">Payment Date</label>
			<div class="col-sm-2">
			<input type="text" class="form-control" name="thePayDate" id="thePayDate" placeholder="Payment Date">
			</div>
			</div>
			
			
			<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			<input type="button" id="add_by_payment" class="btn btn-default"  value="Receive Payment" name="add_by_payment" >
			</div>
			</div>
       </form>
       <div class="alert alert-info" role="alert" id="create_u_result"></div>
   <?php
}

?>

 </div>
      </div>
    </div>

   <?php } else { echo "You are not authorized to perform any operation. Close the browser and signin again"; }
   include_once './inc/footer.php';?>
   <script src ="./js/receivepayment.js"></script>
   
  </body>
</html>

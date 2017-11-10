<?php include_once "../inc/datacon.php";
include_once "../inc/header.php"; 

if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id']) && isset($_POST['invoice_id'])){
?>

    <?php include '../inc/dashboard_topnav.php'; ?>

    <div class="container-fluid">
      <div class="row">       			
<?php include '../inc/accounts_sidenav.php'; ?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

<?php
if(isset($_POST['formDoor']))
    $aDoor = $_POST['formDoor'];
else 
    $aDoor = "";
    if(isset($_POST['makepayment']))
        $pay = true;

    if(isset($_POST['invoice_id']))
{
    $invoice_id = $_POST['invoice_id'];
    echo "<div>Invoice - ".$invoice_id."</div>";
}
   if(empty($aDoor))
    {
        echo("You didn't select any item.");
    }
else
    {
        $N = count($aDoor);
        $total=0;
        $total_disc=0;
        $net=0;
        //echo("You $as_id selected $next_course_name and $N door(s): ");
        for($i=0; $i < $N; $i++)
            {
                    echo "Item for payment: ".$aDoor[$i]." ";
                    $sql = "SELECT row_id, name, amount, discount_category, discount, (amount - discount) item_total, due_dt, paid_flg from pg_student_invoice_item where row_id = " . $aDoor[$i];
                    $result = mysql_query($sql);
                    while ($row = mysql_fetch_array($result)) {
                        $total = $total + $row['amount'];
                        $total_disc = $total_disc + $row['discount'];
                        $net = $net + $row['item_total'];
                    }
        }
        echo "<div>Total Amount: ".$total."</div>";
        echo "<div>Total Discount: ".$total_disc."</div>";
        echo "<div>Total Payable: ".$net."</div>";
       echo "<div class='form-group'><label for='payamt' class='col-sm-2 control-label'>Amount</label>
<div class='col-sm-2'><input type='number' class='form-control' name='payamt' id='payamt' placeholder='PayableAmount'>
</div></div>";
}
?>

 </div>
      </div>
    </div>

   <?php } else { echo "You are not authorized to perform any operation. Close the browser and signin again"; }
   include_once '../inc/footer.php';?>
   <script src ="../js/receivepayment.js"></script>
   
  </body>
</html>

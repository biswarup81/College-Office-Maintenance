<?php

include_once "./datacon.php";
include_once "./header.php";

if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id'])) {
    ?>

    



<?php
    if (isset($_SESSION['sid']))
        $session_id = ($_SESSION['sid']);
    else
        echo "There are no active session to raise invoice";
    echo "<div><a href='../raise_invoice.php'>Go Back</a></div>";
    $fee_id = 1;
    
    $sql1 = "SELECT a.row_id session_course_id, b.student_id, c.name fee_name, c.row_id, c.active_flg, d.category student_category, d.ph_challenged
FROM pg_session_course a inner join pg_session_course_student b on a.row_id = b.session_course_id
inner join pg_fee_master c on a.course_id = c.course_id inner join pg_student d on b.student_id = d.row_id where a.session_id = " . $session_id . " and c.row_id = " . $fee_id;
    
    $result = mysql_query($sql1);
    
    $count = 1;
    while ($row = mysql_fetch_array($result)) {
        $session_course_id = $row['session_course_id'];
        $student_id = $row['student_id'];
        $fee_name = $row['fee_name'];
        $catg = $row['student_category'];
        $ph_c = $row['ph_challenged'];
        $ins_inv = "insert into pg_student_invoice(session_course_id, student_id,  name, fee_id)
 values(" . $session_course_id . "," . $student_id . " , '" . $fee_name . "' , " . $fee_id . ")";
        // echo $ins_inv;
        $chk_ins = mysql_query($ins_inv);
        if ($chk_ins) {
            $inv_id = mysql_insert_id();
            echo "<br>" . $inv_id . "</br>";
            
            $sql2 = "select a.row_id item_id, a.name item_name, a.amount, a.due_by, a.due_by_unit
from pg_fee_item a where a.par_row_id = " . $fee_id . " and a.active_flg = 1 order by a.row_id asc";
            
            // echo "<br>" . $sql2 . "</br>";
            
            echo "<h1>" . $student_id . " - " . $catg . " - " . $ph_c . "</h1>";
            $res_item = mysql_query($sql2);
            while ($row_item = mysql_fetch_array($res_item)) {
                $item_id = $row_item['item_id'];
                $item_name = $row_item['item_name'];
                $item_amt = $row_item['amount'];
                $due_by = $row_item['due_by'];
                $due_by_unit = $row_item['due_by_unit'];
                echo "<h2>" . $item_name . " - " . $item_amt . "</h2>";
                if ($ph_c == 1)
                    $sql3 = "select category, amount from pg_fee_item_discount where par_row_id = " . $item_id . " and category in ('PH', '" . $catg . "') and active_flg = 1 order by amount desc";
                else
                    $sql3 = "select category, amount from pg_fee_item_discount where par_row_id = " . $item_id . " and category = '" . $catg . "' and active_flg = 1 order by amount desc";
                // echo $sql3;
                $cnt = 0;
                $res_disc = mysql_query($sql3);
                
                if ($row_disc = mysql_fetch_array($res_disc)) {
                    $cnt = $cnt + 1;
                    $discount = $row_disc['amount'];
                    $discount_category = $row_disc['category'];
                    // echo "<br>". "test-ph0" . $discount . "-" . $discount_category ."</br>";
                } else {
                    $discount = 0;
                    $discount_category = "NA";
                }
                echo "<br>" . $discount_category . " - " . $discount . "</br>";
                $ins_inv_item = "insert into pg_student_invoice_item(invoice_id, item_id, name, amount, discount_category, discount, due_dt)
 values(" . $inv_id . "," . $item_id . ", '" . $item_name . "' , '" . $item_amt . "' , '" . $discount_category . "' , " . $discount . "," . $due_by . ")";
                $chk_ins = mysql_query($ins_inv_item);
                if ($chk_ins) {
                    $inv_item_id = mysql_insert_id();
                    echo "<br>" . $inv_item_id . "</br>";
                }
            }
        }
    }
    
    ?>

   <?php

} else {
    echo "You are not authorized to perform any operation. Close the browser and signin again";
}
include_once './footer.php';
?>
</body>
</html>

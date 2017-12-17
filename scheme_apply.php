<?php include_once "./inc/datacon.php";
include_once "./inc/header.php"; 

if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id']) && isset($_POST['student_id'])){
?>

    <?php include './inc/dashboard_topnav.php'; ?>
    
    <?php $student_id = $_POST['student_id']; ?>

    <div class="container-fluid">
      <div class="row">       			
<?php include './inc/student_sidenav.php'; ?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<h1 class="page-header">Receive Scheme Applications for Student - <?php echo $student_id; ?></h1>

<?php
if(isset($_POST['formDoor']))
    $aDoor = $_POST['formDoor'];
else 
    $aDoor = "";

   if(empty($aDoor))
    {
        echo("<div>You didn't select any item.</div>");
    }
else
    {
        $N = count($aDoor);

        $item_list="";
        for($i=0; $i < $N; $i++)
            {
                        if ($i==0)
                            $item_list = $aDoor[$i];
                        else
                            $item_list = $item_list . "," . $aDoor[$i];
                    }
                    
                    $sql = "INSERT INTO pg_schm_application (student_id, scheme_id, amount, status, created, last_upd_dt, created_by, last_upd_by)
 select '$student_id', row_id, amount, 'New', now(), now(), 1, 1 from pg_scheme where row_id in (" . $item_list .")" ;
                    $result = mysql_query($sql) or die(mysql_error());
                    $rec_ins = mysql_affected_rows();
                    echo("<div>Scheme Application submitted: $rec_ins for Student $student_id .</div>");
        }
        

   


?>

 </div>
      </div>
    </div>

   <?php } else { echo "You are not authorized to perform any operation. Close the browser and signin again"; }
   include_once './inc/footer.php';?>
   <script src ="./js/applyscheme.js"></script>
   
  </body>
</html>

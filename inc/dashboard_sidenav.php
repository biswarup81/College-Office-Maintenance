<?php include_once "./inc/datacon.php";



if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id'])){
	if($_SESSION['user_type'] == "PRINCIPAL" || $_SESSION['user_type'] == "PROFESSOR" ) {
?>
<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="reports.php">Reports</a></li>
            <li><a href="accounts.php">Accounts</a></li>
            <li><a href="student.php">Student Management</a></li>
            <li><a href="register_student.php">Admit Student</a></li>
            <?php if($_SESSION['user_type'] == "PRINCIPAL" ) { ?> <li><a href="faculty.php">Faculty Management</a></li><?php }?>
            <?php if($_SESSION['logged_in_user_id'] == 19) { ?> <li><a href="website_admin.php">Website Administration</a></li><?php }?>
            <li><a href="master.php">Master data</a></li>
            <li><a href="yearend.php">Year End</a></li>
          </ul>
         
          
</div>
<?php }
}?>
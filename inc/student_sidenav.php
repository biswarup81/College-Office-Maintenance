<?php if ( isset($_SESSION['logged_in_user_id'])) {
          	if( $_SESSION['user_type'] == 'PRINCIPAL' || $_SESSION['user_type'] == 'PROFESSOR') {
          	?>
<div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="dashboard.php">Overview <span class="sr-only">(current)</span></a></li>
            <li><a href="student.php">Student Master</a></li>
            <li><a href="student_schemes.php">Student Scheme Applications</a></li>
            <li><a href="student_search.php">Student Search</a></li>
          </ul>
         
          
</div>
<?php } }?>
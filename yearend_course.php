<?php include_once "./inc/datacon.php";
include_once "./inc/header.php"; 

if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id']) && isset($_GET['sc_id'])){
?>

    <?php include './inc/dashboard_topnav.php'; ?>

    <div class="container-fluid">
      <div class="row">       			
<?php include './inc/yearend_sidenav.php'; ?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<?php 
$sc_id = $_GET['sc_id'];
$as_id = $_GET['as_id'];

$sql = "SELECT a.row_id sc_id, b.name session_name, c.name course_name, a.course_id FROM pg_session_course a left join pg_session b on a.session_id = b.row_id
left join pg_course c on a.course_id = c.row_id where a.row_id = ".$sc_id;
$res = mysql_query($sql);
$count = 0;

while ($row = mysql_fetch_array($res)) {
    $count = $count + 1;
    $session_name = $row['session_name'];
    $course_name = $row['course_name'];
    $course_id = $row['course_id'];
}
?>
		 <h1 class="page-header">Year End - <?php echo $session_name; ?></h1>
        			<h2 class="sub-header">Student List - <?php echo $course_name; ?></h2>
        		
        		<form action="inc/checkbox-form.php" method="post">
        		
        		<input type="hidden" name="course_id" id="course_id" value=<?php echo $course_id; ?>  >
        		<input type="hidden" name="as_id" id="as_id" value=<?php echo $as_id; ?>  >
        		<input type="hidden" name="sc_id" id="sc_id" value=<?php echo $sc_id; ?>  >
        		
        		<table id="student_list" class="table table-striped">
		              <thead>
							<tr>
								<th>Check</th>
								<th>Student Id</th>
								
								<th>Name</th>
								<th>Date Of Birth</th>
								<th>Category</th>
								<th>Old Student Id</th>
								
								
								
							</tr>
						</thead>
						<tbody>
<?php

$sql1 = "SELECT a.row_id, a.title, a.fst_name, a.middle_name, a.last_name, a.dob, a.category, a.old_student_id, b.promo_retained
FROM pg_session_course_student b left join pg_student a on b.student_id = a.row_id where b.session_course_id = ".$sc_id." and b.promo_retained=0";
$result = mysql_query($sql1);
    $count = 1;
    $student_list = "";
    while ($row = mysql_fetch_array($result)) {
        
        ?>
							<tr>
							<td><input type="checkbox" name="formDoor[]" value=<?php echo $row['row_id']; ?>></td>
								<td><?php echo $row['row_id']; ?></td>
								
								<td><?php echo $row['title']." ".$row['fst_name']." ".$row['last_name']; ?></td>
								
								<td><?php echo date("d / m / Y", strtotime($row['dob'])); ?></td>
								<td><?php echo $row['category']; ?></td>
								<td><?php echo $row['old_student_id']; ?></td>
								
							
							</tr>
    <?php
        $count = $count + 1;
                
    }
    
    ?>
		              </tbody>
            	</table>
            	<input type="submit" name="promoteSubmit" id="promoteSubmit" value="Promote/Pass-out" />
            	<input type="submit" name="retainSubmit" id="retainSubmit" value="Retain Class" />
            	
            	</form>
  
 </div>
      </div>
    </div>

   <?php } else { echo "You are not authorized to perform any operation. Close the browser and signin again"; }
   include_once './inc/footer.php';?>
   <script src ="js/yearend.js"></script>
   
  </body>
</html>

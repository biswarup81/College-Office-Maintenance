<?php include_once "./inc/datacon.php";
include_once "./inc/header.php"; 

if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id'])){
?>

    <?php include './inc/dashboard_topnav.php'; ?>

    <div class="container-fluid">
      <div class="row">
        <?php include './inc/yearend_sidenav.php'; ?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Year End - Choose Course</h1>
          
          <div class="row">
          <div class="col-md-12">
        		
        		
        			
        			<?php
        			
        			$session_id = 6;
        			$prev_sql = "select a.row_id active_session_id, a.name active_session, b.row_id, b.name from pg_session a
left outer join pg_session b on a.par_row_id = b.row_id where a.active_flg = 1";
        			$count = 0;
        			$prev_session_id = 0;
        			$prev_res = mysql_query($prev_sql);
        			while ($rw = mysql_fetch_array($prev_res)) {
        			    $count = $count + 1 ;
        			    $prev_session_id = $rw['row_id'];
        			    $active_session_id = $rw['active_session_id'];
        			}
        			
        			?>
        		
        		<table id="course_list" class="table table-striped">
		              <thead>
							<tr>
								<th>Row Id</th>
								<th>Session Name</th>
								<th>Course Name</th>	
							</tr>
						</thead>
						<tbody>
<?php
$sql = "SELECT a.row_id sc_id, b.name session_name, c.name course_name FROM pg_session_course a left join pg_session b on a.session_id = b.row_id
left join pg_course c on a.course_id = c.row_id where a.session_id = ".$prev_session_id;
$res = mysql_query($sql);
    $count = 0;
    
    while ($row = mysql_fetch_array($res)) {
        
        ?>
							<tr>
								<td><?php echo "<a href='yearend_course.php?sc_id=".$row['sc_id']."&as_id=".$active_session_id."'>Click Here</a>"?></td>
								<td><?php echo $row['session_name']; ?></td>
								<td><?php echo $row['course_name']; ?></td>
							</tr>
    <?php
        $count = $count + 1;
        
    }
    
    ?>
		              </tbody>
            	</table>
            	
            	
            	
        		</div>
          </div>
          
            
          
        </div>
      </div>
    </div>

   <?php } else { echo "You are not authorized to perform any operation. Close the browser and signin again"; }
   include_once './inc/footer.php';?>
   <script src ="js/yearend.js"></script>
   
  </body>
</html>

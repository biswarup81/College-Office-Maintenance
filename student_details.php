<?php

include_once "./inc/datacon.php";
include_once "./inc/header.php";

if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id']) && isset($_GET['student_id'])) {
    ?>

    <?php include './inc/dashboard_topnav.php'; ?>

<div class="container-fluid">
	<div class="row">
        <?php include './inc/student_sidenav.php'; ?>
        <div
			class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<?php $student_id = $_GET['student_id']; ?>
			<h1 class="page-header">Student Master</h1>

			<div class="row">
				<div class="col-md-12">
				<h2 class="sub-header">Student Detail</h2>
				<a class="btn btn-warning" href=<?php echo "add_student_addr.php?student_id=".$student_id?> role="button">+Add Address+</a>
				<a class="btn btn-warning" href=<?php echo "add_student_mobile.php?student_id=".$student_id?> role="button">+Add Mobile+</a>
				<a class="btn btn-warning" href=<?php echo "add_student_phone.php?student_id=".$student_id?> role="button">+Add Phone+</a>
				<a class="btn btn-warning" href=<?php echo "add_student_email.php?student_id=".$student_id?> role="button">+Add eMail+</a>
				<a class="btn btn-warning" href=<?php echo "student_course_linking.php?student_id=".$student_id?> role="button">+Link Course+</a>
				<a class="btn btn-warning" href=<?php echo "student_scheme_apply.php?student_id=".$student_id?> role="button">+Scheme Application+</a>

					<table id="session_list" class="table table-striped">
						<thead>
							<tr>
								<th>Student Id</th>
								<th>Name</th>
								<th>Date Of Birth</th>
								<th>Active</th>
								<th></th>

							</tr>
						</thead>
						<tbody>
<?php
$sql1 = "SELECT a.row_id, a.title, a.fst_name, a.last_name, a.dob, a.active_flg, b.filename
FROM pg_student a left outer join pg_student_photo b on a.row_id = b.student_id where a.row_id = ".$student_id." 
 and ifnull(b.active_flg, 1) = 1";
//echo "<div>".$sql1."</div>";
$result = mysql_query($sql1);
    $count = 1;
    while ($row = mysql_fetch_array($result)) {
        
        ?>
                <tr>
								<td><?php echo $row['row_id']; ?></td>
								<td><?php echo $row['title']." ".$row['fst_name']." ".$row['last_name']; ?></td>
								<td><?php echo date("d / m / Y", strtotime($row['dob'])); ?></td>
								
								
								<td><?php if($row['active_flg']) echo "Y"; else echo "N"; ?></td>
							</tr>
    <?php
        $filename = $row['filename'];
        $student_id = $row['row_id'];
        $count = $count + 1;
    }
    
    ?>
              
		              </tbody>
					</table>
					
					<div>
					<?php echo "<img alt='#' src='./media/photos/".$filename."' />"; ?>
					</div>
	
					<div>
					<form action="./student_photo_upload.php" method="post" enctype="multipart/form-data">
					Select image to upload:<input type="file" name="fileToUpload" id="fileToUpload">
					<input type="hidden" name="student_id" value=<?php echo $student_id; ?> id="student_id">
					<input type="submit" value="Upload Image" name="submit">
					</form>
					</div>
				</div>
			</div>



		</div>
	</div>
</div>

<?php

} else {
    echo "You are not authorized to perform any operation. Close the browser and signin again";
}
include_once './inc/footer.php';?>

</body>
</html>

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
				<?php if( $_SESSION['user_type'] == 'PRINCIPAL' || $_SESSION['user_type'] == 'PROFESSOR') {
          		?>
				
				<a class="btn btn-warning" href=<?php echo "student_scheme_apply.php?student_id=".$student_id?> role="button">+Scheme Application+</a>
				<?php }?>
					
					<div class="page-header">
        <h1>Student Details</h1>
      </div>
      
      <?php
      	/* Vaiables */
	      $old_student_id = "";
	      $name = "";
	      $dob = "";
	      $active = "";
	      $gender = "";
	      $filename = "";
	      $gender= "";
	      $invoice_id= "" ; 
	      $amount = "";
	      $payment_dt = "";
	      $pay_mode = "";
	      $bank_name = "";
	      $cheque_number = "";
	      $address_type= "";
	      $addr = "";
	      $state= "";
	      $pincode= "";
	      $email = "";
	      $filename = "";	      $category = "";
	      
			/* Profile */
			$sql1 = "SELECT a.row_id, a.title, a.fst_name, a.last_name, a.dob, a.active_flg, b.filename, a.old_student_id, a.gender, a.category
			FROM pg_student a left outer join pg_student_photo b on a.row_id = b.student_id where a.row_id = ".$student_id." 
			 and ifnull(b.active_flg, 1) = 1";
			//echo "<div>".$sql1."</div>";
			$result = mysql_query($sql1)  or die(mysql_error());
			$count = 1;
			while ($row = mysql_fetch_array($result)) {
			  	$old_student_id = $row['old_student_id'];
		    	$name = $row['fst_name']." ".$row['last_name'];
		    	if ($dob == "") {$dob = strtotime($row['dob']);}
		    	$active = $row['active_flg'];
		    	$category =  $row['category'];
			    $filename = $row['filename'];
			    $gender= $row['gender'];
			    $count = $count + 1;       
    		}
    		
    		/* Address and contact Info */
    		
    		$sql1 = "SELECT `row_id`, `student_id`, `address_type`, `addr`, `addr_line_2`, `addr_line_3`, `state`, `pincode`, `active_flg`, 
					`created`, `created_by`, `last_upd_dt`, `last_upd_by` FROM `pg_student_address`  where student_id = ".$student_id." 
			 		and ifnull(active_flg, 1) = 1";
    		$result = mysql_query($sql1)  or die(mysql_error());
    		
    		while ($row = mysql_fetch_array($result)) {
    			$address_type= $row['address_type'];
    			$addr = $row['addr']. " ". $row['addr_line_2']. " ". $row['addr_line_3'];
    			$state= $row['state'];
    			$pincode= $row['pincode'];
    			
    		}
    		
    		$sql1 = "SELECT `row_id`, `student_id`, `email`, `active_flg`, `created`, `created_by`, `last_upd_dt`, `last_upd_by` FROM `pg_student_email` where student_id = ".$student_id."
			 		and ifnull(active_flg, 1) = 1";
    		$result = mysql_query($sql1)  or die(mysql_error());
    		
    		while ($row = mysql_fetch_array($result)) {
    			$email= $row['email'];
    		}
    		
    		$sql1 = "SELECT `row_id`, `student_id`, `name`, `contact_no`, `active_flg`, `created`, `created_by`, `last_upd_dt`, `last_upd_by` FROM `pg_student_emergency_contact` WHERE student_id = ".$student_id."
			 		and ifnull(active_flg, 1) = 1";
    		$result = mysql_query($sql1)  or die(mysql_error());
    		$contact_no = "";
    		while ($row = mysql_fetch_array($result)) {
    			$contact_no= $row['contact_no'];
    		}
    		
    		$sql1 = "SELECT `row_id`, `student_id`, `mobile_num`, `active_flg`, `created`, `created_by`, `last_upd_dt`, `last_upd_by` FROM `pg_student_mobile` WHERE student_id = ".$student_id."
			 		and ifnull(active_flg, 1) = 1";
    		$result = mysql_query($sql1)  or die(mysql_error());
    		$mobile_num = "";
    		while ($row = mysql_fetch_array($result)) {
    			$mobile_num= $row['mobile_num'];
    		}
    		
    		/*Payment */
    		$sql1 = "SELECT `row_id`, `student_id`, `invoice_id`, `amount`, `payment_dt`, `pay_mode`, `bank_name`, `cheque_number`, `active_flg`, `created`, `created_by`, `last_upd_dt`, `last_upd_by` FROM `pg_student_payment` WHERE student_id = ".$student_id."
			 		and ifnull(active_flg, 1) = 1";
    		$result_payment = mysql_query($sql1)  or die(mysql_error());
    		/* Admission */    		$sql1 = "SELECT h.name as course, f.promo_retained as passed, s.name as session FROM pg_student a inner  join pg_session_course_student f on a.row_id = f.student_id left  join pg_session_course g on f.session_course_id = g.row_id left  join pg_course h on g.course_id = h.row_id " .        		"left  join pg_session s on g.session_id = s.row_id where a.row_id = " . $student_id . " and ifnull(f.active_flg, 1) = 1 order by s.row_id desc";    		    		$result_adm = mysql_query($sql1)  or die(mysql_error());    		    		/* Education */    		$sql1 = "select a.row_id, b.board_name, b.level, d.name as subject, marks from pg_student a inner join pg_student_board b on a.row_id =b.student_id left join pg_student_marks c on b.row_id = c.std_board_id left outer join pg_subject d on c.subject_id = d.row_id" .    		" where a.row_id = " . $student_id . " order by b.level desc";    		    		$result_edu = mysql_query($sql1)  or die(mysql_error());    ?>
    
    
      <div class="row">
        <div class="col-sm-4">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Primary information</h3>
            </div>
            <div class="panel-body">
              <div class="col-sm-6" id="profile_picture-div">
					
					
					<img class="img-circle" id="profile_picture" height="128" data-src="./images/default.jpg" data-holder-rendered="true" style="width: 140px; height: 140px;" src="./media/photos/<?php echo $filename; ?>">
					
					<a type="button" class="btn btn-primary" id="change-profile-pic">Change Profile Picture</a>
			   </div>
			   <div class="col-sm-6">
			   		<table id="session_list" class="table table-striped">
						<tbody>
							<tr><td colspan="2"><?php echo $name ?></td></tr>
							<tr><td>Gender</td><td><?php echo $gender; ?></td></tr>
							<tr><td>ID</td><td><?php echo $old_student_id; ?></td></tr>
							
							<tr><td>DOB</td><td><?php if ($dob != ""){echo date("d/m/y", $dob);} ?></td></tr>							<tr><td>Category</td><td><?php echo $category; ?></td></tr>
		              </tbody>
					</table>
				</div>
            </div>
          </div>
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Address and Contact info</h3>
            </div>
            <div class="panel-body">
              	<table id="session_list" class="table table-striped">	
              		<tbody>		<?php if($pincode != "") {?>
								<tr><td colspan="2"><?php echo $addr ?></td></tr>
								<tr><td colspan="2"><?php echo $state . " - ". $pincode?></td></tr>
								<?php } else {?>
								<tr><td colspan="2" align="center">No Address. <a class="btn btn-warning" href=<?php echo "add_student_addr.php?student_id=".$student_id?> role="button">Add Address</a></td></tr>
								<?php }?>
								<tr><td>Primary Contact</td><td><?php echo $mobile_num; ?></td></tr>
								<tr><td>Emargency Contact</td><td><?php echo $contact_no; ?></td></tr>
              					<tr><td>Email</td><td>              					<?php if($email == "")               					    echo "<a class='btn btn-warning' href=add_student_email.php?student_id=".$student_id." role='button'>Add eMail</a>";              					    else               					        echo $email; ?>              					        </td></tr>
		              </tbody>
		         </table>
            </div>
          </div>
        </div><!-- /.col-sm-4 -->
        <div class="col-sm-4">
          <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title">Payment Information (Last 5 transactions)</h3>
            </div>
            <div class="panel-body">
            <?php if(mysql_num_rows($result_payment) > 0) {?>
              <table id="session_list" class="table table-striped">
						<thead>
						<tr><td>Invoice</td>
							<td>Amount</td>
							<td>Date</td>
							<td>Mode</td>
							</tr>
						</thead>
						<tbody>
						<?php 
						
						while ($row = mysql_fetch_array($result_payment)) {
				    			$invoice_id= $row['invoice_id'];
				    			$amount = $row['amount'];
				    			$payment_dt = strtotime($row['payment_dt']);
				    			$pay_mode = $row['pay_mode'];
				    			$bank_name = $row['bank_name'];
				    			$cheque_number = $row['cheque_number'];
				    		}?>
							<tr><td><?php echo $invoice_id; ?></td>
							<td><?php echo "Rs.".$amount; ?></td>
							<td><?php if ($payment_dt != "") echo date("d / m / Y", $payment_dt) ;?></td>
							<td><?php echo $pay_mode; ?></td>
							</tr>
		              </tbody>
					</table>
				<?php } else {?>
				<p>No Transaction so far</p>
				<?php }?>
            </div>
          </div>
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title">Admission Information</h3>
            </div>
            <div class="panel-body">
              <?php if(mysql_num_rows($result_adm) > 0) {?>              <table id="session_list" class="table table-striped">						<thead>						<tr><td>Course</td>							<td>Session</td>							<td>Status</td>							</tr>						</thead>						<tbody>						<?php 												while ($row = mysql_fetch_array($result_adm)) {				    			$course= $row['course'];				    			$session_name = $row['session'];				    			$passed = $row['passed'];				    		?>							<tr><td><?php echo $course; ?></td>							<td><?php echo $session_name; ?></td>							<td><?php if ($passed == 0) echo "Ongoing"; else echo "Completed" ;?></td>							</tr>							<?php } ?>		              </tbody>					</table>				<?php } else {?>				<p>No course information. <a class="btn btn-warning" href=<?php echo "student_course_linking.php?student_id=".$student_id?> role="button">Link Course</a></p>				<?php }?>
            </div>
          </div>
        </div><!-- /.col-sm-4 -->
        <div class="col-sm-4">
          <div class="panel panel-warning">
            <div class="panel-heading">
              <h3 class="panel-title">Educational Information</h3>
            </div>
            <div class="panel-body">
                          <?php if(mysql_num_rows($result_edu) > 0) {?>              <table id="session_list" class="table table-striped">						<thead>						<tr><td>Board</td>							<td>Level</td>							<td>Subject</td>							<td>Marks</td>							</tr>						</thead>						<tbody>						<?php 						while ($row = mysql_fetch_array($result_edu)) {						    $board_name= $row['board_name'];						    $level = $row['level'];						    $subject = $row['subject'];						    $marks = $row['marks'];				    		?>							<tr>								<td><?php echo $board_name; ?></td>								<td><?php echo $level; ?></td>								<td><?php if($subject) echo $subject; else echo "NA"; ?></td>								<td><?php if($marks) echo $marks; else echo "NA"; ?></td>															</tr>														<?php } ?>		              </tbody>					</table>				<?php } else {?>				<p>No info. <a class="btn btn-warning" href=<?php echo "student_edu_details.php?student_id=".$student_id?> role="button">Add Education</a></p>				<?php }?>
            </div>
          </div>
          <div class="panel panel-danger">
            <div class="panel-heading">
              <h3 class="panel-title">Any other information information</h3>
            </div>
            <div class="panel-body">
              Panel content
            </div>
          </div>
        </div><!-- /.col-sm-4 -->
      </div>
					
					
					<!-- START - Modal popup for change in profile picture -->
					<div id="profile_pic_modal" class="modal fade">
					<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h3>Change Profile Picture</h3>
					</div>
					<div class="modal-body">
					<form id="cropimage" method="post" enctype="multipart/form-data" action="change_pic.php">
					
					<strong>Upload Image for <?php echo $student_id; ?> ::</strong> <br><br>
					<input type="file" name="profile-pic" id="profile-pic" />
					<input type="hidden" name="hdn-profile-id" id="hdn-profile-id" value="<?php echo $student_id; ?>" />
					<input type="hidden" name="hdn-x1-axis" id="hdn-x1-axis" value="" />
					<input type="hidden" name="hdn-y1-axis" id="hdn-y1-axis" value="" />
					<input type="hidden" name="hdn-x2-axis" value="" id="hdn-x2-axis" />
					<input type="hidden" name="hdn-y2-axis" value="" id="hdn-y2-axis" />
					<input type="hidden" name="hdn-thumb-width" id="hdn-thumb-width" value="" />
					<input type="hidden" name="hdn-thumb-height" id="hdn-thumb-height" value="" />
					<input type="hidden" name="action" value="" id="action" />
					<input type="hidden" name="image_name" value="" id="image_name" />
					
					<div id='preview-profile-pic'></div>
					<div id="thumbs" style="padding:5px; width:600p"></div>
					</form>
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" id="save_crop" class="btn btn-primary">Crop &amp; Save</button>
					</div>
					</div>
					</div>
					</div>
					
					<!--  <div>
					<form action="./student_photo_upload.php" method="post" enctype="multipart/form-data">
					Select image to upload:<input type="file" name="fileToUpload" id="fileToUpload">
					<input type="hidden" name="student_id" value=<?php echo $student_id; ?> id="student_id">
					<input type="submit" value="Upload Image" name="submit">
					</form>
					</div> -->
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

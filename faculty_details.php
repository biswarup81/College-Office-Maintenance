<?php

include_once "./inc/datacon.php";
include_once "./inc/header.php";

if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id']) && isset($_GET['faculty_id'])) {
    ?>

    <?php include './inc/dashboard_topnav.php'; ?>

<div class="container-fluid">
	<div class="row">
        <?php include './inc/faculty_sidenav.php'; ?>
        <div
			class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
<?php $faculty_id = $_GET['faculty_id']; ?>
			<h1 class="page-header">Faculty Master</h1>

			<div class="row">
				<div class="col-md-12">
				<h2 class="sub-header">Faculty Detail</h2>
				<a class="btn btn-warning" href=<?php echo "add_faculty_addr.php?faculty_id=".$faculty_id?> role="button">+Add Address+</a>
				<a class="btn btn-warning" href=<?php echo "add_faculty_mobile.php?faculty_id=".$faculty_id?> role="button">+Add Mobile+</a>
				<a class="btn btn-warning" href=<?php echo "add_faculty_phone.php?faculty_id=".$faculty_id?> role="button">+Add Phone+</a>
				<a class="btn btn-warning" href=<?php echo "add_faculty_email.php?faculty_id=".$faculty_id?> role="button">+Add eMail+</a>
				<a class="btn btn-warning" href=<?php echo "faculty_course_linking.php?faculty_id=".$faculty_id?> role="button">+Link Course+</a>
				<?php if( $_SESSION['user_type'] == 'PRINCIPAL' || $_SESSION['user_type'] == 'PROFESSOR') {
          		?>
				
				<a class="btn btn-warning" href=<?php echo "faculty_scheme_apply.php?faculty_id=".$faculty_id?> role="button">+Scheme Application+</a>
				<?php }?>
					
					<div class="page-header">
        <h1>Faculty Details</h1>
      </div>
      
      <?php
      	/* Vaiables */
	      $old_faculty_id = "";
	      $name = "";
	      $dob = "";
	      $qualification = "";
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
			$sql1 = "SELECT b.filename, a.`row_id`, a.`title`, a.`fst_name`, a.`middle_name`, a.`last_name`, a.`dob`, a.`staff_id`, a.`email`, a.`mobile`, a.`job_role`, 
                a.`created`, a.`created_by`, a.`last_upd_dt`, a.`last_upd_by`, a.`desig`, a.`qualification` FROM `pg_staff` a 
                left outer join pg_staff_photo b on a.row_id = b.staff_id where a.row_id = ".$faculty_id." 
			 and ifnull(b.active_flg, 1) = 1";
			//echo "<div>".$sql1."</div>";
			
			$result = mysql_query($sql1)  or die(mysql_error());
			$count = 1;
			while ($row = mysql_fetch_array($result)) {
			  	$old_faculty_id = $row['row_id'];
		    	$name = $row['fst_name']." ".$row['last_name'];
		    	
		    	$qualification = $row['qualification'];
		    	$desig =  $row['desig'];
			    $filename = $row['filename'];
			   
			    $count = $count + 1;       
    		}
    		
    		
    				?>
    
    
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
							
							<tr><td>ID</td><td><?php echo $old_faculty_id; ?></td></tr>
							
							<tr><td colspan="2"><?php echo $qualification; ?></td></tr>
		              </tbody>
					</table>
				</div>
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
         
        </div><!-- /.col-sm-4 -->
        <div class="col-sm-4">
          <div class="panel panel-warning">
            <div class="panel-heading">
              <h3 class="panel-title">Resume</h3>
            </div>
            <div class="panel-body">
                                           PLace content  </div>
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
					<form id="cropimage" method="post" enctype="multipart/form-data" action="change_pic_staff.php">
					
					<strong>Upload Image for <?php echo $faculty_id; ?> ::</strong> <br><br>
					<input type="file" name="profile-pic" id="profile-pic" />
					<input type="hidden" name="hdn-profile-id" id="hdn-profile-id" value="<?php echo $faculty_id; ?>" />
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
					<form action="./faculty_photo_upload.php" method="post" enctype="multipart/form-data">
					Select image to upload:<input type="file" name="fileToUpload" id="fileToUpload">
					<input type="hidden" name="faculty_id" value=<?php echo $faculty_id; ?> id="faculty_id">
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

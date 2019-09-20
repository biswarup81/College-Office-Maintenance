<?php

include_once "./inc/datacon.php";
include_once "./inc/header.php";
?>
<script>
function inactivateFaculty(facultyId, user_type){
	//alert("inactivate "+facultyId);
	var url = "./ajax/deregister_faculty.php?faculty_id="+facultyId+"&user_type="+user_type;
	//alert(url)
	/*$.post("./ajax/deregister_faculty.php",
  {
    faculty_id: facultyId,
    use_type: user_type
  },
  function(data, status){
    alert("Data: " + data + "\nStatus: " + status);
  });*/
	$.ajax({url: url, success: function(data){
		 alert("Successfully deactivated");
		 
  }});

}
</script>
 <div class="container">
<?php
if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id']) && isset($_GET['faculty_id'])) {
    ?>
 
    <?php include './inc/dashboard_topnav.php'; ?>

<div class="container-fluid">
	<div class="row">
       
        
<?php $faculty_id = $_GET['faculty_id']; ?>
			<h1 class="page-header">Faculty Details</h1>

			<div class="row">
				<div class="col-md-12">
				
				<a class="btn btn-warning" href=<?php echo "add_faculty_addr.php?faculty_id=".$faculty_id?> role="button">+Add Address+</a>
				<a class="btn btn-warning" href=<?php echo "add_faculty_mobile.php?faculty_id=".$faculty_id?> role="button">+Add Mobile+</a>
				<a class="btn btn-warning" href=<?php echo "add_faculty_phone.php?faculty_id=".$faculty_id?> role="button">+Add Phone+</a>
				<a class="btn btn-warning" href=<?php echo "add_faculty_email.php?faculty_id=".$faculty_id?> role="button">+Add eMail+</a>
				<a class="btn btn-danger" onclick="inactivateFaculty('<?php echo $faculty_id?>','<?php echo $_SESSION['user_type'] ?>')" role="button" id="delete_faculty">Delete Faculty</a>
					
					<div class="page-header">
        
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
            Not relevant..
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

<?php

} else {
    echo "You are not authorized to perform any operation. Close the browser and signin again";
}
include_once './inc/footer.php';?>

</body>
</html>

<?php include_once "./inc/datacon.php";
include_once "./inc/header.php"; 
$_REQUEST['page'] = '10';
if (isset($_SESSION['user_type']) && isset($_SESSION['logged_in_user_id'])){
    if(isset($_GET['Appl_No'])){
        $Appl_No = $_GET['Appl_No'];
    } else {
        $Appl_No = 0;
    }
include './inc/dashboard_topnav.php'; ?>

    <div  class="container-fluid">
      <div class="row">
       <?php if ($_SESSION['user_type'] == "ACCOUNTS") { include './inc/accounts_sidenav.php'; }else{ include './inc/student_sidenav.php'; }?>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Enroll Student</h1>
          <div class="row">
          <form id="create_student_form" class="form-horizontal" >
<input type="hidden" name="role" id="role" value="STUDENT"  >
			<div class="alert alert-danger" role="alert" id="search_alert_2" hidden="true">
			
			</div>
			
			<div class="form-group">
			<label class="col-sm-2 control-label">Title</label>
			<div class="col-sm-2">
			<select class="form-control" name="title" id="title">
			<option value="0">--SELECT--</option>
			<option value="MR.">Mr.</option>
			<option value="MS.">Ms.</option>
			<option value="MRS.">Mrs.</option>
			<option value="KR.">Kr.</option>
			</select>
			</div>
			</div>
		
			
			<div class="form-group">
			<label for="fname" class="col-sm-2 control-label">First Name</label>
			<div class="col-sm-6">
			<input type="text" name="fname" id="fname" class="text-uppercase" value="">
			</div>
			</div>
			
			<div class="form-group">
			<label for="mname" class="col-sm-2 control-label">Middle Name</label>
			<div class="col-sm-6">
			<input type="text" class="text-uppercase" name="mname" id="mname" placeholder="Enter Middle Name">
			</div>
			</div>
			
			
			<div class="form-group">
			<label for="lname" class="col-sm-2 control-label">Last Name</label>
			<div class="col-sm-6">
			<input type="text" class="text-uppercase" name="lname" id="lname" value="">
			</div>
			</div>

			<div class="form-group">
			<label class="col-sm-2 control-label">Gender</label>
			<div class="col-sm-2">
			<select class="form-control" name="gender" id="gender" >
			<option value="0">--SELECT--</option>
			<option value="F">Female</option>
			<option value="M">Male</option>
			<option value="T">Transgender</option>
			</select>
			</div>
			</div>

			
			<div class="form-group">
			<label for="theDOB" class="col-sm-2 control-label">Date of Birth</label>
			<div class="col-sm-2">
			<input type="date" class="form-control" name="theDOB" id="theDOB" placeholder="Enter Date of Birth">
			</div>
			</div>
			
			<div class="form-group">
			<label class="col-sm-2 control-label">Category</label>
			<div class="col-sm-2">
			<select class="form-control" name="category" id="category">
			<option value="0">--SELECT--</option>
			<option value="GEN">General</option>
			<option value="SC">SC</option>
			<option value="ST">ST</option>
			<option value="OBC-A">OBC-A</option>
			<option value="OBC-B">OBC-B</option>
			</select>
			</div>
			</div>
			
			<div class="form-group">
			<label class="col-sm-2 control-label">Physically Challenged</label>
			<div class="col-sm-2">
			<select class="form-control" name="phc" id="phc">
			<option value="SELECT">--SELECT--</option>
			<option value="Y">Yes</option>
			<option value="N">No</option>
			</select>
			</div>
			</div>
			
			<div class="form-group">
			<label for="aadhaar_no" class="col-sm-2 control-label">Aadhaar</label>
			<div class="col-sm-6">
			<input type="text" class="form-control" name="aadhaar_no" id="aadhaar_no" placeholder="Enter Aadhaar No">
			</div>
			</div>
			
			<div class="form-group">
			<label for="app_no" class="col-sm-2 control-label">Aplication No</label>
			<div class="col-sm-6">
			<input type="text" class="form-control" name="app_no" id="app_no" readonly="readonly">
			</div>
			</div>
			<div class="form-group">
			<label for="course_lvl_cd" class="col-sm-2 control-label">Course Level</label>
			<div class="col-sm-6">
			<input type="text" class="form-control" name="course_lvl_cd" id="course_lvl_cd" readonly="readonly">
			</div>
			</div>
			
			<div class="form-group">
			<label for="course_cd" class="col-sm-2 control-label">Course</label>
			<div class="col-sm-6">
			<input type="text" class="form-control" name="course_cd" id="course_cd" readonly="readonly">
			</div>
			</div>
			
			
			<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
			<input type="button" id="adm_by_student" class="btn btn-default"  value="Admission" name="ADD" >
			</div>
			</div>
			</form>
			<!--END of form-->
			<div class="alert alert-info" role="alert" id="create_u_result" hidden="true">
			
			</div>
            
          </div>
        </div>
      </div>
    </div>

   <?php } else { echo "You are not authorized to perform any operation. Close the browser and signin again"; }
   include_once './inc/footer.php';?>
   <script type="text/javascript">
    $(document).ready(function(){
    	$.ajax({
        		url:'http://localhost/OnlineAdmissionSystem/online-admission/admin/adm_student_ajax.php?application_num=<?php echo $Appl_No?>', 
    	    	success: function(data) {
    	    		//data = '[{"id":"1","Application_No":"201806090001","password":"578631","Application_Fee":"","Demand_Draft_No":"","First_Name":"MANAS","Middle_Name":"","Last_Name":"PATRA","Gurdian_Name":"BISWESWAR PATRA","Gurdian_Mobile_No":"9874055573","Gurdian_Relation":"FATHER","Other_Relation":"","occu":"SERVICE","other_occu":"","desi":"","income":"<5000","Gender":"M","Date_Of_Birth":"2001-06-08","Category":"GEN","Physically_Challenged":"N","Religion":"HINDU","other_religion":"","Nationality":"INDIAN","Address":"RAJARHAT","ZIP_PIN":"700101","Address_1":"","pin2":"0","Address_2":"","Country":"INDIA","Mobile":"","Land_Phone_No":"-","email":"MPMANAS@GMAIL.COM","Total_Marks":"440","Bank_Payment_Verified":"0","admit":"0","course_id":"21","course_level_id":"11","session_id":"4","submit_date":"2018-06-09","flag":"3","state":"35","district":"641","CREATE_DATE":"2018-06-09 00:33:35","ADMISSION_ACCEPTANCE_DATE":"0000-00-00 00:00:00"}]';
    	    		alert("success!!!");
    	    		for (var i = 0; i < data.length; i++){
    	    		    var obj = data[i];
    	    		    $("#fname").val(obj['First_Name']);
    	    		    $("#mname").val(obj['Middle_Name']);
    	    		    $("#lname").val(obj['Last_Name']);
    	    		    $("#theDOB").val(obj['Date_Of_Birth']);
    	    		    $("#gender").val(obj['Gender']).attr("selected", "selected");
    	    		    $("#category").val(obj['Category']).attr("selected", "selected");
    	    		    $("#phc").val(obj['Physically_Challenged']).attr("selected", "selected");
    	    		    $("#app_no").val(obj['Application_No']);
    	    		    $("#course_lvl_cd").val(obj['Course_Level_Name']);
    	    		    $("#course_cd").val(obj['Course_Name']);
    	    		    
    	    		    //alert(obj['First_Name']);
    	    		    /* for (var key in obj){
    	    		        var attrName = key;
    	    		        var attrValue = obj[key];
    	    		        //alert(attrName+" "+attrValue);
    	    		    } */
    	    		}
    	    		
             	},
                error: function() {
                	alert("fail ???X");	
                },
                dataType: "json"//set to JSON 
         });
    	//$("#info").load("http://localhost/OnlineAdmissionSystem/online-admission/admin/adm_student_ajax.php?application_num=<?php echo $Appl_No?>");
    });
</script>
  </body>
</html>
			
/* THIS IS A CUSTOM JAVASCRIPT FILE */



function addPatient(){
       
    var patient_name = document.getElementById("patient_name").value;
    var sex = document.getElementById("sex").value;
    var age = document.getElementById("age").value;
    var cell = document.getElementById("cell").value;
    if(patient_name == "" || patient_name == null) {
        alert ("Patient Name cannot be blank");
        return false;
    } else if(sex == "" || sex == null)  {
        alert ("Sex Value cannot be blank");
        return false;
    } else if(age == "" || age == null) {
        alert ("Age cannot be blank");
        return false;
    } else if(cell == "" || cell == null)  {
        alert ("Mobile number cannot be blank");
        return false;
    } else {
        return true;
        /*
        //Add in dadabase
        if (window.XMLHttpRequest){
                    xmlhttp=new XMLHttpRequest();
        }else{
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }

                xmlhttp.onreadystatechange=function(){
                if (xmlhttp.readyState==4 && xmlhttp.status==200){

                    //document.getElementById("CF").innerHTML=xmlhttp.responseText;
                    alert("SUCCESS");
                    //var respText = "Patient added with patient ID : "+xmlhttp.responseText;
                    //document.getElementById("add_success").innerHTML=respText;
                   
            }
        }
        str = "ajax/add_patient.php?patient_name="+patient_name+"&sex="+sex+"&age="+age+"&cell="+cell;

        xmlhttp.open("GET",str,true);
        xmlhttp.send();
        */
    }
}
   


function addInvestigation(type){
    var invname ;
    var divObj = null;
    var PRESCRIPTION_ID = document.getElementById("PRESCRIPTION_ID").value;
    //alert('prescription id -> '+PRESCRIPTION_ID);
    if(type == 'TYPE1'){
            //alert( document.getElementById("invest1").value);
            invname = document.getElementById("invest1").value;
            divObj = document.getElementById("tab111");
            document.getElementById("invest1").value = "";
            document.getElementById("invest1").focus();
    } else if (type == 'TYPE2'){
           // alert( document.getElementById("invest2").value);
            invname = document.getElementById("invest2").value;
            divObj = document.getElementById("tab112");
            document.getElementById("invest2").value = "";
            document.getElementById("invest2").focus();
    } else if (type == 'TYPE3'){
            //alert( document.getElementById("invest3").value);
            invname = document.getElementById("invest3").value;
            divObj = document.getElementById("tab113");
            document.getElementById("invest3").value = "";
            document.getElementById("invest3").focus();
    } else if (type == 'TYPE4'){
           // alert( document.getElementById("invest4").value);
            invname = document.getElementById("invest4").value;
            divObj = document.getElementById("tab114");
            document.getElementById("invest4").value = "";
            document.getElementById("invest4").focus();
    } else if (type == 'TYPE5'){
            //alert( document.getElementById("invest5").value);
            invname = document.getElementById("invest5").value;
            divObj = document.getElementById("tab115");
            document.getElementById("invest5").value = "";
            document.getElementById("invest5").focus();
    } else if (type == 'TYPE6'){
            //alert( document.getElementById("invest6").value);
            invname = document.getElementById("invest6").value;
            divObj = document.getElementById("tab116");
            document.getElementById("invest6").value = "";
            document.getElementById("invest6").focus();
    } else if (type == 'TYPE7'){
            //alert( document.getElementById("invest7").value);
            invname = document.getElementById("invest7").value;
            divObj = document.getElementById("tab117");
            document.getElementById("invest7").value = "";
            document.getElementById("invest7").focus();
    } else if (type == 'TYPE8'){
            //alert( document.getElementById("invest7").value);
            invname = document.getElementById("invest8").value;
            divObj = document.getElementById("tab118");
            document.getElementById("invest8").value = "";
            document.getElementById("invest8").focus();
    } else if (type == 'TYPE9'){
            //alert( document.getElementById("invest7").value);
            invname = document.getElementById("invest9").value;
            divObj = document.getElementById("tab119");
            document.getElementById("invest9").value = "";
            document.getElementById("invest9").focus();
    } else if (type == 'TYPE10'){
            //alert( document.getElementById("invest7").value);
            invname = document.getElementById("invest10").value;
            divObj = document.getElementById("tab1110");
            document.getElementById("invest10").value = "";
            document.getElementById("invest10").focus();
    } else if (type == 'TYPE11'){
            //alert( document.getElementById("invest7").value);
            invname = document.getElementById("invest11").value;
            divObj = document.getElementById("tab1111");
            document.getElementById("invest11").value = "";
            document.getElementById("invest11").focus();
    } else if (type == 'TYPE12'){
            //alert( document.getElementById("invest7").value);
            invname = document.getElementById("invest12").value;
            divObj = document.getElementById("tab1112");
            document.getElementById("invest12").value = "";
            document.getElementById("invest12").focus();
    } else if (type == 'TYPE13'){
            //alert( document.getElementById("invest7").value);
            invname = document.getElementById("invest13").value;
            divObj = document.getElementById("tab1113");
            document.getElementById("invest13").value = "";
            document.getElementById("invest13").focus();
    }
    if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
    } else
    {// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }

    xmlhttp.onreadystatechange=function(){
    if (xmlhttp.readyState==4 && xmlhttp.status==200){
        //divObj.innerHTML=divObj.innerHTML+xmlhttp.responseText;
        var element = document.createElement("input");
 
        //Assign different attributes to the element.
        element.setAttribute("type", "checkbox");
        element.setAttribute("value", xmlhttp.responseText);
        element.setAttribute("name", xmlhttp.responseText);
        element.setAttribute("checked", true);
        divObj.appendChild(element);
        var txt = document.createTextNode(" "+xmlhttp.responseText+" "); 
        divObj.appendChild(txt);
        
        }
    }
    str = "ajax/inserintoinvmaster.php?mode=ADD_INVESTIGATION&investigation_name="
            +invname+"&investigation_type="+type+"&PRESCRIPTION_ID="+PRESCRIPTION_ID;
    xmlhttp.open("GET",str,true);
    xmlhttp.send();
    return false;
}


function backtoVisit(){
  location.href= "visit_list.php";
}

function startPrescription(patientId){
    alert(patientId);
}


function addPatientInvestigation(patientid, visit_id){
    //alert("TYPE -> "+type);
    //alert("Prescription Id -> "+prescriptionid);
    var invName = document.getElementById("investigation").value;
    var invVal = document.getElementById("txtPatientInvval").value;
    //alert("TYPE ->"+ citype);
    if(invName == "" || invName == null )
    {
        alert ("Investigation Name cannot be blank");
        document.getElementById("txtPatientInv").focus();
    }if(invVal == "" || invVal == null )
    {
        alert ("Investigation Value cannot be blank");
        document.getElementById("txtPatientInvval").focus();
    } else {

        if (window.XMLHttpRequest){
                    xmlhttp=new XMLHttpRequest();
        }else{
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }

                xmlhttp.onreadystatechange=function(){
                if (xmlhttp.readyState==4 && xmlhttp.status==200){
                    //document.getElementById("CI").innerHTML = "";
                    //alert(xmlhttp.responseText);
                    window.location.reload();
                    document.getElementById("INV").innerHTML=xmlhttp.responseText;
                    document.getElementById("investigation").value = "";
                    document.getElementById("txtPatientInvval").value = "";
                    document.getElementById("investigation").focus();
                    
            }
        }
        
        
        str = "ajax/add_patient_investigation.php?mode=ADD_PATIENT_INVESTIGATION"+
            "&patientid="+patientid+"&visit_id="+visit_id+"&invName="+invName+"&invVal="+invVal;
        
        xmlhttp.open("GET",str,true);
        xmlhttp.send();
    }
    document.getElementById("txtCI").focus();
    return false;
}

function deletePatientInvestigation(visit_id, investigation_id){
    //alert('Delete Patient Investigation -> '+visit_id+'  '+investigation_id);
    
     if (window.XMLHttpRequest){
                    xmlhttp=new XMLHttpRequest();
        }else{
                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }

                xmlhttp.onreadystatechange=function(){
                if (xmlhttp.readyState==4 && xmlhttp.status==200){
                    xmlDoc = xmlhttp.responseText;
                    window.location.reload();
                    //document.getElementById("new").innerHTML = xmlhttp.responseText;
                    //document.getElementById("investigation").focus();
                   
            }
        }
        
        
        str = "ajax/delete_patient_investigation.php?mode=DELETE_PATIENT_INVESTIGATION"+
            "&INVESTIGATION_ID="+investigation_id+"&VISIT_ID="+visit_id;
        /*alert(str);*/
        xmlhttp.open("GET",str,true);
        xmlhttp.send();
    
    
    return false;
}

$(document).ready(function(){
	
	$( "#investigation" ).autocomplete({
	      source: "./ajax/get_investigation_list.php",
	      minLength: 2,
	      select: function( event, ui ) {
	    	  
	        console.log( "Selected: " + ui.item.label + " aka " + ui.item.value );
	      }
	    });
   
    //#course : Medicaine List Start
	$( "#course" ).autocomplete({
	      source: "./ajax/get_course_list.php",
	      minLength: 2,
	      select: function( event, ui ) {
	    	  
	        console.log( "Selected: " + ui.item.label + " aka " + ui.item.value );
	       
	        $("#hidden_prescribed_medicine_id").val(ui.item.id);
	      }
	    });
    
	$( "#dose1" ).autocomplete({
	      source: "./ajax/get_dose_list.php",
	      minLength: 1,
	      select: function( event, ui ) {
	    	  
	        console.log( "Selected: " + ui.item.label + " aka " + ui.item.value );
	        
	      }
	    });
	$( "#dose2" ).autocomplete({
	      source: "./ajax/get_dose_list.php",
	      minLength: 1,
	      select: function( event, ui ) {
	    	  
	        console.log( "Selected: " + ui.item.label + " aka " + ui.item.value );
	      }
	    });    
	$( "#dose3" ).autocomplete({
	      source: "./ajax/get_dose_list.php",
	      minLength: 1,
	      select: function( event, ui ) {
	    	  
	        console.log( "Selected: " + ui.item.label + " aka " + ui.item.value );
	      }
	    });
	$( "#dose4" ).autocomplete({
	      source: "./ajax/get_dose_list.php",
	      minLength: 1,
	      select: function( event, ui ) {
	    	  
	        console.log( "Selected: " + ui.item.label + " aka " + ui.item.value );
	      }
	    });
	$( "#direction" ).autocomplete({
	      source: "./ajax/get_direction_list.php",
	      minLength: 1,
	      select: function( event, ui ) {
	    	  
	        console.log( "Selected: " + ui.item.label + " aka " + ui.item.value );
	      }
	 });
	 
	 $( "#timing" ).autocomplete({
	      source: "./ajax/get_timing_list.php",
	      minLength: 1,
	      select: function( event, ui ) {
	    	  
	        console.log( "Selected: " + ui.item.label + " aka " + ui.item.value );
	      }
	  });   
        
	  $( "#txtCI" ).autocomplete({
	      source: "./ajax/get_clinical_impression.php",
	      minLength: 1,
	      select: function( event, ui ) {
	    	  
	        console.log( "Selected: " + ui.item.label + " aka " + ui.item.value );
	      }
	  }); 
	  $( "#txtCFName" ).autocomplete({
	      source: "./ajax/get_patient_health_details.php",
	      minLength: 1,
	      select: function( event, ui ) {
	        //console.log( "Selected: " + ui.item.label + " aka " + ui.item.value );
	      }
	  }); 
	  $( "#tabs" ).tabs();
	  $("#search").click(function(){     
		  if(!$("#s_p_id").val() && !$("#s_p_name")){
			  
			  $("#search_alert").html("Enter either Patient name or Patient ID");
			  $("#search_alert").show();
		  } else {
          var url = "./ajax/searchPatient.php?mode=SEARCH_PATIENT&patient_id="+$("#s_p_id").val()+"&patient_name="+$("#s_p_name").val();
		  $.ajax({url: url, success: function(result){
		        $("#searchDiv").html(result);
		        $("#search_alert").hide();
		    }});
		  }
		  
		});
	  
	  $("#search").click(function(){     
		  if(!$("#s_p_id").val() && !$("#s_p_name").val() ){
			  
			  $("#search_alert").html("Enter either Patient name or Patient ID");
			  $("#search_alert").show();
		  } else {
          var url = "./ajax/searchPatient.php?mode=SEARCH_PATIENT&patient_id="+$("#s_p_id").val()+"&patient_name="+$("#s_p_name").val();
		  $.ajax({url: url, success: function(result){
		        $("#searchDiv").html(result);
		        $("#search_alert").hide();
		    }});
		  }
		  
		});
	  $("#add").click(function(){     
		  
		    var patient_name = document.getElementById("patient_name").value;
		    var sex = document.getElementById("sex").value;
		    var age = document.getElementById("age").value;
		    var cell = document.getElementById("cell").value;
		    
		    if(!$("#patient_name").val() || !$("#sex").val() || !$("#age").val() || !$("#cell").val() ){
		    	$("#search_alert_1").html("All fields are mandatory");
				  $("#search_alert_1").show();
				  $("#create_result").hide();
		    } else {
		    	var url = "./ajax/add_patient.php?patient_name="+$("#patient_name").val()+"&sex="+$("#sex").val()+"&age="+$("#age").val()+"&cell="+$("#cell").val();
		    	alert(url);
		    	$.ajax({url: url, success: function(result){
		    		$("#create_result").show();
		    		
		    		$("#create_result").html(result);
			        $("#search_alert_1").hide();
			        $('#doc_create_form').hide();
			    }});
		    	
		    }  
		});  
	  
	  	$("#add_by_recption").click(function(){
		  
		    var url = "./ajax/add_patient.php"; // the script where you handle the form input.
		    if(empty($("#fname").val()) || empty($("#lname").val()) || empty($("#gender").val()) || empty($("#theDate").val()) ){
		    	$("#search_alert_2").html("First Name, Last Name, Sex and DOB is mandatory");
		    	$("#search_alert_2").show();
		    	$("#create_r_result").hide();
		    	
		    } else {
		    	var url = "./ajax/add_patient.php"; // the script where you handle the form input.

			    
		    	//alert("Submitting the form");
			    $.ajax({
		           type: "POST",
		           url: url,
		           data: $("#create_rec_form").serialize(), // serializes the form's elements.
		           success: function(data)
		           {
		        	   $("#create_r_result").show();
			    		
			    		$("#create_r_result").html(data);
				        $("#search_alert_2").hide();
				        $('#create_rec_form').hide();
		        	   
		               
		           }
		         });
		    }
	  	});
	  	$("#add_by_user").click(function(){
			  
		    var url = "./ajax/add_user_record.php"; // the script where you handle the form input.
		    if(empty($("#fname").val()) || empty($("#lname").val()) || empty($("#gender").val()) || empty($("#theDate").val()) ){
		    	$("#search_alert_2").html("First Name, Last Name, Sex and DOB is mandatory");
		    	$("#search_alert_2").show();
		    	$("#create_r_result").hide();
		    	
		    } else {
		    	var url = "./ajax/add_user_record.php"; // the script where you handle the form input.

			    
		    	//alert("Submitting the form");
			    $.ajax({
		           type: "POST",
		           url: url,
		           data: $("#create_user_form").serialize(), // serializes the form's elements.
		           success: function(data)
		           {
		        	   $("#create_u_result").show();
			    		$("#create_u_result").html(data);
				        $("#search_alert_u").hide();
				        $('#create_user_form').hide();
		           }
		         });
		    }
	  	});
	  	
	  	
	  	$("#add_medicine_for_prescription").click(function(){
	  		//alert("Inside save result");

	  	  var medicine_name = document.getElementById("course").value;
	  	  //alert(medicine_name);
	  	  
	  	  var dose1 = document.getElementById("dose1").value;
	  	  
	  	  var dose1dir = getCheckedRadio("bfradio");
	  	  var dose2 = document.getElementById("dose2").value;
	  	  var dose2dir = getCheckedRadio("lradio");
	  	  var dose3 = document.getElementById("dose3").value;
	  	  //alert(dose3);
	  	  var dose3dir = getCheckedRadio("dradio");
	  	  var dose4 = document.getElementById("dose4").value;
	  	  
	  	  //alert(dose4);
	  	  var dose4dir = getCheckedRadio("bdradio");
	  	  //alert(dose4dir);
	  	  
	  	  var dosage = "";
	  	  
	  	  if(dose1dir != ""){
	  	      dosage = dosage +dose1+ " "+ dose1dir+" breakfast. ";
	  	  }
	  	  if(dose2dir != ""){
	  	      dosage = dosage +dose2+ " "+ dose2dir+" lunch. ";
	  	  }
	  	  if(dose3dir != ""){
	  	      dosage = dosage +dose3+ " "+ dose3dir+" dinner. ";
	  	  }
	  	  if(dose4dir != ""){
	  	      dosage = dosage +dose4+ " "+ dose4dir+" bedtime. ";
	  	  }
	  	  
	  	  //alert(dosage);
	  	 
	  	 
	  	  var patient_id = document.getElementById("patient_id").value;
	  	  var PRESCRIPTION_ID = document.getElementById("PRESCRIPTION_ID").value;
	  	  var VISIT_ID = document.getElementById('VISIT_ID').value;
	  	  var prescribe_medicine_id = document.getElementById('hidden_prescribed_medicine_id').value;
	  	  //alert(prescribe_medicine_id);
	  	  if(medicine_name == "" ){
	  		  alert("Name should not be Blank");
	  	          document.getElementById("course").focus();
	  		  return false;
	  	  }else if(dosage == ""){
	  		  alert("Dosage Should not be blank");
	  	          document.getElementById("dose1").focus();
	  		  return false;
	  	  }
	  	  
	  	 // alert(medicine_name + dose + direction + timing + patient_id);
	  	  //////////////////////////////////////
	  	  

	  		  if (window.XMLHttpRequest)
	  		  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  		  xmlhttp=new XMLHttpRequest();
	  		  }
	  		  else
	  		  {// code for IE6, IE5
	  		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  		  }
	  	  
	  		xmlhttp.onreadystatechange=function() {
	  		  if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	  		        document.getElementById("medicine").innerHTML=xmlhttp.responseText;
	  		      	
	  		        document.getElementById("course").value = "";
	  		        document.getElementById("dose1").value = "";
	  		        document.getElementById("dose2").value = "";
	  		        document.getElementById("dose3").value = "";
	  		        document.getElementById("dose4").value = "";
	  		        //Clear All Radio Button
	  		        clearAllRadioButton();
	  		        document.getElementById("course").focus();
	  		        
	  		    }
	  	  }
	  	  str = "ajax/livesearch.php?mode=ADD_MEDICINDE&medicine_name="+medicine_name+"&dose="
	  	            +dosage+"&patient_id="+patient_id+"&PRESCRIPTION_ID="
	  	            +PRESCRIPTION_ID+"&prescribe_medicine_id="+prescribe_medicine_id+"&VISIT_ID="+VISIT_ID+"&dose1="+dose1+"&dose2="+dose2+"&dose3="+dose3;
	  	  //alert(str);
	  	  //console.log(str);
	  	  
	  	  
	  	  
	  	  xmlhttp.open("GET",str,true);
	  	  xmlhttp.send();
	  	  
	  	  
	  	  return false;
	  	});
	  	
	  	$(".minus").click(function(event){
	  	    event.preventDefault();
	  	});
	  	$(".plus").click(function(event){
	  	    event.preventDefault();
	  	});
	  	$('#visit_list_table').DataTable( {
			"ajax": "ajax/tables.php?MODE=DAILY",
			dom: 'Bfrtip',
	        buttons: [
	            'copy', 'csv', 'excel', 'pdf', 'print'
	        ]
		} );
	  	$('#visit_list_table_monthly').DataTable( {
			"ajax": "ajax/tables.php?MODE=MONTHLY",
			dom: 'Bfrtip',
	        buttons: [
	            'copy', 'csv', 'excel', 'pdf', 'print'
	        ]
		} );
	  	$('#visit_list_all').DataTable( {
			"ajax": "ajax/tables.php?MODE=ALL_PATIENT",
			dom: 'Blfrtip',
	        buttons: [
	            'copy', 'csv', 'excel', 'pdf', 'print'
	        ]
		} );
	  	$('#docname').blur(function(){
	  		var input_name= $(this).val();
	  		var url = "ajax/generateuserName.php?username="+input_name;
	  		$.ajax({url: url, success: function(result){
		        $("#doc_user_id").val(result);
		        $("#degree").focus();
		    }});
	  	});
	  	
	  	//var check = $("#signup_doc_form").validate();
	  	
	  	$("#signup").click(function (){
	  		var url = "./ajax/add_doctor.php"; // the script where you handle the form input.
	  		//alert(check);
	  		
	  		$("#signup_doc_form").submit(function(e){
	  			$.ajax({
	 	           type: "POST",
	 	           url: url,
	 	           data: $("#signup_doc_form").serialize(), // serializes the form's elements.
	 	           success: function(data)
	 	           {
	 	        	   
	 	        	  //$myObj = JSON.parse(data)
 	        		  $('#signup_doc_form').hide();
 	        		  $("#signup_doc_form_result").show();
	 	        	  $("#signup_doc_form_result").html("Successfully created doctor record. Kindly login now. <a href='./index_login.php'>Login Here</a>");
	 	        	  
	 	        	   
	 			       //$("#signup_alert_2").hide();
	 			       //$('#signup_doc_form').hide();
	 	           }
	 	         });
	  			e.preventDefault();
	  		});
	  		
	  		
	  	});
	  	
	  	$("#update_doc_record").click(function (){
	  		//alert("update");
	  		var url = "./ajax/update_doctor.php"; // the script where you handle the form input.
	  		//alert(url);
	  		/*$("#update_doc_form1").submit(function(e){
	  			alert("form submitted");
	  			
	  			e.preventDefault();
	  		});*/
	  		var affiliation = CKEDITOR.instances['doctor_affiliation'].getData();
	  		var degree = CKEDITOR.instances['doctor_degree'].getData();
	  		//alert(affiliation);
	  		//alert(degree)
	  		$("#doctor_degree").val(degree);
	  		$("#doctor_affiliation").val(affiliation);
	  		
	  		//alert($("#doctor_affiliation").val());
	  		$.ajax({
	 	           type: "POST",
	 	           url: url,
	 	           data: $("#update_doc_form").serialize(), // serializes the form's elements.
	 	           success: function(data)
	 	           {
	 	        	   //alert(data);
	 	        	  //$myObj = JSON.parse(data)
	        		  //$('#update_doc_form').hide();
	        		  $("#update_doc_form_result").show();
	 	        	  $("#update_doc_form_result").html(data);
	 	        	  
	 	        	   
	 			       //$("#signup_alert_2").hide();
	 			       //$('#signup_doc_form').hide();
	 	           }
	 	         });
	  		
	  		
	  	});
	  	$("#add_chamber").click(function (){
	  		var url = "./ajax/add_chamber.php"; // the script where you handle the form input.
	  		//alert(check);
	  		$("#create_chamber_form").submit(function(e){
	  			$.ajax({
	 	           type: "POST",
	 	           url: url,
	 	           data: $("#create_chamber_form").serialize(), // serializes the form's elements.
	 	           success: function(data)
	 	           {
	 	        	   
	 	        	  var myObj = JSON.parse(data);
	 	        	  var chamber_name = myObj.chamber_name;
	 	        	  var status = myObj.status;
	 	        	  alert(status);
	 	        	  alert("Created Chamber ->"+chamber_name);
 	        		  $('#create_chamber_form').hide();
 	        		  $("#add_chamber_form_result").show();
	 	        	  $("#add_chamber_form_result").html("Chamber Created successfully.  <a href='./visit_list.php?chamber_name="+chamber_name+"' >Goto Visit</a>");
 	        		 //$("#add_chamber_form_result").html(myObj);
 	        		 
	 			       //$("#signup_alert_2").hide();
	 			       //$('#signup_doc_form').hide();
	 	           }
	 	         });
	  			e.preventDefault();
	  		});
	  		
	  		
	  	});
	  	
	  	$( "#dialog-form-edit-chambe" ).dialog({
	        autoOpen: false,
	        height: 400,
	        width: 350,
	        modal: true
	        
	      });
	  	
	  	$( "#accordion" ).accordion({
	        collapsible: true
	      });
	  	
	  	$(".link-edit-chamber").click(function(e){
	  		alert('edit link is cliked');
	  		$( "#dialog-form-edit-chambe" ).dialog("Open");
	  		e.preventDefault();
	  	});
	  	$("#theDate").datepicker({
	  		changeMonth: true,
	        changeYear: true,
	        yearRange: "-99:+0"
	  	});
});

function removeVisit(visit_id){
	  
	  var url = "ajax/removevisit.php?mode=REMOVE_VISIT&VISIT_ID="+visit_id;
	  
	  $.ajax({url: url, success: function(result){
		  alert("Updated");
		 // $("#visit_list_body").html(result);
	    }});
}

function addClinicalImpression(prescriptionid){
	
    var citype = document.getElementById("txtCI").value;
    
    var url = "ajax/add_clinical_impression.php?mode=ADD_CLINICAL_IMPRESSION&TYPE="+citype+"&prescription_id="+prescriptionid;
    
    if(citype == "" || citype == null)
    {
        alert ("Clinical Impression cannot be blank")
    } else {

        
        $.ajax({url: url, success: function(result){
  		  
        	$("#CI").html(result);
        	$("#txtCI").val("");
        	$("#txtCI").focus();
  	    }});
    }
    document.getElementById("txtCI").focus();
    return false;
}

function deleteClinicalImpression(ci_id, pres_id){
   
    var url = "ajax/delete_clinical_impression.php?mode=DELETE_CLINICAL_IMPRESSION&ID="+ci_id+"&PRESCRIPTION_ID="+pres_id;        
    $.ajax({url: url, success: function(result){
		  
    	$("#CI").html(result);
    }});
  
    return false;
}

function addCF(visit_id){
    //alert("visit_id -> "+visit_id);
    //alert("Prescription Id -> "+prescriptionid);
    var cfname = document.getElementById("txtCFName").value;
    var cfvalue = document.getElementById("txtCFValue").value;
    //alert("TYPE ->"+ citype);
    if(cfname == "" || cfname == null) {
        alert ("C/F Name cannot be blank")
    } else if(cfvalue == "" || cfvalue == null)  {
        alert ("C/F Value cannot be blank")
    }else {
        if(cfvalue == '+'){
            cfvalue = 'PLUS';
        }
        
        var url = "ajax/add_cf.php?mode=ADD_CF&cfname="+cfname+"&cfvalue="+cfvalue+"&visit_id="+visit_id;
        
        $.ajax({url: url, success: function(result){
  		  
        	$("#CF").html(result);
        	$("#txtCFName").val("");
        	$("#txtCFValue").val("");
        	$("#txtCFName").focus();
        }});

       
    }
    document.getElementById("txtCFName").focus();
    return false;
}

function updateDeleteCF(cf_id, visit_id, mode){
    //alert("ID -> "+ci_id);
    //alert("Prescription Id -> "+pres_id);
    //alert(thisObj.parentNode.parentNode.childNodes[0].innerText);
    
    var cfvalue = document.getElementById("CF_"+cf_id).value;
    //alert(cf_id +" "+visit_id+"  "+mode);
    //alert(cfvalue);
    if(cfvalue == "" || cfvalue == null)  {
        alert ("C/F Value cannot be blank")
    } else {
        if(cfvalue == '+'){
            cfvalue = 'PLUS';
        }
       
        var url = "ajax/delete_cf.php?ID="+cf_id+"&visit_id="+visit_id+"&mode="+mode+"&cfvalue="+cfvalue;

        $.ajax({url: url, success: function(result){
    		  
        	$("#CF").html(result);
        }});
    }
    return false;
}

function del(k,pid){
	//alert("Medicine ID="+k);
    //alert("pRESCRIPTION id = "+pid);
 

	var url = "ajax/delete_precribed_medicine.php?mode=DELETE_MEDICINE&MEDICINE_ID="+k+"&PRES_ID="+pid;
	//alert(url);
	$.ajax({url: url, success: function(result){
		//alert(result);
    	$("#medicine").html(result);
    	document.getElementById("course").focus();
    }});
	

  return false;
  
}

function empty( val ) {

    // test results
    //---------------
    // []        true, empty array
    // {}        true, empty object
    // null      true
    // undefined true
    // ""        true, empty string
    // ''        true, empty string
    // 0         false, number
    // true      false, boolean
    // false     false, boolean
    // Date      false
    // function  false

        if (val === undefined)
        return true;

    if (typeof (val) == 'function' || typeof (val) == 'number' || typeof (val) == 'boolean' || Object.prototype.toString.call(val) === '[object Date]')
        return false;

    if (val == null || val.length === 0)        // null or 0 length array
        return true;

    if (typeof (val) == "object") {
        // empty object

        var r = true;

        for (var f in val)
            r = false;

        return r;
    }

    return false;
}

function getCheckedRadio(elementName) {
    var radioButtons = document.getElementsByName(elementName);
    var result = "";
    for (var x = 0; x < radioButtons.length; x ++) {
        if (radioButtons[x].checked) {
            result = radioButtons[x].value;
        }
    }
    return result;
}

function clearAllRadioButton(){
    clearRadioButtonGroup("bfradio");
    
    
 
    clearRadioButtonGroup("lradio");
    
    
    clearRadioButtonGroup("dradio");
    
   return false;
}
function clearRadioButtonGroup(elementName){
    var radioButtons = document.getElementsByName(elementName); 
    
    for (var x = 0; x < radioButtons.length; x ++) {
        radioButtons[x].checked = false;
    }
    
    return false;
}
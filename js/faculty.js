/* THIS IS A CUSTOM JAVASCRIPT FILE */



$(document).ready(function(){
	
  	$("#add_by_faculty_addr").click(function(){
		  
	    var url = "./ajax/add_faculty_addr_row.php"; // the script where you handle the form input.
	    if(empty($("#addr").val()) || empty($("#state").val()) || empty($("#addr2").val()) || empty($("#pincode").val()) ){
	    	$("#search_alert_2").html("Address Line 1, Address Line 2, State and Pincode is mandatory");
	    	$("#search_alert_2").show();
	    	$("#create_r_result").hide();
	    	
	    } else {
	    	var url = "./ajax/add_faculty_addr_row.php"; // the script where you handle the form input.

		    
	    	//alert("Submitting the form");
		    $.ajax({
	           type: "POST",
	           url: url,
	           data: $("#create_faculty_addr_form").serialize(), // serializes the form's elements.
	           success: function(data)
	           {
	        	   $("#create_u_result").show();
		    		$("#create_u_result").html(data);
			        $("#search_alert_u").hide();
			        $('#create_faculty_addr_form').hide();
	           }
	         });
	    }
  	});	  	
  	
  	$("#add_by_faculty_edu").click(function(){
		  
	    var url = "./ajax/add_faculty_edu.php"; // the script where you handle the form input.
	    if(empty($("#board").val()) || empty($("#lvl").val()) || empty($("#inst").val()) || empty($("#indx").val()) || empty($("#roll").val()) ){
	    	$("#edu_alert_2").html("Board, Level, Institution, Roll and Index is mandatory");
	    	$("#edu_alert_2").show();
	    	$("#create_edu_result").hide();
	    	
	    } else {
	    	var url = "./ajax/add_faculty_edu_row.php"; // the script where you handle the form input.

		    
	    	//alert("Submitting the form");
		    $.ajax({
	           type: "POST",
	           url: url,
	           data: $("#create_faculty_edu_form").serialize(), // serializes the form's elements.
	           success: function(data)
	           {
	        	   $("#create_edu_result").show();
		    		$("#create_edu_result").html(data);
			        $("#edu_alert_2").hide();
			        $('#create_faculty_edu_form').hide();
	           }
	         });
	    }
  	});

  	$("#add_by_faculty_mobile").click(function(){
			  
		//    var url = "./ajax/add_faculty_mobile_row.php"; // the script where you handle the form input.
		    if(empty($("#mobile").val()) || empty($("#faculty_id").val()) ){
		    	$("#mobile_alert_2").html("Mobile No is mandatory");
		    	$("#mobile_alert_2").show();
		    	$("#create_mobile_result").hide();
		    	
		    } else {
		    	var url = "./ajax/add_faculty_mobile_row.php"; // the script where you handle the form input.

			    
		    	//alert("Submitting the form");
			    $.ajax({
		           type: "POST",
		           url: url,
		           data: $("#create_faculty_mobile_form").serialize(), // serializes the form's elements.
		           success: function(data)
		           {
		        	   $("#create_mobile_result").html(data);
		        	   $("#create_mobile_result").show();
		        	   $("#moile_alert_2").hide();
				       $('#create_faculty_mobile_form').hide();
		           }
		         });
		    }
	  	});	  	

  	
  	$("#add_by_faculty_email").click(function(){
		  
		//    var url = "./ajax/add_faculty_mobile_row.php"; // the script where you handle the form input.
		    if(empty($("#email").val()) || empty($("#faculty_id").val()) ){
		    	$("#email_alert_2").html("Email Address is mandatory");
		    	$("#email_alert_2").show();
		    	$("#create_email_result").hide();
		    	
		    } else {
		    	var url = "./ajax/add_faculty_email_row.php"; // the script where you handle the form input.

			    
		    	//alert("Submitting the form");
			    $.ajax({
		           type: "POST",
		           url: url,
		           data: $("#create_faculty_email_form").serialize(), // serializes the form's elements.
		           success: function(data)
		           {
		        	   $("#create_email_result").html(data);
		        	   $("#create_email_result").show();
		        	   $("#email_alert_2").hide();
				       $('#create_faculty_email_form').hide();
		           }
		         });
		    }
	  	});
  	
  	$("#add_by_faculty_ph").click(function(){
		  
		//    var url = "./ajax/add_faculty_mobile_row.php"; // the script where you handle the form input.
		    if(empty($("#std_code").val()) || empty($("#ph_num").val()) ){
		    	$("#phone_alert_2").html("STD Code, Phone No is mandatory");
		    	$("#phone_alert_2").show();
		    	$("#create_phone_result").hide();
		    	
		    } else {
		    	var url = "./ajax/add_faculty_ph_row.php"; // the script where you handle the form input.

			    
		    	//alert("Submitting the form");
			    $.ajax({
		           type: "POST",
		           url: url,
		           data: $("#create_faculty_ph_form").serialize(), // serializes the form's elements.
		           success: function(data)
		           {
		        	   $("#create_phone_result").html(data);
		        	   $("#create_phone_result").show();
		        	   $("#phone_alert_2").hide();
				       $('#create_faculty_ph_form').hide();
		           }
		         });
		    }
	  	});
	  	
});

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

    if (typeof (val) == 'function' || typeof (val) == 'number' || typeof (val) == 'boolean' || Object.prototype.toString.call(val) == '[object Date]')
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

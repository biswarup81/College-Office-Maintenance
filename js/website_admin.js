/* THIS IS A CUSTOM JAVASCRIPT FILE */


$(document).ready(function(){
	
	
	  	$("#web_admin_add").click(function(){
			  alert($("#content").val());
		    
		    if(empty($("#content").val()) || ($("#page_id").val() == '0') ){
		    	$("#search_alert_u").html("All Values are mandatory");
		    	$("#search_alert_u").show();
		    	$("#create_u_result").hide();
		    	
		    } else {
		    	var url = "./ajax/modify_website_content.php"; // the script where you handle the form input.

			    //var page_id = $("#page_id").val();
			   // var content ;
		    	//alert("Submitting the form");
			    $.ajax({
		           type: "POST",
		           url: url,
		           data: {
		        	   "page_id": $("#page_id").val(),
		        	   "content" : $("#content").val(),
		        	   "name" : $("#content_name").val()
		           },
		           success: function(data)
		           {
		        	   $("#create_u_result").show();
			    		$("#create_u_result").html(data);
				        $("#search_alert_u").hide();
				       // $('#web_content_form').hide();
		           }
		         });
		    }
	  	});	  	
	  	$("#page_id").change(function(){
	  		alert($(this).val());
	  		var page_id = $(this).val();
	  		if(page_id > 0){
	  			var url = "./ajax/get_website_content.php"; // the script where you handle the form input.

			    var page_id = $("#page_id").val();
			    var content 
		    	//alert("Submitting the form");
			    $.ajax({
		           type: "POST",
		           url: url,
		           data: {
		        	   page_id: $("#page_id").val(),
		        	   
		           },
		           success: function(data)
		           {
		        	   alert(data);
		        	   $("#view_content").text(data);
		        	   $("#view_content").show();
		        	   CKEDITOR.replace( 'content' );
		           }
		         });
	  		}
	  		
	  	});
	  	$("#theDOB").datepicker({
	  		changeMonth: true,
	        changeYear: true,
	        yearRange: "-99:+1"
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

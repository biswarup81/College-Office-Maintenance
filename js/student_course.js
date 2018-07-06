/* THIS IS A CUSTOM JAVASCRIPT FILE */

$(document).ready(function(){
	
  	$("#link_student_course").click(function(){
		  

	    if(empty($("#course").val()) || empty($("#esession").val()) || empty($("#student_id").val()) ){
	    	$("#search_alert_2").html("Course and Session is mandatory");
	    	$("#search_alert_2").show();
	    	$("#link_course_result").hide();
	    	
	    } else {
	    	var url = "./ajax/link_student_course_row.php"; // the script where you handle the form input.

		    
	    	//alert("Submitting the form");
		    $.ajax({
	           type: "POST",
	           url: url,
	           data: $("#link_student_course_form").serialize(), // serializes the form's elements.
	           success: function(data)
	           {
	        	   $("#link_course_result").show();
		    		$("#link_course_result").html(data);
			        $("#search_alert_2").hide();
			        $('#link_student_course_form').hide();
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

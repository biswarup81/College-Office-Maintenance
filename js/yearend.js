/* THIS IS A CUSTOM JAVASCRIPT FILE */



$(document).ready(function(){
	
	
	  	$("#list_student").click(function(){
			  
		    if(empty($("#course").val()) ){
		    	$("#list_u_result").html("Chose Course");
		    	$("#list_u_result").show();
		    			    	
		    } else {
		    	$("#list_u_result").html("Chosen Course");
		    	$("#list_u_result").show();
		    }
	  	});	  	
	  	
	  	$("#pass_submit").click(function(){
			  
		    if(true){
		    	$("#pass_fail_result").html($("#formDoor[]"));
		    	$("#year_end_form_b_course").hide();
		    	$("#pass_fail_result").show();
		    	
		    			    	
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

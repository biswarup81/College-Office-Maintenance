/* THIS IS A CUSTOM JAVASCRIPT FILE */

$(document).ready(function() {

	$("#search_student").click(function() {

		if (empty($("#student_id").val()) ) {
			$("#search_alert_2").html("Enter Student Id");
			$("#search_alert_2").show();
			$("#create_u_result").show();

		} 
		else {

			var url = "./ajax/search_student_record.php"; // the script where you handle the form input.

			//alert("Submitting the form");
			$.ajax({
				type : "POST",
				url : url,
				data : $("#search_student_form").serialize(), // serializes the form's elements.
				success : function(data) {
					$("#create_u_result").html(data);
					$("#create_u_result").show();
					$("#search_alert_2").hide();
					
				}
			});
		}
	});

	$("#thePayDate").datepicker({
		changeMonth : true,
		changeYear : true,
		yearRange : "-1:+1"
	});

});

function empty(val) {

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

	if (typeof (val) == 'function' || typeof (val) == 'number'
			|| typeof (val) == 'boolean'
			|| Object.prototype.toString.call(val) == '[object Date]')
		return false;

	if (val == null || val.length === 0) // null or 0 length array
		return true;

	if (typeof (val) == "object") {
		// empty object

		var r = true;

		for ( var f in val)
			r = false;

		return r;
	}

	return false;
}
function eq(inv, pay) {

	// test results
	//---------------
	// []        true, empty array
	if (pay == 0)
		return true;
	
	if (inv == pay)
		return false;
	else
		return true;
}

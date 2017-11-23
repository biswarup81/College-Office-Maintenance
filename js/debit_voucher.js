/* THIS IS A CUSTOM JAVASCRIPT FILE */



$(document).ready(function(){
	
	
	$("#fname").autocomplete({
	      source: "./ajax/get_staff_customer_list.php",
	      minLength: 1,
	      select: function( event, ui ) {
	    	  
	        console.log( "Selected: " + ui.item.label + " aka " + ui.item.value  +" id = " +ui.item.id);
	        /*$("#upper_range_div").show(); */
	      }
	});
	
	$("#vedor_search").click(function(){
		
		var url = "./ajax/get_staff_customer_list.php?MODE=ALL_RECORDS&name="+$("#fname").val() ;
		//alert(url);
		  $.ajax({url: url, success: function(result){
			  $("#vendor_result").show();  
			  //alert(result);
			  $("#vendor_result").html(result);
			  $("#vendor_payment").hide();
				$("#payment_u_result").hide();
		    }});
	});
	
	$("#vedor_pay").click(function(){
		var url = "./ajax/vendor_payment.php"; // the script where you handle the form input.

	    
    	alert("Submitting the form");
	    $.ajax({
           type: "POST",
           url: url,
           data: $("#payment_form").serialize(), // serializes the form's elements.
           success: function(data)
           {
        	   
        	    $("#payment_u_result").html(data);
       			$("#payment_u_result").show();
       			alert(data);
           }
         });

	});
	
	
	
});

function getDetails(id){
	
	//$("input[name='vendor_id_selector']:checked").prop("checked",false);
	//alert(id);
	$("#hidden_vendor_id").val(id);
	alert($("#hidden_vendor_id").val());
	$("#vendor_payment").show();
}
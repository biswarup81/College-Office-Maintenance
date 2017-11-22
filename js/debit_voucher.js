/* THIS IS A CUSTOM JAVASCRIPT FILE */



$(document).ready(function(){
	
	
	$("#fname").autocomplete({
	      source: "./ajax/get_staff_customer_list.php",
	      minLength: 1,
	      select: function( event, ui ) {
	    	  
	        console.log( "Selected: " + ui.item.label + " aka " + ui.item.value );
	        /*$("#upper_range_div").show(); */
	      }
	});
	
	$("#vedor_search").click(function(){
		//alert('Clicked');
		$("#vendor_payment").hide();
		$("#payment_u_result").hide();
		$("#vendor_result").show();
	});
	
	$("#vedor_pay").click(function(){
		$("#payment_u_result").html("Payment successful");
		$("#payment_u_result").show();
	});
	
});

function getDetails(name){
	//alert(name);
	$("#vendor_payment").show();
}
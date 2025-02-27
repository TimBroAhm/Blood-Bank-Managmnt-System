$(function()
{

$("#distancee_error").hide();
$("#tarif_error").hide();
  
  var dista=false;
  var tariff=false;
  
$("#distancee").focusout(function(){
check_distance();
});

$("#tarif").focusout(function(){
check_tarif();
});

	function check_distance()
	{
		var quali=$("#distancee").val();
		var pattern = /^[1-9][0-9]*$/;
		if(quali=="")
		{
			dista=true;
		$("#distancee_error").html("please fill this field");
		$("#distancee_error").show(); 
		$("#distancee").css("border-bottom","1px solid red");	
		$("#distancee_error").css("color","red");
		}
		else 
		if(pattern.test(quali)=="")
	{
	     dista=true;
			$("#distancee_error").html("please enter  valid character");
			$("#distancee_error").show();
			$("#distancee").css("border-bottom","2px solid red");
			$("#distancee_error").css("color","red");
	}
		else
		{
			 dista=false;
		$("#distancee").css("border-bottom","2px solid green");
		$("#distancee_error").hide(); 	
		}
	}
	function check_tarif()
	{
		var kebe=$("#tarif").val();
		var pattern = /^[1-9][0-9]*$/;
		if(kebe=="")
		{
			tariff=true;
		$("#tarif_error").html("please fill this field");
		$("#tarif_error").show(); 
		$("#tarif").css("border-bottom","1px solid red");	
		$("#tarif_error").css("color","red");
		}
		else 
		if(pattern.test(kebe)=="")
	{
	     tariff=true;
			$("#tarif_error").html("please enter  valid character");
			$("#tarif_error").show();
			$("#tarif").css("border-bottom","2px solid red");
			$("#tarif_error").css("color","red");
	}
		else
		{
			tariff=false;
		$("#tarif").css("border-bottom","2px solid green");
		$("#tarif_error").hide(); 	
		}
	}
	$("#cform").submit(function(){
	
	dista=false;
	tariff=false;
	check_distance();
	check_tarif();
	
	if(  dista===false && tariff===false)
	 {
		   return true;
	   }
	   else{
		   return false;
	   }
	   });
});
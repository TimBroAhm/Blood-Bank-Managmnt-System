$(function()
{
$("#from_error").hide();
$("#to_error").hide();
$("#distancee_error").hide();
$("#tarif_error").hide();
  
  var fo=false;
  var too=false;
  var dista=false;
  var tariff=false;

$("#from").focusout(function(){
check_from();
});
$("#to").focusout(function(){
check_to();
});
$("#distancee").focusout(function(){
check_distance();
});

$("#tarif").focusout(function(){
check_tarif();
});

	function check_from()
	{
		var fn=$("#from").val();
		var len=$("#from").val().length;
		var pattern = /^[a-zA-Z_ ]*$/;
		if(fn=="")
		{
			fo=true;
		$("#from_error").html("please fill this field");
		$("#from_error").show(); 
		$("#from").css("border-bottom","1px solid red");	
		$("#from_error").css("color","red");
		}
		else if(pattern.test(fn)=="")
	    {  
             fo=true;
			$("#from_error").html("please enter valid character");
			$("#from_error").show();
			$("#from").css("border-bottom","2px solid red");
			$("#from_error").css("color","red");
		}
		else
		{
			fo=false;
		$("#from").css("border-bottom","2px solid green");
		$("#from_error").hide(); 	
		}
	}
	function check_to()
	{
		var ph=$("#to").val();
		var len=$("#to").val().length;
        var pattern = /^[a-zA-Z_ ]*$/;
		if(ph=="")
		{
			too=true;
		$("#to_error").html("please fill this field");
		$("#to_error").show(); 
		$("#to").css("border-bottom","1px solid red");	
		$("#to_error").css("color","red");
		}
		else 
		if(pattern.test(ph)=="")
	{
	     too=true;
			$("#to_error").html("please enter  valid character");
			$("#to_error").show();
			$("#to").css("border-bottom","2px solid red");
			$("#to_error").css("color","red");
	}
	else
		{
			too= false;
		$("#to").css("border-bottom","2px solid green");
		$("#to_error").hide(); 	
		}
	}
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

	fo=false;
	too= false;
	dista=false;
	tariff=false;
	check_from();
	check_to();
	check_distance();
	check_tarif();
	
	if( fo===false && too===false && dista===false && tariff===false)
	 {
		   return true;
	   }
	   else{
		   return false;
	   }
	   });
});
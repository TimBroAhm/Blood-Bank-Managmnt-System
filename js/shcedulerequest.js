$(function()
{
$("#from_error").hide();
$("#to_error").hide();
$("#user_error").hide();
var us=false;
var fo=false;
var too=false;

$("#user").focusout(function(){
check_user();
});
$("#from").focusout(function(){
check_from();
});
$("#to").focusout(function(){
check_to();
});
function check_user()
	{
		var ln=$("#user").val();
		
		if(ln=="please choose")
		{
			us=true;
		$("#user_error").html("please fill this field");
		$("#user_error").show(); 
		$("#user").css("border-bottom","1px solid red");	
		$("#user_error").css("color","red");
		}
		else
		{
			us=false;
		$("#user").css("border-bottom","2px solid green");
		$("#user_error").hide(); 	
		}
	}
function check_from()
	{
		var fn=$("#from").val();
		var len=$("#from").val().length;
		var pattern = /^[A-Z][a-z]*$/;
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
			$("#from_error").html("please enter number only");
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
		var le=$("#to").val();
		var pattern = /^[A-Z][a-z]*$/;
		
		if(le=="")
		{
			to=true;
		$("#to_error").html("please fill this field");
		$("#to_error").show(); 
		$("#to").css("border-bottom","1px solid red");	
		$("#to_error").css("color","red");
		}
		else if(pattern.test(le)=="")
	    {  
             to=true;
			$("#to_error").html("please enter valid character");
			$("#to_error").show();
			$("#to").css("border-bottom","2px solid red");
			$("#to_error").css("color","red");
		}
		else
		{
			to=false;
		$("#to").css("border-bottom","2px solid green");
		$("#to_error").hide(); 	
		}
	}
	
		$("#cform").submit(function(){
	        us=false;
	        fo=false;
			to=false;
			check_user();
            check_from();
			check_to();
			if(fo===false && to===false && us===false) 
			{
		   return true;
	   }
	   else{
		   return false;
	   }
	   });
});
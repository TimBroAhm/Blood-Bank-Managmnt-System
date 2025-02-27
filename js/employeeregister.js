$(function()
{
 $("#fname_error").hide();
 $("#mname_error").hide();
 $("#lname_error").hide();
 $("#sex_error").hide();
 $("#phone_error").hide();
 $("#kebele_error").hide();
 $("#qualif_error").hide();
 $("#role_error").hide();
 
 var firstname=false;
 var midname=false;
 var lastname=false;
 var sexxx=false;
 var phone=false;
 var keb=false;
 var qual=false;
 var ro=false;
 
 $("#fname").focusout(function(){
check_fname();
});
$("#mname").focusout(function(){
check_mname();
});
$("#lname").focusout(function(){
check_lname();
});
$("#sexx").focusout(function(){
check_sex();
});
$("#phon").focusout(function(){
check_phone();
});
$("#kebel").focusout(function(){
check_kebele();
});
$("#qualif").focusout(function(){
check_qualif();
});
$("#rol").focusout(function(){
check_role();
});
function check_fname()
	{
		var fn=$("#fname").val();
		var len=$("#fname").val().length;
		var pattern = /^[A-Z][a-z]*$/;
		if(fn == "")
		{
			firstname==true;
		$("#fname_error").html("please fill this field");
		$("#fname_error").show(); 
		$("#fname").css("border-bottom","1px solid red");	
		$("#fname_error").css("color","red");
		}
		else if(len < 2 || len > 25)
		{
		  firstname=true;
			$("#fname_error").html("please enter betwwen 2-25 character");
			$("#fname_error").show();
			$("#fname").css("border-bottom","2px solid red");
			$("#fname_error").css("color","red");
		}
		else if(pattern.test(fn) == "")
	    {  
             firstname=true;
			$("#fname_error").html("please enter valid character");
			$("#fname_error").show();
			$("#fname").css("border-bottom","2px solid red");
			$("#fname_error").css("color","red");
		}
		else
		{
		firstname=false;
		$("#fname").css("border-bottom","2px solid green");
		$("#fname_error").hide(); 	
		}
	}
	function check_mname()
	{
		var mn=$("#mname").val();
		var len=$("#mname").val().length;
		var pattern = /^[A-Z][a-z]*$/;
		if(mn == "")
		{
			midname==true;
		$("#mname_error").html("please fill this field");
		$("#mname_error").show(); 
		$("#mname").css("border-bottom","1px solid red");	
		$("#mname_error").css("color","red");
		}
		else if(len < 2 || len > 25)
		{
		  midname=true;
			$("#mname_error").html("please enter betwwen 2-25 character");
			$("#mname_error").show();
			$("#mname").css("border-bottom","2px solid red");
			$("#mname_error").css("color","red");
		}
		else if(pattern.test(mn) == "")
	    {  
             midname=true;
			$("#mname_error").html("please enter valid character");
			$("#mname_error").show();
			$("#mname").css("border-bottom","2px solid red");
			$("#mname_error").css("color","red");
		}
		else
		{
			midname=false;
		$("#mname").css("border-bottom","2px solid green");
		$("#mname_error").hide(); 	
		}
	}
	function check_lname()
	{
		var ln=$("#lname").val();
		var len=$("#lname").val().length;
		var pattern = /^[A-Z][a-z]*$/;
		if(ln == "")
		{
			lastname==true;
		$("#lname_error").html("please fill this field");
		$("#lname_error").show(); 
		$("#lname").css("border-bottom","1px solid red");	
		$("#lname_error").css("color","red");
		}
		else if(len < 2 || len > 25)
		{
		  lastname=true;
			$("#lname_error").html("please enter betwwen 2-25 character");
			$("#lname_error").show();
			$("#lname").css("border-bottom","2px solid red");
			$("#lname_error").css("color","red");
		}
		else if(pattern.test(ln) == "")
	    {  
             lastname=true;
			$("#lname_error").html("please enter valid character");
			$("#lname_error").show();
			$("#lname").css("border-bottom","2px solid red");
			$("#lname_error").css("color","red");
		}
		else
		{
			lastname=false;
		$("#lname").css("border-bottom","2px solid green");
		$("#lname_error").hide(); 	
		}
	}
	
	function check_sex()
	{
		var se=$("#sexx").val();
		if(se=="please choose")
		{
			sexxx=true;
			$("#sex_error").html("please selected");
			$("#sex_error").show();
			$("#sexx").css("border-bottom","1px solid red");
			$("#sexx").css("width","170px");
			$("#sex_error").css("color","red");
		}
		else 
		{
			sexxx=false;
			$("#sexx").css("border-bottom","1px solid green");
			$("#sex_error").hide();
		}
	} 
	function check_phone()
	{
		var ph=$("#phon").val();
		var len=$("#phon").val().length;
        var pattern = /^[+][2][5][1][0-9]*$/;
		if(ph == "")
		{
		phone==true;
		$("#phone_error").html("please fill this field");
		$("#phone_error").show(); 
		$("#phon").css("border-bottom","1px solid red");	
		$("#phone_error").css("color","red");
		}
		else 
		if(pattern.test(ph) == "")
	{
	     phone==true;
			$("#phone_error").html("Phone number must be start +251");
			$("#phone_error").show();
			$("#phon").css("border-bottom","2px solid red");
			$("#phone_error").css("color","red");
	}
	else
	   if(len < 13 || len >13)
	   {
		   phone= true;
	   $("#phone_error").html("&nbsp; please enter 13 digit");
	   $("#phone_error").show();
	   $("#phon").css("border-bottom","2px solid red");
	   }
		else
		{
			phone= false;
		$("#phon").css("border-bottom","2px solid green");
		$("#phone_error").hide(); 	
		}
	}
	function check_kebele()
	{
		var kebe=$("#kebel").val();
		if(kebe == "")
		{
			keb==true;
		$("#kebele_error").html("please fill this field");
		$("#kebele_error").show(); 
		$("#kebel").css("border-bottom","1px solid red");	
		$("#kebele_error").css("color","red");
		}
		else
		{
			keb==false;
		$("#kebel").css("border-bottom","2px solid green");
		$("#kebele_error").hide(); 	
		}
	}
	function check_qualif()
	{
		var quali=$("#qualif").val();
		var len=$("#qualif").val().length;
		var pattern = /^[A-Z][a-z]*$/;
		if(quali == "")
		{
			qual==true;
		$("#qualif_error").html("please fill this field");
		$("#qualif_error").show(); 
		$("#qualif").css("border-bottom","1px solid red");	
		$("#qualif_error").css("color","red");
		}
		else if(len < 3 || len > 25)
		{
		  qual=true;
			$("#qualif_error").html("please enter betwwen 3-25 character");
			$("#qualif_error").show();
			$("#qualif").css("border-bottom","2px solid red");
			$("#qualif_error").css("color","red");
		}
		else if(pattern.test(quali) == "")
	    {  
             qual=true;
			$("#qualif_error").html("please enter valid character");
			$("#qualif_error").show();
			$("#qualif").css("border-bottom","2px solid red");
			$("#qualif_error").css("color","red");
		}
		else
			
		{
			 qual=false;
		$("#qualif").css("border-bottom","2px solid green");
		$("#qualif_error").hide(); 	
		}
	}
	function check_role()
	{
		var r=$("#rol").val();
		if(r=="-Select Role-")
		{
			ro=true;
			$("#role_error").html("please select");
			$("#role_error").show();
			$("#rol").css("border-bottom","1px solid red");
			$("#rol").css("width","170px");
			$("#role_error").css("color","red");
		}
		else 
		{
			ro=false;
			$("#rol").css("border-bottom","1px solid green");
			$("#role_error").hide();
		}
	} 
	$("#employeeregistration").submit(function(){
		firstname=false;
		midname=false;
		lastname=false;
		sexxx=false;
		phone=false;
		keb=false;
		qual=false;
		ro=false;
		check_fname();
		check_mname();
		check_lname();
		check_sex();
		check_phone();
		check_kebele();
		check_qualif();
		check_role();
		if(firstname==false && midname==false && lastname==false && sexxx==false && phone==false && keb==false && qual==false && ro==false)
	   {
		   return true;
	   }
	   else{
		   return false;
	   }
	   });


});
		
		
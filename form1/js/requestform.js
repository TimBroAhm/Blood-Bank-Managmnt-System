$(function(){
	$("#fname_error").hide();
	$("#fathername_error").hide();
	$("#grandfather_error").hide();
	$("#phone_error").hide();
	$("#kebele_error").hide();
	$("#request_error").hide();
	$("#level_error").hide();
    $("#olicence_error").hide();
	$("#blicence_error").hide();
	$("#Ilicence_error").hide();

	$("#bordno_error").hide();
	var fnam=false;
	var fathername=false;
	var grandfathername=false;
	var phone=false;
	var keb=false;
	var reque=false;
	var lev=false;
	var olice=false;
	var blice=false;
	var Ilice=false;
	
	var bor=false;
	
	$("#fn").focusout(function(){
		check_fname();
	});
	$("#mn").focusout(function(){
		check_fathername();
	});
	$("#ln").focusout(function(){
		check_grandfathername();
	});
	$("#phon").focusout(function(){
		check_phone();
	});
	$("#kebel").focusout(function(){
		check_kebele();
	});
	$("#request").focusout(function(){
		check_request();
	});
	$("#level").focusout(function(){
		check_level();
	});
	$("#operator").focusout(function(){
		check_operatorolicence();
	});
	$("#business").focusout(function(){
		check_businesslicence();
	});
	$("#insurance").focusout(function(){
		check_insurancelicence();
	});
	
	$("#bord").focusout(function(){
		check_bordno();
	});
	function check_fname()
	{
		var fname=$("#fn").val();
		var len=$("#fn").val().length;
		var pattern = /[a-z]*$/;
		if(fname=="")
		{
			fnam=true;
			$("#fname_error").html("please fill form");
			$("#fname_error").show();
			$("#fn").css("border-bottom","1px solid red");
		}
		 else if(len < 2 || len > 25)
		{
		  fnam=true;
			$("#fname_error").html("please enter betwwen 2-25 character");
			$("#fname_error").show();
			$("#fn").css("border-bottom","2px solid red");
		}
		else 
		if(pattern.test(fname) == "")
	  {
	    fnam=true;
			$("#fname_error").html("first character must be capital and charcter only");
			$("#fname_error").show();
			$("#fn").css("border-bottom","2px solid red");
	  }
		else 
			
		{
		fname=false;
			$("#fn").css("border-bottom","1px solid green");
			$("#fname_error").hide();
		}
	}
	function check_fathername()
	{
		var mname=$("#mn").val();
		var len=$("#mn").val().length;
		var pattern = /^[A-Z][a-z]*$/;
		if(mname=="")
		{
			fathername=true;
			$("#fathername_error").html("please fill form");
			$("#fathername_error").show();
			$("#mn").css("border-bottom","1px solid red");
		}
		 else if(len < 2 || len > 15)
		{
		  fathername=true;
			$("#fathername_error").html("please enter between 2-15 character");
			$("#fathername_error").show();
			$("#mn").css("border-bottom","2px solid red");
		}
		else 
		if(pattern.test(mname) == "")
	  {
	    fathername=true;
			$("#fathername_error").html("first character must be capital and character only");
			$("#fathername_error").show();
			$("#mn").css("border-bottom","2px solid red");
	  }
		else 
			
		{
		fathername=false;
			$("#mn").css("border-bottom","1px solid green");
			$("#fathername_error").hide();
		}
	}
	function check_grandfathername()
	{
		var lname=$("#ln").val();
		var len=$("#ln").val().length;
		var pattern = /^[A-Z][a-z]*$/;
		if(lname=="")
		{
			grandfathername=true;
			$("#grandfather_error").html("please fill form");
			$("#grandfather_error").show();
			$("#ln").css("border-bottom","1px solid red");
		}
		 else if(len < 2 || len > 15)
		{
		  grandfathername=true;
			$("#grandfather_error").html("please enter betwwen 2-15 character");
			$("#grandfather_error").show();
			$("#ln").css("border-bottom","2px solid red");
		}
		else 
		if(pattern.test(lname) == "")
	  {
	    grandfathername=true;
			$("#grandfather_error").html("first character must be capital and charcter only");
			$("#grandfather_error").show();
			$("#ln").css("border-bottom","2px solid red");
	  }
		else 
			
		{
		grandfathername=false;
			$("#ln").css("border-bottom","1px solid green");
			$("#grandfather_error").hide();
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
		$("#phone_error").html("please fill form");
		$("#phone_error").show(); 
		$("#phon").css("border-bottom","1px solid red");	
		$("#phone_error").css("color","red");
		}
		else 
		if(pattern.test(ph) == "")
	{
	     phone==true;
			$("#phone_error").html("it must be start +251");
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
		phone=false;
		$("#phon").css("border-bottom","2px solid green");
		$("#phone_error").hide(); 	
		}
	    }
	function check_kebele()
	{
		var kebe=$("#kebel").val();
		if(kebe == "Select Kebele")
		{
			keb==true;
		$("#kebele_error").html("please select");
		$("#kebele_error").show(); 
		$("#kebel").css("border-bottom","1px solid red");
        $("#kebele").css("width","170px");		
		$("#kebele_error").css("color","red");
		}
		else
		{
		keb=false;
		$("#kebel").css("border-bottom","2px solid green");
		$("#kebele_error").hide(); 	
		}
	}
	function check_request()
	{
		var re=$("#request").val();
		if(re=="request to---")
		{
			reque=true;
			$("#request_error").html("please select");
			$("#request_error").show();
			$("#request").css("border-bottom","1px solid red");
			$("#request").css("width","170px");
			$("#request_error").css("color","red");
		}
		else 
		{
		reque=false;
			$("#request").css("border-bottom","1px solid green");
			$("#request_error").hide();
		}
	} 
	function check_level()
	{
		var le=$("#level").val();
		if(le=="-Select Level-")
		{
			lev=true;
			$("#level_error").html("please select");
			$("#level_error").show();
			$("#level").css("border-bottom","1px solid red");
			$("#level").css("width","170px");
			$("#level_error").css("color","red");
		}
		else 
		{
		lev=false;
			$("#level").css("border-bottom","1px solid green");
			$("#level_error").hide();
		}
	} 
	function check_operatorolicence()
	{
		var le=$("#operator").val();
		if(le=="")
		{
			olice=true;
			$("#olicence_error").html("please select");
			$("#olicence_error").show();
			$("#operator").css("border-bottom","1px solid red");
			$("#operator").css("width","170px");
			$("#olicence_error").css("color","red");
		}
		else 
		{
		olice=false;
			$("#operator").css("border-bottom","1px solid green");
			$("#olicence_error").hide();
		}
	} 
	function check_businesslicence()
	{
		var le=$("#business").val();
		if(le=="")
		{
			blice=true;
			$("#blicence_error").html("please select");
			$("#blicence_error").show();
			$("#business").css("border-bottom","1px solid red");
			$("#business").css("width","170px");
			$("#blicence_error").css("color","red");
		}
		else 
		{
		blice=false;
			$("#business").css("border-bottom","1px solid green");
			$("#blicence_error").hide();
		}
	} 
	function check_insurancelicence()
	{
		var le=$("#insurance").val();
		if(le=="")
		{
			Ilice=true;
			$("#Ilicence_error").html("please select");
			$("#Ilicence_error").show();
			$("#insurance").css("border-bottom","1px solid red");
			$("#insurance").css("width","170px");
			$("#Ilicence_error").css("color","red");
		}
		else 
		{
		Ilice=false;
			$("#insurance").css("border-bottom","1px solid green");
			$("#Ilicence_error").hide();
		}
	} 
 
	function check_bordno()
	{
		var bo=$("#bord").val();
		var len=$("#bord").val().length;
        var pattern = /^[0-9]*$/;
	if(bo == "")
		{
			bor==true;
		$("#bordno_error").html("please fill form");
		$("#bordno_error").show(); 
		$("#bord").css("border-bottom","1px solid red");	
		$("#bordno_error").css("color","red");
		}
		else if(len < 5 || len > 5)
		{
		  bor=true;
			$("#bordno_error").html("please enter 5 digit");
			$("#bordno_error").show();
			$("#bord").css("border-bottom","2px solid red");
			$("#bordno_error").css("color","red");
		}
		else
		{
		bor==false;
		$("#bord").css("border-bottom","2px solid green");
		$("#bordno_error").hide(); 	
		}
	}

	//
	$("#cform").submit(function(){
	   fnam=false;
	   fathername=false;
	   grandfathername=false;
	   phone=false;
	   keb=false;
	   reque=false;
	   lev=false;
	   olice=false;
	   blice=false;
	   Ilice=false;
	   bor=false;
	   
	   check_fname();
	   check_fathername();
	   check_grandfathername();
	   check_phone();
	   check_kebele();
	   check_request();
	   check_level();
	   check_operatorolicence();
	   check_businesslicence();
	   check_insurancelicence();
	
	   check_bordno();
	  
	   if(fnam === false && fathername === false && grandfathername=== false &&phone===false && keb===false && reque===false && lev===false && bor===false && olice===false && blice===false && Ilice===false )
	   {
		   return true;
	   }
	   else{
		   return false;
	   }
	});
});
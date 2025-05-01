$(function(){
	$("#fname_error").hide();
	$("#phone_error").hide();
	$("#address_error").hide();
    $("#age_error").hide();
	$("#birr_error").hide();
	$("#gender_error").hide();
	$("#bord_error").hide();
	
	   fnam=false;
	   fathername=false;
	   grandfathername=false;
	   phone=false;
	   reque=false;
	   lev=false;
	   bor=false;
	
	$("#fn").focusout(function(){
		check_fname();
	});
	$("#phon").focusout(function(){
		check_phone();
	});
	$("#address").focusout(function(){
		check_address();
	});
	$("#age").focusout(function(){
		check_age();
	});
	$("#birr").focusout(function(){
		check_bir();
	});
	$("#bord").focusout(function(){
		check_bordno();
	});
	$("#gender").focusout(function(){
		check_gender();
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
	function check_age()
	{
		var mname=$("#age").val();
		var len=$("#age").val().length;
		var pattern = /^[0-9]*$/;
		if(mname=="")
		{
			fathername=true;
			$("#age_error").html("please fill form");
			$("#age_error").show();
			$("#age").css("border-bottom","1px solid red");
		}
		 else if(len < 2 || len > 150)
		{
		  fathername=true;
			$("#age_error").html("please enter between 0-150 character");
			$("#age_error").show();
			$("#age").css("border-bottom","2px solid red");
		}
		else 
		if(pattern.test(mname) == "")
	  {
	    fathername=true;
			$("#age_error").html("first character must be capital and character only");
			$("#age_error").show();
			$("#age").css("border-bottom","2px solid red");
	  }
		else 
			
		{
		fathername=false;
			$("#age").css("border-bottom","1px solid green");
			$("#age_error").hide();
		}
	}
	
	function check_address()
	{
		var adres=$("#address").val();
		var len=$("#address").val().length;
		var pattern = /[a-z]*$/;
		if(adres=="")
		{
			reque=true;
			$("#address_error").html("please fill form");
			$("#address_error").show();
			$("#address").css("border-bottom","1px solid red");
		}
		 else if(len < 2 || len > 25)
		{
		  reque=true;
			$("#address_error").html("please enter betwwen 2-25 character");
			$("#address_error").show();
			$("#address").css("border-bottom","2px solid red");
		}
		else 
		if(pattern.test(adres) == "")
	  {
	    reque=true;
			$("#address_error").html("first character must be capital and charcter only");
			$("#address_error").show();
			$("#address").css("border-bottom","2px solid red");
	  }
		else 
			
		{
		reque=false;
			$("#address").css("border-bottom","1px solid green");
			$("#address_error").hide();
	}} 
	function check_bir()
	{
		var a=$("#birr").val();
		var len=$("#birr").val().length;
		var pattern = /[0-9]*$/;
		if(a=="")
		{
			lev=true;
			$("#birr_error").html("please fill form");
			$("#birr_error").show();
			$("#birr").css("border-bottom","1px solid red");
		}
		 else if(len < 0 )
		{
		  lev=true;
			$("#birr_error").html("please enter above 0");
			$("#birr_error").show();
			$("#birr").css("border-bottom","2px solid red");
		}
		else 
		if(pattern.test(a) == "")
	  {
	    lev=true;
			$("#birr_error").html("number only");
			$("#birr_error").show();
			$("#birr").css("border-bottom","2px solid red");
	  }
		else 
			
		{
		lev=false;
			$("#birr").css("border-bottom","1px solid green");
			$("#birr_error").hide();
	}} 
	function check_bordno()
	{
		var bo=$("#bord").val();
		var len=$("#bord").val().length;
        var pattern = /^[0-9]*$/;
	if(bo == "")
		{
			bor==true;
		$("#bord_error").html("please fill form");
		$("#bord_error").show(); 
		$("#bord").css("border-bottom","1px solid red");	
		$("#bord_error").css("color","red");
		}
		else if(len < 5 || len > 5)
		{
		  bor=true;
			$("#bord_error").html("please enter 5 digit");
			$("#bord_error").show();
			$("#bord").css("border-bottom","2px solid red");
			$("#bord_error").css("color","red");
		}
		else
		{
		bor==false;
		$("#bord").css("border-bottom","2px solid green");
		$("#bord_error").hide(); 	
		}
	}
	function check_gender()
	{
		var adre=$("#gender").val();
		var len=$("#gender").val().length;
		var pattern = /[a-z]*$/;
		if(adre=="")
		{
			grandfathername=true;
			$("#gender_error").html("please fill form");
			$("#gender_error").show();
			$("#gender").css("border-bottom","1px solid red");
		}
		 else if(len < 2 || len > 25)
		{
		  grandfathername=true;
			$("#gender_error").html("please enter betwwen 2-25 character");
			$("#gender_error").show();
			$("#gender").css("border-bottom","2px solid red");
		}
		else 
		if(pattern.test(adre) == "")
	  {
	    grandfathername=true;
			$("#gender_error").html("first character must be capital and charcter only");
			$("#gender_error").show();
			$("#gender").css("border-bottom","2px solid red");
	  }
		else 
			
		{
		grandfathername=false;
			$("#gender").css("border-bottom","1px solid green");
			$("#gender_error").hide();
	}} 
	//s
	$("#ccform").submit(function(){
	   fnam=false;
	   fathername=false;
	   grandfathername=false;
	   phone=false;
	   reque=false;
	   lev=false;
	   bor=false;
	   
	   check_fname();
	   check_phone();
	   check_age();
	   check_address();
	   check_bir();
	   check_bordno();
	   check_gender();
	  
	   if(fnam === false && fathername === false && grandfathername=== false &&phone===false  && reque===false && lev===false && bor=false )
	   {
		   return true;
	   }
	   else{
		   return false;
	   }
	});
});
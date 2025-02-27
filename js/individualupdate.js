$(function(){
	$("#uname_error").hide();
	$("#pass_error").hide();
	$("#email_error").hide();
	var uname=false;
	var pas=false;
	var email=false;
	$("#un").focusout(function(){
		check_uname();
	});
	$("#pass").focusout(function(){
		check_password();
	});
	$("#em").focusout(function(){
		check_email();
	});
	//for user name
		function check_uname()
	{
		var una=$("#un").val();
		var len=$("#un").val().length;
		var pattern = /^(\w*(\d+[a-zA-Z]|[a-zA-Z]+\d)\w*)+$/ ;
		if(una=="")
		{
			uname=true;
			$("#uname_error").html("please fill form");
			$("#uname_error").show();
			$("#un").css("border-bottom","1px solid red");
		}
		else 
		if(pattern.test(una) == "")
	{
	uname=true;
			$("#uname_error").html("please enter  AlphaNumeric");
			$("#uname_error").show();
			$("#un").css("border-bottom","2px solid red");
	}
		else 
		{
			$("#un").css("border-bottom","1px solid green");
			$("#uname_error").hide();
		}
	}
		//password
		function check_password()
	{
		var p=$("#pass").val();
		var len=$("#pass").val().length;
		var pattern = /^(\w*(\d+[a-zA-Z]|[a-zA-Z]+\d)\w*)+$/ ;
		if(p=="")
		{
			pas=true;
			$("#pass_error").html("please fill form");
			$("#pass_error").show();
			$("#pass").css("border-bottom","1px solid red");
		}
		else 
		if(len < 8)
				{
				
		$("#pass_error").html("please enter more than 8 ");
		$("#pass_error").show(); 
		$("#pass").css("border-bottom","1px solid red");
				}
			else
				if(pattern.test(p) == "")
		{
	         	pas=true;
			$("#pass_error").html("please enter  alphaNumeric");
			$("#pass_error").show();
			$("#pass").css("border-bottom","2px solid red");
			$("#pass_error").css("color","red");
	}
		else 
		{
			$("#pass").css("border-bottom","1px solid green");
			$("#pass_error").hide();
		}
	}
		//role
		function check_email()
	{
		var ema=$("#em").val();
		var pattern=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		if(ema=="")
		{
			email=true;
			$("#email_error").html("please fill form");
			$("#email_error").show();
			$("#em").css("border-bottom","1px solid red");
		}
		else 
		if(pattern.test(ema) == "")
		{
		email==true;
		$("#email_error").html("please enter valid email address");
		$("#email_error").show(); 
		$("#em").css("border-bottom","1px solid red");	
		}
			else
		{
			$("#em").css("border-bottom","1px solid green");
			$("#email_error").hide();
		}
	}
	$("#cform").submit(function(){
	   uname=false;
	   pas=false;
	   email=false;
	   check_uname();
	   check_password();
	   check_email();
	   //for user name
	   if(uname === false)
	   {
		   return true;
	   }
	   else{
		   return false;
	   }
	      //for  pass
	   if(pas === false)
	   {
		   return true;
	   }
	   else{
		   return false;
	   }
	   //repassword
	   if(email==false)
	   {
		   return true;
	   }
	   else{
		   return false;
	   }
	});
});
$(function(){
	$("#userId_error").hide();
	$("#uname_error").hide();
	$("#pass_error").hide();
	$("#repass_error").hide();
	$("#role_error_message").hide();
	$("#email_error").hide();
	var ui=false;
	var uname=false;
	var ema=false;
	var pas=false;
	var repas=false;
	var error_role=false;
	var ema=false;
	$("#uid").focusout(function(){
		check_userid();
	});
	$("#un").focusout(function(){
		check_uname();
	});
	
	$("#pass").focusout(function(){
		check_password();
	});
	$("#repass").focusout(function(){
		check_repassword();
	});
	$("#form_role").focusout(function(){
        check_role();
    });
	$("#em").focusout(function(){
		check_email();
	});
	//user id
	function check_userid()
	{
		var u=$("#uid").val();
		if(u=="")
		{
			ui=true;
			$("#userId_error").html("please fill form");
			$("#userId_error").show();
			$("#uid").css("border-bottom","1px solid red");
		}
		else 
		{
			$("#uid").css("border-bottom","1px solid green");
			$("#userId_error").hide();
		}
	}
	//for user name
		function check_uname()
	{
		var una=$("#un").val();
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
			$("#uname_error").html("please enter alphaNumeric");
			$("#uname_error").show();
			$("#un").css("border-bottom","2px solid red");
			$("#uname_error").css("color","red");
	}
		else 
		{
		uname=false;
			$("#un").css("border-bottom","1px solid green");
			$("#uname_error").hide();
		}
	}
	//email
		function check_email()
	{
		var e=$("#em").val();
		var pattern=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		if(e=="")
		{
			ema=true;
			$("#email_error").html("please fill form");
			$("#email_error").show();
			$("#em").css("border-bottom","1px solid red");
		}
		else 
		if(pattern.test(e) == "")
		{
		ema==true;
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
		else if(len < 8){
			pas=true;
            $("#pass_error").html("Password should be at least 8 characters");
            $("#pass_error").show();
            $("#pass").css("border-bottom","1px solid red");
            $("#pass_error").css("color","red");
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
			pas=false;
			$("#pass").css("border-bottom","1px solid green");
			$("#pass_error").hide();
		}
	}
		//confirm password
		function check_repassword()
	{
		var p=$("#pass").val();
		var rp=$("#repass").val();
		
		if(rp=="")
		{
			repas=true;
			$("#repass_error").html("please fill form");
			$("#repass_error").show();
			$("#repass").css("border-bottom","1px solid red");
		}
		else if(p!=rp){
			repas=true;
       $("#repass_error").html("password don't match");
       $("#repass_error").show();
       $("#repass").css("border-bottom","1px solid red");
       $("#repass_error").css("color","red");
}
		else 
		{
			repas=false;
			$("#repass").css("border-bottom","1px solid green");
			$("#repass_error").hide();
		}
	}
	//role
	function check_role(){
var role=$("#form_role").val();
		if(role=="please choose")
		{
			error_role=true;
			$("#role_error_message").html("please select role");
			$("#role_error_message").show();
			$("#form_role").css("border-bottom","1px solid red");
			$("#role_error_message").css("color","red");
		}
		else{
			error_role=false;
        $("#form_role").css("border-bottom","1px solid green");
        $("#role_error_message").hide();
            }
		}
	$("#cform").submit(function(){
	   ui=false;
	   uname=false;
	   ema=false;
	   pas=false;
	   repas=false;
	   error_role=false;
	   check_userid();
	   check_uname();
	   check_email();
	   check_password();
	   check_repassword();
	   check_role();
	   if(ui === false && uname === false && ema === false && pas === false && repas==false && error_role==false)
	   {
		   return true;
	   }
	   else{
		   return false;
	   }
	});
});
$(function(){
	$("#unameerror").hide();
	$("#passError").hide;
	var nam=false;
	var pass=false;
	$("#uname").focusout(function(){
		check_name();
	});
	$("#password").focusout(function(){
	check_password();
	});
	function check_name()
	{
		var name1=$("#uname").val();
		if(name1=="")
		{
			nam=true;
			$("#unameerror").html("please fill form");
			$("#unameerror").show();
			$("#uname").css("border-bottom","1px solid red");
		}
		else 
		{
			$("#uname").css("border-bottom","1px solid green");
			$("#unameerror").hide();
		}
	}
	//for password
	function check_password()
	{
		var name1=$("#password").val();
		if(name1=="")
		{
			nam=true;
			$("#passError").html("please fill form");
			$("#passError").show();
			$("#password").css("border-bottom","1px solid red");
		}
		else 
		{
			$("#password").css("border-bottom","1px solid green");
			$("#passError").hide();
		}
	}
	$("#userlog").submit(function(){
	   nam=false;
	   pas=false;
	   check_name();
	   check_password();
	   if(nam === false)
	   {
		   return true;
	   }
	   else{
		   return false;
	   }
	   if(pas === false)
	   {
		   return true;
	   }
	   else{
		   return false;
	   }
	});
});
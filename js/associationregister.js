$(function(){
	$("#aname_error").hide();
	$("#formed_error").hide();
	$("#phone_error").hide();
	$("#amanager_error").hide();
	$("#managerid_error").hide();
	$("#level_error").hide();
	var ui=false;
	var uname=false;
	var ema=false;
	var pas=false;
	var mana=false;
	var lev=false;
	
	$("#uid").focusout(function(){
		check_assoname();
	});
	$("#un").focusout(function(){
		check_formed();
	});
	$("#em").focusout(function(){
		check_phone();
	});
	$("#pass").focusout(function(){
		check_amanager();
	});
	$("#managerid").focusout(function(){
		check_managerid();
	});
	$("#level").focusout(function(){
		check_level();
	});
	
	//
	function check_assoname()
	{
		var u=$("#uid").val();
		var len=$("#uid").val().length;
		var pattern = /^[A-Z][a-z]*$/;
		if(u=="")
		{
			ui=true;
			$("#aname_error").html("please fill form");
			$("#aname_error").show();
			$("#uid").css("border-bottom","1px solid red");
			$("#aname_error").css("color","red");
		}
		else if(len < 2 || len > 25)
		{
		  ui=true;
			$("#aname_error").html("please enter betwwen 2-25 character");
			$("#aname_error").show();
			$("#uid").css("border-bottom","2px solid red");
			$("#aname_error").css("color","red");
		}
		else 
		if(pattern.test(u) == "")
	{
	ui=true;
			$("#aname_error").html("please enter  valid character");
			$("#aname_error").show();
			$("#uid").css("border-bottom","2px solid red");
			$("#aname_error").css("color","red");
	}
		else 
		{
			$("#uid").css("border-bottom","1px solid green");
			$("#aname_error").hide();
		}
	}
	//for formed date
		function check_formed()
	{
		var una=$("#un").val();
		
		if(una=="")
		{
			uname=true;
			$("#formed_error").html("please fill form");
			$("#formed_error").show();
			$("#un").css("border-bottom","1px solid red");
			$("#formed_error").css("color","red");
		}
		else 
		{
			$("#un").css("border-bottom","1px solid green");
			$("#formed_error").hide();
		}
	}
	//email
		function check_phone()
	{
		var e=$("#em").val();
		var len=$("#em").val().length;
        var pattern = /^[+][2][5][1][0-9]*$/;
		if(e=="")
		{
			ema=true;
			$("#phone_error").html("please fill form");
			$("#phone_error").show();
			$("#em").css("border-bottom","1px solid red");
			$("#phone_error").css("color","red");
		}
		else 
		if(pattern.test(e) == "")
	{
	ema=true;
			$("#phone_error").html("phone number must be started +251");
			$("#phone_error").show();
			$("#em").css("border-bottom","2px solid red");
			$("#phone_error").css("color","red");
	}
		  else
	   if(len < 13 || len >13)
	   {
		   ema= true;
	   $("#phone_error").html("&nbsp; please enter 13 digit");
	   $("#phone_error").show();
	   $("#em").css("border-bottom","2px solid red");
	   }
		else 
		{
			$("#em").css("border-bottom","1px solid green");
			$("#phone_error").hide();
		}
	}
		//password
		function check_amanager()
	{
		var p=$("#pass").val();
		var len=$("#pass").val().length;
		var pattern = /^[A-Z][a-z]*$/;
		if(p=="")
		{
			pas=true;
			$("#amanager_error").html("please fill form");
			$("#amanager_error").show();
			$("#pass").css("border-bottom","1px solid red");
			$("#amanager_error").css("color","red")
		}
		else 
		if(pattern.test(p) == "")
		{
	         pas=true;
			$("#amanager_error").html("please enter  valid character");
			$("#amanager_error").show();
			$("#pass").css("border-bottom","2px solid red");
			$("#amanager_error").css("color","red");
	}
		else 
		{
			$("#pass").css("border-bottom","1px solid green");
			$("#amanager_error").hide();
		}
	}
	function check_managerid()
	{
		var le=$("#managerid").val();
		if(le=="please choose")
		{
			mana=true;
			$("#managerid_error").html("please select manager id");
			$("#managerid_error").show();
			$("#managerid").css("border-bottom","1px solid red");
			$("#managerid").css("width","170px");
			$("#managerid_error").css("color","red");
		}
		else 
		{
		mana=false;
			$("#managerid").css("border-bottom","1px solid green");
			$("#managerid_error").hide();
		}
	}
	function check_level()
	{
		var le=$("#level").val();
		if(le=="please choose")
		{
			lev=true;
			$("#level_error").html("please select level");
			$("#level_error").show();
			$("#level").css("border-bottom","1px solid red");
			$("#level").css("width","170px");
			$("#level_error").css("color","red");
		}
		else 
		{
			$("#level").css("border-bottom","1px solid green");
			$("#level_error").hide();
		}
	}
	$("#cform").submit(function(){
	   ui=false;
	   uname=false;
	   ema=false;
	   pas=false;
	   mana=false;
	   lev=false;
	   check_assoname();
	   check_formed();
	   check_phone();
	   check_amanager();
	   check_managerid();
	   check_level();
	   if(ui === false && uname === false && ema === false && pas === false && mana === false && lev === false)
	   {
		   return true;
	   }
	   else{
		   return false;
	   }
	});
});
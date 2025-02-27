$(function(){
	$("#name_error").hide();
	$("#fname_error").hide();
	var nam=false;
	var na=false;
	$("#name").focusout(function(){
		check_name();
	});
	$("#textInput").focusout(function(){
		check_fname();
	});
	//
	function check_name()
	{
		var name1=$("#name").val();
		if(name1=="")
		{
			nam=true;
			$("#name_error").html("please fill form");
			$("#name_error").show();
			$("#name").css("border-bottom","1px solid red");
		}
		else 
		{
			$("#name").css("border-bottom","1px solid green");
			$("#name_error").hide();
		}
	}
	function check_fname()
	{
		var name1=$("#textInput").val();
		if(name1=="")
		{
			na=true;
			$("#fname_error").html("please fill form");
			$("#fname_error").show();
			$("#textInput").css("border-bottom","1px solid red");
		}
		else 
		{
			$("#textInput").css("border-bottom","1px solid green");
			$("#fname_error").hide();
		}
	}
	$("#xxx").submit(function(){
	   nam=false;
	   na=false;
	   check_name();
	   check_fname();
	   if(nam === false)
	   {
		   return true;
	   }
	   else{
		   return false;
	   }
	   //
	   if(na === false)
	   {
		   return true;
	   }
	   else{
		   return false;
	   }
	});
});
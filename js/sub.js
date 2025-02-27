$(function(){
	$("#name_error").hide();
	var nam=false;
	$(".textInput").focusout(function(){
		check_name();
	});
	function check_name()
	{
		var name1=$(".textInput").val();
		if(name1=="")
		{
			nam=true;
			$("#name_error").html("please fill form");
			$("#name_error").show();
			$(".textInput").css("border-bottom","1px solid red");
		}
		else 
		{
			$(".textInput").css("border-bottom","1px solid green");
			$("#name_error").hide();
		}
	}
	$("#xxx").submit(function(){
	   nam=false;
	   check_name();
	   if(nam === false)
	   {
		   return true;
	   }
	   else{
		   return false;
	   }
	});
});
$(function(){
	$("#notice_error").hide();
	$("#image_error").hide();
	$("#commnet_error").hide();
	
	
	
	var note=false;
	var ime=false;
	var com=false;
	
	$("#notice").focusout(function(){
		check_notice();
	});
	 $("#image").focusout(function(){
      check_image();
      });
	  $("#comment").focusout(function(){
      check_comment();
      });
	
	function check_notice()
	{
		var le=$("#notice").val();
		if(le=="please choose")
		{
			note=true;
			$("#notice_error").html("please select");
			$("#notice_error").show();
			$("#notice").css("border-bottom","1px solid red");
			$("#notice").css("width","170px");
			$("#notice_error").css("color","red");
		}
		else 
		{
		  note=false;
			$("#notice").css("border-bottom","1px solid green");
			$("#notice_error").hide();
		}
	}
	function check_image()
	{
		var kebe=$("#image").val();
		if(kebe=="")
		{
			imo=true;
		$("#image_error").html("please fill this field");
		$("#image_error").show(); 
		$("#image").css("border-bottom","1px solid red");	
		$("#image_error").css("color","red");
		}
		else
		{
			imo=false;
		$("#image").css("border-bottom","2px solid green");
		$("#image_error").hide(); 	
		}
	}
	function check_comment()
	{
		var co=$("#comment").val();
		if(co=="")
		{
			com=true;
		$("#comment_error").html("please fill this field");
		$("#comment_error").show(); 
		$("#comment").css("border-bottom","1px solid red");	
		$("#comment_error").css("color","red");
		}
		else
		{
			com=false;
		$("#comment").css("border-bottom","2px solid green");
		$("#comment_error").hide(); 	
		}
	}
	
	
	$("#cform").submit(function(){
	note=false;
	imo=false;
	com=false;
	check_notice();
	check_image();
	check_comment();
	if(note===false && imo===false && com===false )
	   {
		   return true;
	   }
	   else{
		   return false;
	   }
	   });
});
function login()
{
    var name=document.getElementById("username").value.trim();
    var pass=document.getElementById("password").value.trim();
    var namelegal=/^[A-Z]+$/;
    var passlegal=/^[0-9]+$/;
    if(name=="" || pass==""){
        animateimage();
        $('#icon').css("color","red");
        $('#msg').css("color","red");
        document.getElementById("msg").innerHTML="filed is empity ";
        document.getElementById("username").value="";
        document.getElementById("password").value="";
        return false;
    }

function show()
{
  document.getElementById("about").style.transform = "scale(1)";
  document.getElementById("about").style.transition="1000ms";
}
function cancel()
{
  document.getElementById("about").style.transform = "scale(0)";
  document.getElementById("about").style.transition="1000ms";
}
//  $(document).ready(function(){
//     $('#login').click(function()
//     {
//       var username=$("#username").val();
//       var password=$("#password").val();
//       if($.trim(username).length > 0 && $.trim(password).length > 0){
//        $.ajax({
       
//        url: "../php/Loginpage.php",
//        method: "POST",
//        data: {name:username,pass:password},  
//        cache :false,
//        // beforeSend:function(){
//        //   $('#login').val("Connecting ....")
//        // },
//        success: function(data){ 
//          if(data==1)
//          {
//            location.href=('../php/Userpage.php');
//          }
//          else if(data==2)
//          {
//            location.href=('../php/Userpage.php');
//          }
//          else
//          {
//             animateimage();
//          $('#msg').html("invalid username or password");
//          $('#icon').css("color","red");
//          $('#msg').css("color","red");
//          }
//         alert(data);
         
//         } 
//    });
//       }
//     })
//   }) 
}
  function animateimage(){
 $('#icon').animate({
     marginLeft: '30px'
 }, 100);
 $('#icon').animate({
     marginLeft: '0px'
 }, 100);
 $('#icon').animate({
     marginLeft: '30px'
 }, 100);
 $('#icon').animate({
     marginLeft: '0px'
 }, 100);
}

        
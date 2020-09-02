$(document).ready(function() {
	$('#example2').paginate({itemsPerPage: 15});
	if($('#wrapper').height()<630)
	{
		$('footer').addClass('fixed-bottom');
	
	}
	$('#nextadd').click(function(){
	$('footer').removeClass('fixed-bottom');
	
	});
	
		 $('._51m-._51mw').text().replace('Login in With Facebook');
	$("#fronsign").click(function(){
	var email = $("#femail").val();	
	var password = $("#fpass").val();	
		if(email == "" || password==""){
			 BootstrapDialog.alert({
		title: 'INFO',
		message: 'Please fill all fields ',
		type: BootstrapDialog.TYPE_INFO,
			});
			return false;
		}
	});
	
});


function checklog(){
	 BootstrapDialog.alert({
		title: 'INFO',
		message: 'Please login first! ',
		type: BootstrapDialog.TYPE_INFO,
	});
}

function hide_signin()
{
   $("#myModalsign").hide();
   $("#myModalsign").removeClass('in');
   $("#myModalsignup").show();
   $("#myModalsignup").addClass('in');
}
function show_signin()
{ 
    $("#myModalsignup").hide();
	$("#myModalsignup").removeClass('in');
	$("#myModalsign").show();
	$("#myModalsign").addClass('in');
}
function close_popup()
{
   $("#myModalsignup").hide();
   $("#myModalsignup").removeClass('in');
   $(".modal-backdrop").remove();
}



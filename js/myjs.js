$(document).ready(function() {
	$('#email_input').keyup(function() {
		$.post('emailValidation.php', {email: registerForm.email.value},
		function(result) {
			$('#emailHtml').html(result).show();
		});
	});
	$('#confirm').keyup(function() {
		if($(this).val() !== $('#password1').val()){
			$('#confirmPass').html('Passwords do not match');
		} else{
			$('#confirmPass').html("");
		}

	});
	$("#register").click(function() {
		$("#overlay").fadeIn("slow");
		$("#overlay_div").fadeIn("slow");
	});
	$("#close_button").click(function() {
		$("#overlay").fadeOut("fast");
		$("#overlay_div").fadeOut("fast");
	});
	$("#register2").click(function() {
		$("#overlay").fadeOut("fast");
		$("#overlay_div").fadeOut("fast");
	});
	$('input').focusin(function() {
		$(this).css('background-color', 'CEF4EB');
	});
	$('input').blur(function() {
		$(this).css('background-color', '#fff');
	});
	$("#register2").click(function() {
		
		
			alert("YOu need to fill out all fields!");
		

	});
});
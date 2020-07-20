function validateForm(){
	var username = document.signin.username.value;
	var password = document.signin.password.value;
	if(username == "" && password == ""){
		document.signin.username.focus();
		$("#user-validate").text("This field is required.");
		$("#pass-validate").text("This field is required.");
		return false;
	}
	else if(username == "" && password != ""){
		document.signin.username.focus();
		$("#user-validate").text("This field is required.");
		return false;
	}
	else if(username != "" && password == ""){
		document.signin.password.focus();
		$("#pass-validate").text("This field is required.");
		return false;
	}
	else{
		return true;
	}
}
$(document).ready(function(){
	if(window.location=="http://localhost/Final/sign.php?error"){
		$("#pass-validate").after("<p style='color:red;'>Username or password is not correct.</p>");
	}
});
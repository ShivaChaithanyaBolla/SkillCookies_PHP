function validateRegister()
{
	var name = document.forms["registerform"]["name"].value;
	var regno = document.forms["registerform"]["regno"].value;
	var password1 = document.forms["registerform"]["password1"].value;
	var password2 = document.forms["registerform"]["password2"].value;

	
	if(regno.length < 10) {
		document.getElementById('error_msg').innerHTML = "Register number is not valid!";
		return false;
	} else if(password1 != password2) {
		document.getElementById('error_msg').innerHTML = "Passwords are not same!";
		return false;
	} else if(password1.length < 5) {
		document.getElementById('error_msg').innerHTML = "Password length should be minimum 5 digits!";
		return false;
	}  else {
		return true;
	}
}

function validateClubRegister() {
    
	var mobile = document.forms["registerform"]["yourmobile"].value;
	var email  = document.forms["registerform"]["youremail"].value;
	var password1 = document.forms["registerform"]["password1"].value;
	var password2 = document.forms["registerform"]["password2"].value;
	
 
	if(mobile.length != 10) {
	    document.getElementById('error_msg').innerHTML = "Please Enter a valid mobile number!";
		return false;
	} else if(!mobile ="/[0-9]/") {
		document.getElementById('error_msg').innerHTML = "Please enter a valid mobile number!";
		return false;
	} else if(password1.length < 5) {
		document.getElementById('error_msg').innerHTML = "Password length should be minimum 5 digits!";
		return false;
	} else if(password1 != password2) {
		document.getElementById('error_msg').innerHTML = "Passwords are not same!";
		return false;
	} else {
		return true;
	}
  
}

function validateLogin()
{
	var regno = document.forms["loginform"]["regno"].value;
	var password = document.forms["loginform"]["password"].value;

	if(regno.length < 10) {
		document.getElementById('error_msg').innerHTML = "Register number is not valid!";

		return false;
	} else if(password.length < 5) {
		document.getElementById('error_msg').innerHTML = "Password length is not enough!";
		return false;
	} else {
		return true;
	}
}
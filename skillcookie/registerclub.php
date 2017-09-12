<?php
	if(isset($_COOKIE['_u__'])) { 
		header("Location:home.php");
	}
?>
<html>
<head>
	<title>
		SkillCookie
	</title>
	<script type="text/javascript" src="./js/validate.js"></script>
	<link rel="stylesheet" type="text/css" href="./css/index.css">
	
	<!-- checking space in start input starts -->

	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <meta charset="UTF-8">
    <script type="text/javascript">
     	$(function() {
             $('body').on('keydown', '#checkspace', function(e) {
               console.log(this.value);
                if (e.which === 32 &&  e.target.selectionStart === 0) {
                  return false;
                }  
            });
        });
	
    </script>
					<!-- checking space in start input ends-->
					
										<!-- validation for mobile num starts-->
    <script type="text/javascript">	
          $(document).ready(function () {	
			$("#mobile").keypress(function (e) {
               if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
     		        $("#errmsg").html("Digits Only").show().fadeOut("slow");
                    return false;
                }
            });
			
			$("#pwd1").keypress(function (e) {
			    if(e.which == 32 || e.which == 34 || e.which==39) {
				   $("#errmsgpwd1").html("Character not allowed").show().fadeOut("slow");
				   return false;  
				}
			});
			
			$("#pwd2").keypress(function (e) {
			    if(e.which == 32 || e.which == 34 || e.which==39) {
				  $("#errmsgpwd2").html("Character not allowed").show().fadeOut("slow");
				   return false;  
				}
			});
			
			$('#pwd1').bind("paste",function(e) {
			     $("#errmsgpwd1").html("Please type the password").show().fadeOut("slow");
				   return false;
            });
			
			$('#pwd2').bind("paste",function(e) {
			       $("#errmsgpwd2").html("Please type the password").show().fadeOut("slow");
				   return false;
            });
        });
		
		function validateClubRegister() {
    
	var mobile = document.forms["registerform"]["yourmobile"].value;
	var email  = document.forms["registerform"]["youremail"].value;
	var password1 = document.forms["registerform"]["password1"].value;
	var password2 = document.forms["registerform"]["password2"].value;
	
 
	if(mobile.length != 10) {
	    document.getElementById('error_msg').innerHTML = "Please Enter a valid mobile number!";
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
		</script>
</head>
<body>

<div id="wrapper">
	<div id="header">
		<div id="logo">
			
		</div>

		<div id="logo-text">
		SkillCookie
		</div>

		<div id="signinclub">
			<a href="login.php">Login as Member</a>
		</div>
	</div>

	<div id="container">
		<div id="left-container">
		<iframe width="475" height="330" src="//www.youtube.com/embed/E3rQlVZsmog" frameborder="0" allowfullscreen></iframe>
		</div>
		<div id="right-container">
		<span style="font-size:30px;">Request for a Club/Project</span>
		<br>
		<span style="color:red;font-size:13px;" id="error_msg"></span>
		<br>
			<form name="registerform" onsubmit="return validateClubRegister()" action="submitregisterclub.php" method="POST">
				<input type="text" name="clubname" id="checkspace" placeholder="Club name" required><br>
				<input type="text" name="yourname" id="checkspace"  placeholder="Your name" required><br>
				<input type="text" name="yourmobile" id="mobile"  placeholder="Your mobile number" required> &nbsp;<span style="color:red;font-size:13px;" id="errmsg"></span><br>
				<input type="email" name="youremail" id="checkspace"  placeholder="Your email" required><br>
				<input type="password" name="password1" id="pwd1"  placeholder="Password" required>&nbsp;<span style="color:red;font-size:13px;" id="errmsgpwd1"></span><br>
				<input type="password" name="password2" id="pwd2"  placeholder="Confirm Password" required>&nbsp;<span style="color:red;font-size:13px;" id="errmsgpwd2"></span><br>
				<input type="submit" style="width:200px;" value="Reuqest a Club ID"><br>
				<br>
				<a href="./login.php">Already a member? Sign In here!</a>
			</form>
		</div>
	</div>

	<div id="footer">
		&copy; Copyright 2014-15 SkillCookie. All rights reserved.
	</div>
</div>

<?php	include_once('./ganalytics.php');	?>


</body>
</html>
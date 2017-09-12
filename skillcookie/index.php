<?php
if(isset($_COOKIE['_u__']) || isset($_COOKIE['_u__']) != '') {
		require_once('./classes/User.php');
		$ob = new User();
		$regno = $ob->decrypt($_COOKIE['_u__']);
		if ((strcspn($regno, '0123456789') != strlen($regno))) {
			     			   $xx = base64_encode(rand(111111,999999));
			echo "<script> location.replace('home.php?tpsu=".$xx."'); </script>";	
exit();
		} else {
					     			   $xx = base64_encode(rand(111111,999999));
			echo "<script> location.replace('homeclub.php?tpsu?tpsu=".$xx."'); </script>";
exit();
		}
		
	}
?>


<html>
<head>
	<title>
		SkillCookie
	</title>
	<script type="text/javascript" src="./js/validate.js"></script>
	<link rel="stylesheet" type="text/css" href="./css/index.css">
    
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
	
						<!-- validation for mobile num starts-->
    <script type="text/javascript">	
          $(document).ready(function () {	
			
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
    </script>
					<!-- validation for mobile num ends-->

	
<!-- favicon start-->
	<link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="./images/favicon.ico" type="image/x-icon">
<!-- favicon end -->
</head>
<body>

<div id="wrapper">
	<div id="header">
		<div id="logo">
			<img src="./images/smallcookie.png" width=100% height="100%">
		</div>

		<div id="logo-text">
			<img src="./images/cookie-text.png" width="80%" height="100%" style="margin-top:-20px;">
		</div>

		<div id="signinclub">
			<a href="signinclub.php">Sign In as Club</a>
		</div>
	</div>

	<div id="container">
		<div id="left-container">
		<iframe width="475" height="330" src="//www.youtube.com/embed/E3rQlVZsmog" frameborder="0" allowfullscreen></iframe>
		</div>
		<div id="right-container">
		<span style="font-size:30px;">Sign Up!</span>
		<br>
		<span style="color:red;font-size:13px;" id="error_msg"></span>
		<br>
			<form name="registerform" onsubmit="return validateRegister()" action="submitregister.php" method="POST">
				<input type="text" name="name" id="checkspace" placeholder="Name" required autofocus><br>
				<input type="text" name="regno" id="checkspace" placeholder="Register no." required><br>
				<input type="email" name="email" id="checkspace"  placeholder="Your email" required><br>				
				<input type="password" name="password1" id="pwd1" placeholder="Password" required>&nbsp;<span style="color:red;font-size:13px;" id="errmsgpwd1"></span><br>
				<input type="password" name="password2" id="pwd2" placeholder="Confirm Password" required>&nbsp;<span style="color:red;font-size:13px;" id="errmsgpwd2"></span><br>
				<input type="submit" value="Sign Up"><br>
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
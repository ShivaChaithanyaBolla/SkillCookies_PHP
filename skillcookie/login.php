<?php
	if(isset($_COOKIE['_u__'])) { 
				     			   $xx = base64_encode(rand(111111,999999));
	echo	'<script>window.location = "home.php?tpsu='.$xx.'";</script>';
exit();
	}
?>
<html>
<head>
	<title>
		SkillCookie
	</title>
	<script type="text/javascript" src="./js/validate.js"></script>
	<link rel="stylesheet" type="text/css" href="./css/index.css">
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
		<span style="font-size:30px;">Sign In!</span>
		<br>
		<span style="color:red;font-size:13px;" id="error_msg"></span>
		<br>
				<form name="loginform" onsubmit="return validateLogin()" action="submitlogin.php" method="POST">
				<input type="text" name="regno" placeholder="Register no." required><br>
				<input type="password" name="password" placeholder="Password" required><br>
				<input type="submit" value="Sign In"><br>
				<br>
				<a href="./index.php">Not a member? Sign Up here!</a>
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
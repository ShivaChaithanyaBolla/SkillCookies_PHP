<?php
	if(
		isset($_POST['name']) && $_POST['name']!='' &&
		isset($_POST['regno']) && $_POST['regno']!='' &&
		isset($_POST['password1']) && $_POST['password1']!='' &&
		isset($_POST['password2']) && $_POST['password2']!='' &&
		isset($_POST['email']) && $_POST['email'] != ''
	) {
		$name = $_POST['name'];
		$regno = $_POST['regno'];
		$password1 = $_POST['password1'];
		$password2 = $_POST['password2'];
        $email = $_POST['email'];
		
		//data submission
		require_once('./classes/Register.php');
		$obj = new Register();
		if($obj->userExistence($regno) == true) {
			//user already exists
			echo('<script>alert("Register number already exists. \n If you think some else is using your register number, kindly contact to the admin.","SkillCookie");</script>');
			echo '<meta HTTP-EQUIV=Refresh CONTENT="0; URL=index.php">';
		} else {
			$obj->submitRegister($name, $regno,$email, $password1);
			echo('<script>alert("User successfully registered. Log in to continue.","SkillCookie");</script>');
			echo '<meta HTTP-EQUIV=Refresh CONTENT="0; URL=login.php">';
		}
	}
?>

<!--mysql_real_escape_string($_POST['name']-->
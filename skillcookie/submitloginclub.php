<?php
	ob_start();
	if(
		isset($_POST['regno']) && $_POST['regno']!='' &&
		isset($_POST['password']) && $_POST['password']!=''
	) {
		$regno = $_POST['regno'];
		$password = $_POST['password'];

		echo "Loading...";
		//data submission
		require_once('./classes/Register.php');
		$obj = new Register();
		if($obj->userExistence($regno) == false) {
			//user doesn't exist
			echo('<script>alert("Register number does not exist. Please register first.","SkillCookie");</script>');
			echo '<meta HTTP-EQUIV=Refresh CONTENT="0; URL=signinclub.php">';
		} else {
			require_once('./classes/Login.php');
			$obj1 = new Login();
			if($obj1->checkLogin($regno, $password) == true) {
				require_once('./classes/Others.php');
				$ob = new Others();
				$user=$ob->encrypt($regno);
				setcookie('_u__',$user);
				echo '<meta HTTP-EQUIV=Refresh CONTENT="0; URL=homeclub.php">';				
			}
			else {
				echo('<script>alert("Password does not match. Try again!","SkillCookie");</script>');
				echo '<meta HTTP-EQUIV=Refresh CONTENT="0; URL=login.php">';
			}
		}
	}	
?>
<?php
	class Register {

		public function submitRegister($name, $regno,$email, $password) {
			require_once('./authen.php');
			mysql_query("INSERT INTO `signup` (`regno`, `name`,`email`, `password`) VALUES ('".$regno."','".$name."','".$email."','".md5($password)."')");
		}

		public function userExistence($regno) {
			require_once('./authen.php');
			$q = mysql_query("SELECT `regno` FROM `signup` WHERE `regno` = '".$regno."'");			
			if(mysql_num_rows($q) > 0)
				return true;	//user exists
			else 
				return false;	//user doesn't exist
		}





		function submitRegisterClub($clubname, $clubadmin, $yourmobile, $youremail, $password) {
			require_once('./authen.php');
			mysql_query("INSERT INTO `signup_club` (`name`, `clubadmin`, `password`, `email`, `mobile`, `status`) VALUES ('".$clubname."','".$clubadmin."','".md5($password)."', '".$youremail."', '".$yourmobile."', '0')");
		}
	}
?>
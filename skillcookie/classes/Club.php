<?php

class Club {
	
	public function userExistence($username) {
		require_once('./authen.php');
		$q = mysql_query("SELECT `username` FROM `signup_club` WHERE `username` = '".$username."'");
		if(mysql_num_rows($q) > 0)
			return true;	//user exists
		else 
			return false;	//user doesn't exist
	}

	public function checkLogin($username, $password) {
		require_once('./authen.php');
		$q = 'SELECT * FROM `signup_club` WHERE `username` = "'.$username.'" AND `password` = "'.md5($password).'"';
		echo $q;
		if(mysql_num_rows(mysql_query($q)) > 0)
			return true;	//password matches
		else 
			return false;	//doesn't
	}



}

?>
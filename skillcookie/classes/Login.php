<?php
	require_once('./classes/Others.php');
	class Login extends Others{

		public function checkLogin($regno, $password) {
			require_once('./authen.php');
			$q = 'SELECT * FROM `signup` WHERE `regno` = "'.$regno.'" AND `password` = "'.md5($password).'"';
			if(mysql_num_rows(mysql_query($q)) > 0)
				return true;	//password matches
			else 
				return false;	//doesn't
		}

	}
?>
<?php
require_once('./classes/Others.php');
class Skilljar extends Others{

	public function getSkillName($skill) {
		require_once('./authen.php');
		$query='SELECT `skillname` FROM `skilljar` WHERE `skillname` = "'.$skill.'"';
		$res=mysql_query($query);
		$user = "0";	//default value
		while($data=mysql_fetch_array($res)) {
			$user=$data['skillname'];
		}
		return $user;
	}

}

?>
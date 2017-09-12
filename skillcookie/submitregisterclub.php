<?php
	ob_start();
	if(
		isset($_POST['clubname']) && $_POST['clubname']!='' &&
		isset($_POST['yourname']) && $_POST['yourname']!='' &&
		isset($_POST['yourmobile']) && $_POST['yourmobile']!='' &&
		isset($_POST['youremail']) && $_POST['youremail']!='' &&
		isset($_POST['password1']) && $_POST['password1']!='' &&
		isset($_POST['password2']) && $_POST['password2']!=''
	) {
		$clubname = $_POST['clubname'];
		$yourname = $_POST['yourname'];
		$yourmobile = $_POST['yourmobile'];
		$youremail = $_POST['youremail'];
		$password1 = $_POST['password1'];
		$password2 = $_POST['password2'];

		//data submission
		require_once('./classes/Register.php');
		$obj = new Register();
		$obj->submitRegisterClub($clubname, $yourname, $yourmobile, $youremail, $password1);
		echo('<script>alert("Your request has been successfully registered.\n Someone from our team will contact you soon!","SkillCookie");</script>');
		echo '<meta HTTP-EQUIV=Refresh CONTENT="0; URL=signinclub.php">';
	}
?>
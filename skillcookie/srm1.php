<?php
	error_reporting(1);
	if(!isset($_COOKIE['_u__']) || isset($_COOKIE['_u__']) == '') {
		header("Location:index.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		SkillCookie
	</title> 
	<script type="text/javascript" src="./js/jquery2.js"></script>
	<script type="text/javascript" src="./js/actions.js"></script>

	<link rel="stylesheet" type="text/css" href="./css/home.css">
</head>
<body>

<div id="wrapper">




	<div id="header">
		<center>
			<div id="logo">
				<a href="./home.php"><div id="logo-image">

				</div>  </a>
			</div>
		
			<div id="tabs">
				<?php
					require_once('tabs.php');
				?>
			</div>
			<div style="overflow:hidden;">
			<a href="#" id="help"><div>Need Help?</div></a>
			</div>
		</center>
	</div>
<div id="tutorial" style="display:none;">
					<?php
						require_once('tutor.php');
					?>
			</div>




	<center>
	<div id="container">
			<div id="profile">
				<div id="profile_head" class="pro_c" >
					<div id="profile-details-icon" >
							
					</div>	
				</div>	
								
				<div id="profile_mid" class="pro_c">
					<center>
					<div id="profile-pic" class="pro_mid_c">
						
						<div id="dp">
						<?php
							$dp_path = './images/srm.jpg';
							echo '<img src="'.$dp_path.'" width="100%" height="100%">';	
						?>
						</div>
						<div id="dp-upload">
							
						</div>
					</div>

				
				
					<div id="profile-status" class="pro_mid_c">
						<div id="profile-name" class="pro_stat_c">
							<?php
								echo ucwords("SRM University");
							?>
						</div>
						
					</div>
					</center>
				</div>
			</div>


			<br>



			<div id="skilljar_1" style="background: #fff;">
			
				<div id="head_skill" class="skill_content">
					<div id="propic_skill">
						<img src="./images/description.png">
					</div>
				</div>
				<div id="content_skill" class="skill_content">
					<?php
					if(isset($_COOKIE['_u__'])) {
						echo '
						<div style="line-height: 1.5;">
							SRM University is a leading University in the field of Enginnering and Technology. <br>
							It provides ways to enhnace and transform Indian society mentally and prepapre for better future of the country.<br>
							Here students live with one motto i.e. "Learn, Leap and Lead".
							<br><br>
							Refer: <a href="http://www.srmuniv.ac.in/">http://www.srmuniv.ac.in/</a>
						</div>';
					}
				?>
				</div>
			
			</div>
		<br>

			<div id="skilljar_1" style="background: #fff;">
			
				<div id="head_skill" class="skill_content">
					<div id="propic_skill">
						<img src="./images/members.png">
					</div>
				</div>
				<div id="content_skill" class="skill_content">
					<?php
					if(isset($_COOKIE['_u__'])) {
						require_once('./classes/User.php');
						$ob = new User();
						$regno = $ob->decrypt($_COOKIE['_u__']);
						$mem = $ob->getAllClubs();
						$arr = $mem;
						$p=0;
						for($i=0;$i<count($arr);$i++) {
							$p++;

							$reg = $arr[$i];
							$encrypted_reg = $ob->encrypt($reg);
							$dp_link = $ob->getDp($reg);
							$name = ucwords($ob->getName($reg));
							if($dp_link == "") {
								$dp_link = './images/defaultdp.png';
							}
							echo '
							<a href="view.php?id='.$encrypted_reg.'">

							<div class="member-outer-box">
								<center>
								<div class="member-box-image">
									<img src="'.$dp_link.'" height="100%" width="100%">
								</div>
								</center>
								<div class="member-box-details">
									<center>
										<span class="member-details-name" style="font-size:14px;">'.$name.'</span>
									</center>
								</div>
							</div>

							</a>
							';
							if($p%6==0){
								echo "<br><br><br><br><br><br><br><br>";
							}
						}
					}

				?>
				</div>
			
			</div>








			<br>


<!--
		
		<div id="skilljar_1" style="max-width:700px;" >
			<div class="leftside-icon" style="margin-top:-10px;">
				<img src="./images/description.png" width=120% height=100%>
			</div>
			
				<?php
					if(isset($_COOKIE['_u__'])) {
						echo '
						<div style="margin-left:20px;">
							SRM University is ahasf hsdfksd sdfksgfa aaskhafjhaf sdfjsd gshkjg sgskg ss. <br>
							sghkljsdg sghs sdgkhs gksgh d g kdsj fdsfkjhd sf ahasf hsdfksd sdfksgfa aaskhafjhaf sdfjsd gshkjg sgskg ss. <br>
							sghkljsdg sghs sdgkhs gksgh d g kdsj fdsfkjhd sf
							<br><br>
							<a href="http://www.srmuniv.ac.in/">http://www.srmuniv.ac.in/</a>
						</div>';
					}
				?>
		</div>



		<div id="events_1" style="min-height:300px;">
			<div class="leftside-icon">
				<img src="./images/members.png" width=120% height=100%>
			</div>
	
				<?php
					if(isset($_COOKIE['_u__'])) {
						require_once('./classes/User.php');
						$ob = new User();
						$regno = $ob->decrypt($_COOKIE['_u__']);
						$mem = $ob->getAllClubs();
						$arr = $mem;
						$p=0;
						for($i=0;$i<count($arr);$i++) {
							$p++;

							$reg = $arr[$i];
							$encrypted_reg = $ob->encrypt($reg);
							$dp_link = $ob->getDp($reg);
							$name = ucwords($ob->getName($reg));
							if($dp_link == "") {
								$dp_link = './images/defaultdp.png';
							}
							echo '
							<a href="view.php?id='.$encrypted_reg.'">

							<div class="member-outer-box">
								<center>
								<div class="member-box-image">
									<img src="'.$dp_link.'" height="100%" width="100%">
								</div>
								</center>
								<div class="member-box-details">
									<center>
										<span class="member-details-name" style="font-size:14px;">'.$name.'</span>
									</center>
								</div>
							</div>

							</a>
							';
							if($p%6==0){
								echo "<br><br><br><br><br><br><br><br>";
							}
						}
					}

				?>

		</div>
-->


<br><br><br>
	<div id="footer">
		<span style="float:left;">&copy; Copyright 2014-15 SkillCookie. All rights reserved.</span>
		<span style="float:right;">
		</span>
	</div>



	<div id="layer">
		
	</div>




	<!--PROFILE POP BOX STARTS-->
	<div id="profile-details" class="add-item-box" style="height:250px;">
		<div id="profile-details-content" class="add-item-box-content">
			<center>
			<h3>Details</h3>
			<?php
			echo '	
				Email &nbsp;&nbsp;&nbsp;&nbsp;contact@srmuniv.ac.in<br>
				Phone &nbsp;&nbsp;&nbsp;0123 1230123 123<br>
				Website http://srmuniv.ac.in<br>
			';
			?>
			<br>
			</center>
		</div>
		<div class="close" title="Click to close this window.">
		x
		</div>
		<center><span id="message-update-profile" style="color:red;font-size:14px;"></span></center>
	</div>
	<!--PROFILE POP BOX ENDS-->



</div>

</center>
<script type="text/javascript" src="js/jquery.form.min.js"></script>
<script type="text/javascript" src="js/upload.js"></script>

<?php	include_once('./ganalytics.php');	?>


</body>
</html>
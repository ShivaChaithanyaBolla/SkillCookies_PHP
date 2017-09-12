<?php
	if(isset($_GET['id'])) {
		require_once('./classes/User.php');
		$ob = new User();
		$regno = $_GET['id'];
		$regno = $ob->decrypt($regno);
		//connect to DB and fetch originla name from there.
		$u = $ob->validUsername($regno);
		if( $u == "0" ) {
			header("Location:index.php");

		} else {
			//echo "<font size=5>".ucwords($regno)."</font>";
		}						
	}
	else {
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

<!-- favicon start-->
	<link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="./images/favicon.ico" type="image/x-icon">
<!-- favicon end -->

</head>
<body>

<div id="layer">
		
</div>

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
							require_once('./classes/User.php');
							$ob = new User();
							if($ob->isDpSet($regno) == true) {
								$dp_path = $ob->getDp($regno);	
							}
							else {
								$dp_path = './images/defaultdp.png';
							}
							echo '<img src="'.$dp_path.'" width="100%" height="100%">';
						?>
						</div>
						
					</div>

				
				
					<div id="profile-status" class="pro_mid_c">
						<div id="profile-name" class="pro_stat_c">
							<?php
								require_once('./classes/User.php');
								$ob = new User();
								echo ucwords($ob->getUsername($regno));
							?>
						</div>
						<div id="profile_achieve" class="pro_stat_c">
						<?php
							require_once('./classes/User.php');
							$ob = new User();
							echo'
							<!--<span class="status-content">1000 Followers</span>
							<span class="status-content">25 Following</span><br>-->
							<span class="status-content">'.$ob->countEvent($regno).' Events</span><br>
							<span class="status-content">'.$ob->countGigs($regno).' Gigs</span><br>
							<span class="status-content">'.$ob->countPins($regno).' Pin</span>
							';
						?>
						</div>
					</div>
					</center>
				</div>
				
				<div id="msg_box">
				   <?php
				       require_once('./authen.php');
					  
						   echo '
						      <a href="message.php?id='.$_GET['id'].'">
						      <div style="width:50px;height:30px;float:right;margin-top:-50px;background:url(images/hey.png) no-repeat center center;">
							
						       </div>
						      </a>
						     ';
				   ?>
				</div>

			</div>
			
		<br><br>


		
		<center>
		
		<div id="skilljar_1" style="background: #fff;">
			
			<div id="head_skill" class="skill_content">
				<div id="propic_skill">
					<img src="./images/description.png" width="80px" height="80px"/>
				</div>
				<div id="add_skill_pic" style="float:right;">
					
				</div>
			</div>
			<div id="content_skill" class="skill_content">
				<?php
					if(isset($_COOKIE['_u__'])) {
						require_once('./classes/User.php');
						$ob = new User();
						$regno = $ob->decrypt($_COOKIE['_u__']);
						$des = $ob->getDescription($regno);
						echo '
						<div style="margin-left:20px;">'
							.$des.
						'</div>';
					}
				?>
			</div>
			
		</div>
	<br>
		<div id="skilljar_1" style="background: #fff;">
			
			<div id="head_skill" class="skill_content">
				<div id="propic_skill">
					<img src="./images/skilljar.png" width="80px" height="80px"/>
				</div>
				<div id="add_skill_pic" style="float:right;">
					
				</div>
			</div>
			<div id="content_skill" class="skill_content">
				
				<?php
						require_once('./classes/User.php');
						$ob = new User();
						$arr = $ob->getAllSkillsByRegno($regno);

					if (count($arr)==0)
						{echo '<span class="skilljar-item" style="text-transform: none;">Skills not added by user.</span>';}
					else
						$arr = array_unique($arr);

					for($i=0;$i<count($arr);$i++) {
						$name = $ob->encrypt($arr[$i]);
						echo '
						<a style="text-decoration:none;" href="skilljar.php?skill='.$name.'">
						<span class="skilljar-item">'.$arr[$i].'</span>
						</a>';
					}
				?>
			</div>
			
		</div>
	
	<br>
	</center>


	

		<center>
			<div id="event_port">
				<div id="events_1" style="background: #fff;" class="event_port_content">
					
					<div id="head_event" class="event_content">
						<div id="propic_event">
							<img src="./images/events.png" />
						</div>
						
					</div>
					<div id="content_event" class="event_content" >
						<ul>
						<?php
								require_once('./classes/User.php');
								$ob = new User();
								$arr = $ob->getAllEventsByRegno($regno);
							for($i=0;$i<count($arr);$i++) {
								echo "<li>".$arr[$i]."</li>";
							}
						?>
						</ul>
					</div>
					
				</div>

				<div id="portfolio_1" style="background: #fff;" class="event_port_content">
					
					<div id="head_port" class="port_content">
						<div id="propic_port">
							<img src="./images/portfolio.png"  />
						</div>
					</div>
					<div id="content_port" class="port_content">
						<ul>
						<?php
								require_once('./classes/User.php');
								$ob = new User();
								$arr = $ob->getAllPortfoliosByRegno($regno);
							for($i=0;$i<count($arr);$i++) {
								echo "<li>".$arr[$i]."</li>";
							}
						?>
						</ul>
					</div>
					
				</div>
			</div>
		</center>
			
		
<center>
	<div id="footer">
		<span style="float:left;">&copy; Copyright 2014-15 SkillCookie. All rights reserved.</span>
		<span style="float:right;">
		</span>
	</div>

</center>
</div>


<!--PROFILE POP BOX STARTS-->
	<div id="profile-details" class="add-item-box" style="height:250px;">
		<div id="profile-details-content" class="add-item-box-content">
			<center>
			<h3>Profile Details</h3>
			<?php
				$email = "";
				$website = "";
				$phone = "";
				$about = "";
				$details = "";

				
					require_once('./classes/User.php');
					$ob = new User();
					//$regno = $ob->decrypt($_COOKIE['_u__']);
					require_once('./authen.php');
					$query='SELECT * FROM `details` WHERE `regno`="'.$regno.'"';
					$res=mysql_query($query);
					while($data=mysql_fetch_array($res)) {
						$email=$data['email'];
						$phone=$data['phone'];
						$website=$data['website'];
						$details=$data['details'];
					}			
				echo '
				<table>	
				<tr><td>Email &nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.$email.'</td></tr>
				<tr><td>Phone &nbsp;&nbsp;&nbsp;</td><td>'.$phone.'</td></tr>
				<tr><td>Website </td><td>'.$website.'</td></tr>
				<tr><td>About &nbsp;&nbsp;&nbsp;&nbsp;</td><td>'.$details.'</td></tr>
				</table>
				<br>
				(To get connected with him/her, Please note down above contact details)
				';
			?>
			</center>
		</div>
		<div class="close" title="Click to close this window.">
		x
		</div>
	</div>
	<!--PROFILE POP BOX ENDS-->


<script type="text/javascript" src="js/jquery.form.min.js"></script>
<script type="text/javascript" src="js/upload.js"></script>

<?php	include_once('./ganalytics.php');	?>


</body>
</html>
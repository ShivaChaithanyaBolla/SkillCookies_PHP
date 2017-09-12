<?php
	error_reporting(1);
	if(!isset($_COOKIE['_u__']) || isset($_COOKIE['_u__']) == '') {
			   $xx = base64_encode(rand(111111,999999));
	echo	'<script>window.location = "index.php?tpsu='.$xx.'";</script>';
exit();
	}
	if(isset($_COOKIE['_u__']) || isset($_COOKIE['_u__']) != '') {
		require_once('./classes/User.php');
		$ob = new User();
		$regno = $ob->decrypt($_COOKIE['_u__']);
		if (!(strcspn($regno, '0123456789') != strlen($regno))) {
	echo	'<script>window.location = "homeclub.php?tpsu='.$xx.'";</script>';
exit();	
            	}		
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		SkillCookie
	</title> 
	<!-- favicon start-->
	<link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="./images/favicon.ico" type="image/x-icon">
	<!-- favicon end -->
	<script type="text/javascript" src="./js/jquery2.js"></script>
	<script type="text/javascript" src="./js/actions.js"></script>
	<script type="text/javascript" src="./js/jqeury-ui.js"></script>

	<link rel="stylesheet" type="text/css" href="./css/home.css">
	
	<!-- Autosuggest includes: -->
		<link rel="stylesheet" type="text/css" href="./autocomplete/autosuggest.css"></link>
		<script type="text/javascript" src="./autocomplete/autosuggest.js"></script>

		
		<?php
		   require_once('./classes/User.php');
					$arr1 = $ob->getSkillsList();
		?>
		<!-- Autosuggest data: -->
		<script type="text/javascript">
		    var custom_array = <?php echo json_encode($arr1);  ?>
		</script>
		
	
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
		
	

	<div id="container">
			
			<div id="profile">	
				
				<div id="profile_head" class="pro_c" >
					<div id="profile-details-icon" >
							<img src="images/profile.png" width="30px" height="30px" align="right" id="profile_details_icon_content" title="Add Profile Details"/>
					</div>	
				</div>

				
				<div id="profile_mid" class="pro_c">
					<center>
					<div id="profile-pic" class="pro_mid_c">
						
						<div id="dp">
						<?php
							if(isset($_COOKIE['_u__'])) {
								require_once('./classes/User.php');
								$ob = new User();
								$regno = $ob->decrypt($_COOKIE['_u__']);
								if($ob->isDpSet($regno) == true) {
									$dp_path = $ob->getDp($regno);	
								}
								else {
									$dp_path = './images/defaultdp.png';
								}
								echo '<img src="'.$dp_path.'" max-width="100%" max-height="100%">';
							}
						?>
						</div>
						<div id="dp-upload" title="Upload Profile Picture">
							
						</div>
					</div>

				
				
					<div id="profile-status" class="pro_mid_c">
						<div id="profile-name" class="pro_stat_c">
							<?php
								if(isset($_COOKIE['_u__'])) {
									require_once('./classes/User.php');
									$ob = new User();
									$regno = $ob->decrypt($_COOKIE['_u__']);
									echo ucwords($ob->getUsername($regno));
								}
							?>
						</div>
						<div id="profile_achieve" class="pro_stat_c">
						<?php
							if(isset($_COOKIE['_u__'])) {
								require_once('./classes/User.php');
								$ob = new User();
								$regno = $ob->decrypt($_COOKIE['_u__']);
								echo'
								<!--<span class="status-content">1000 Followers</span>
								<span class="status-content">25 Following</span><br>-->
								<span class="status-content">'.$ob->countEvent($regno).' Events</span><br>
								<span class="status-content">'.$ob->countGigs($regno).' Gigs</span><br>
								<span class="status-content">'.$ob->countPins($regno).' Pin</span>
								';
							}
						?>
						</div>
					</div>
					</center>
				</div>
				
				

			</div>
			
		<br><br>

		<center>
		<div id="post1">
			<textarea type="text" name="add-post" id="add-post" placeholder="Type here to post . . . . ."></textarea>
		    <div class="hidden_post" id="hidden_post">
			<div id="images">
			<div id="h_pin" class="commonImg"><img id="pin" class="pin" src="./images/pin.png" height="20" width="20" style="cursor:pointer;" title="Post Pin">
         	</div><div id="h_gig" class="commonImg"><img id="gigs" class="gigs" src="./images/suitcase.png" height="20" width="20" style="cursor:pointer;" title="Post Gig">
			</div><div id="h_event" class="commonImg"><img id="event_post" class="event_post" src="./images/events1.png" height="20" width="20" style="cursor:pointer;" title="Post Event">		   
			</div></div>
			<input type="hidden" name="add-post-type" id="add-post-type" value="">
			<input type="hidden" name="post-tags" id="post-tags" value="">
			<div id="btns"><button class="post" id="hidden-add-tag-button" >Add a Skill</button>
			<button class="post" id="add-post-button" class="post-status">Post</button>
            </div>
			<br>
			<!--<span id="type-post" style="color:#888;font-size:15px;margin-left:-415px;"></span><br>  -->
			<span id="posted" style="color:red;font-size:12px;margin-top:-25px;"></span>
			<span id="post-tags-display" style="color:#000;font-size:10px;margin-left:75px;"></span>
		</div>
        </div>		
		</center>
		
<br><br><br>


		<center>

		<div id="skilljar_1" style="background: #fff;">
			
			<div id="head_skill" class="skill_content">
				<div id="propic_skill">
					<img src="./images/skilljar.png" width="80px" height="80px"/>
				</div>
				<div id="add_skill_pic" style="float:right;">
					<img id="add-button-skilljar" src="./images/add.png" height="20" width="20" style="margin-top:0px;float:right;margin-left:0px;cursor:pointer;" title="Add Skills">
				</div>
			</div>
			<div id="content_skill" class="skill_content">
				<?php
					if(isset($_COOKIE['_u__'])) {
						require_once('./classes/User.php');
						$ob = new User();
						$regno = $ob->decrypt($_COOKIE['_u__']);
						$arr = $ob->getAllSkillsByRegno($regno);
					}

					
					
					if (count($arr)==0)
						{echo '<span class="skilljar-item" style="text-transform: none;">Click the (+) button to add your Skills.</span>';}
					
						
					for($i=0;$i<count($arr);$i++) {
						$name = $ob->encrypt($arr[$i]);
						echo '
						<a style="text-decoration:none;color:black;" href="skilljar.php?skill='.$name.'">
						<span class="skilljar-item">'.$arr[$i].'</span>
						</a>';
					}
				?>
			</div>
			
		</div>
		<br>

<br><br>
		<!--
			<div id="event_port">
				<div id="events_1" style="background: #fff;" class="event_port_content">
					
					<div id="head_event" class="event_content">
						<div id="propic_event">
							<img src="./images/eventsattended.png" />
						</div>
						<div id="add_event_pic" style="float:right;">
							<img id="add-button-event" src="./images/add.png" height="20" width="20" style="margin-top:0px;float:right;margin-left:0px;cursor:pointer;" title="Add Events">
						</div>
					</div>
					<div id="content_event" class="event_content">
						<ul>
						<?php
					/*		if(isset($_COOKIE['_u__'])) {
								require_once('./classes/User.php');
								$ob = new User();
								$regno = $ob->decrypt($_COOKIE['_u__']);
								$arr = $ob->getAllEventsByRegno($regno);
							}
							if (count($arr)==0)
								{echo '<li>Click the (+) button to add an event.</li>';}
					
							for($i=0;$i<count($arr);$i++) {
								echo "<li>".$arr[$i]."</li>";
							}  */
						?>   
						</ul>
					</div>
					
				</div>

				


				<div id="portfolio_1" style="background: #fff;" class="event_port_content">
					
					<div id="head_port" class="port_content">
						<div id="propic_port">
							<img src="./images/portfolio.png"  />
						</div>
						<div id="add_portfolio_pic" style="float:right;">
							<img id="add-button-portfolio" src="./images/add.png" height="20" width="20" style="margin-top:0px;float:right;margin-left:0px;cursor:pointer;" title="Add Portfolio">
						</div>
					</div>
					<div id="content_port" class="port_content">
						<ul>
						<?php
					/*		if(isset($_COOKIE['_u__'])) {
								require_once('./classes/User.php');
								$ob = new User();
								$regno = $ob->decrypt($_COOKIE['_u__']);
								$arr = $ob->getAllPortfoliosByRegno($regno);
							}

							if (count($arr)==0)
								{echo '<li>Click the (+) button to add items to your Portfolio.</li>';}
					

							for($i=0;$i<count($arr);$i++) {
								echo "<li>".$arr[$i]."</li>";
							}  */
						?>
						</ul>
					</div>
					
				</div>
			</div>
		-->






<br><br><br><br>
	<div id="footer">
		<span style="float:left;">&copy; Copyright 2014-15 SkillCookie. All rights reserved.</span>
		<span style="float:right;">
		</span>
	</div>



	<div id="layer">
		
	</div>
</center>

	<!--EVENT POP BOX STARTS-->
	<div id="add-item-box-event" class="add-item-box">
		<div id="add-item-box-content-event" class="add-item-box-content">
			
			<input type="text" name="new-event" id="new-event">
			<input type="hidden" name="post-tags-events" id="post-tags-events" value=""><br>
			<span id="post-tags-display-" style="color:#000;font-size:10px;"></span>
			<br>
			<button class="post" id="add-tag-button-event" style="background:#e74c3c;">Add a Skill</button><br>
			<button id="add-new-event">Add Event</button>
			
		</div>
		<div class="close" title="Click to close this window.">
		x
		</div>
		<span id="message-event" style="color:red;font-size:14px;"></span>
	</div>
	<!--EVENT POP BOX ENDS-->


	<!--PORTFOLIO POP BOX STARTS-->
	<div id="add-item-box-portfolio" class="add-item-box">
		<div id="add-item-box-content-portfolio" class="add-item-box-content">
						
			<input type="text" name="new-portfolio" id="new-portfolio">
			
			<input type="hidden" name="post-tags-portfolio" id="post-tags-portfolio" value=""><br>
			<span id="post-tags-display-" style="color:#000;font-size:10px;"></span>
			<br>
			<button class="post" id="add-tag-button-portfolio" style="background:#e74c3c;">Add a Skill</button>
			
			<br>
			<button id="add-new-portfolio">Add Portfolio</button>
			
		</div>
		<div class="close" title="Click to close this window.">
		x
		</div>
		<span id="message-portfolio" style="color:red;font-size:14px;"></span>
	</div>
	<!--PORTFOLIO POP BOX ENDS-->




	<!--SKILLJAR POP BOX STARTS-->
	<div id="add-item-box-skilljar" class="add-item-box">
		<div id="add-item-box-content-skilljar" class="add-item-box-content">
			
			<input type="text" name="new-skilljar" id="new-skilljar" class="new-skilljar" placeholder="Type a Skill">
			<input type="hidden" name="post-tags-skilljar" id="post-tags-skilljar" value="">
			<span id="post-tags-display-" style="color:#000;font-size:10px;"></span>&nbsp;
			<button id="add-new-skilljarMember">Add Skill</button><br>
						<span id="filter-count" style="color:#4682B4"></span>

			
		</div>
		<div class="close" title="Click to close this window.">
		x
		</div>
		<center><span id="message-skilljar" style="color:red;font-size:14px;"></span></center><br>
	</div>
	<!--SKILLJAR POP BOX ENDS-->



	<!--DP UPLOAD FORM STARTS-->
	<div id="dp-box">
		<div id="dp-box-content">
			
			<br><br>
				Select a picture :
				<form action="dpupload.php" method="post" enctype="multipart/form-data" id="MyUploadForm">
				<input name="ImageFile" id="imageInput" type="file" /><br>
				<input class="upload-button" type="submit"  id="submit-btn" value="Upload" />
				<!--<img src="images/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>-->
				</form>
				<div id="output"></div>
			
		</div>
		<div class="close" title="Click to close this window.">
		x
		</div>
	</div>
	<!--PORTFOLIO POP BOX ENDS-->


	
	<!--ADD TAG STARTS-->

	<div id="tags-outer-box" style="z-index:10;">
		<span>Select max. 3</span><hr>
		<div id="tags-box-content">
			<?php
				if(isset($_COOKIE['_u__'])) {
					require_once('./classes/User.php');
					$ob = new User();
					$arr = $ob->getSkillsList();
				}
				for($i=0;$i<count($arr);$i++) {
					echo "<input type='checkbox' class='three-tags' name='three-tags' value='".$arr[$i]."'>".$arr[$i]."<br>";
				}
			?>
			
		</div>
		<center><button id="close11">Ok</button> </center>
	</div>
	<!--ADD TAG ENDS-->

	<!--ADD TAG STARTS-->

	<div id="tags-outer-box3">
		<span>Select max. 3</span><hr>
		<div id="tags-box-content3">
			<?php
				if(isset($_COOKIE['_u__'])) {
					require_once('./classes/User.php');
					$ob = new User();
					$arr = $ob->getSkillsList();
				}
				for($i=0;$i<count($arr);$i++) {
					echo "<input type='checkbox' class='three-tags3' name='three-tags3' value='".$arr[$i]."'>".$arr[$i]."<br>";
				}
			?>
		</div>
		<center><button id="close13">Ok</button> </center>
	</div>
	<!--ADD TAG ENDS-->

	<!--PROFILE POP BOX STARTS-->
	<div id="profile-details" class="add-item-box1" style="height:auto;">
		<div id="profile-details-content" class="add-item-box-content">
			
			<h3>Profile Details</h3>
			<?php
				$email = "";
				$website = "";
				$phone = "";
				$about = "";

				if(isset($_COOKIE['_u__'])) {
					require_once('./classes/User.php');
					$ob = new User();
					$regno = $ob->decrypt($_COOKIE['_u__']);
					require_once('./authen.php');
					$query='SELECT * FROM `details` WHERE `regno`="'.$regno.'"';
					$res=mysql_query($query);
					while($data=mysql_fetch_array($res)) {
						$email=$data['email'];
						$phone=$data['phone'];
						$website=$data['website'];
						$details=$data['details'];
					}
				}	
			
				echo '	
				Email &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="email" id="email" value="'.$email.'"><br>
				Phone &nbsp;&nbsp;&nbsp;<input type="text" name="phone" id="phone" value="'.$phone.'"><br>
				Website <input type="text" name="website" id="website" value="'.$website.'"><br>
				Description<br><textarea name="about" id="about" cols=30 rows=4>'.$details.'</textarea>
				';
			?>
			<br>
			<center><button id="update-profile">Update Profile</button></center>
			
		</div>
		<div class="close" title="Click to close this window.">
		x
		</div>
		<span id="message-update-profile" style="color:red;font-size:14px;"></span>
	</div>
	<!--PROFILE POP BOX ENDS-->

	<!-- Auto Suggestion PopUp starts-->
	
	<?php
         require_once('authen.php');
         $result = mysql_query("SELECT * FROM `skilljar`");
         echo '<div class="most_outer" id="most_outer">'; 
           while($row = mysql_fetch_array($result)) {
              echo ' 
                    <div id="outer">
                    <ul id="menu-list" class="menu-list"> 
                    <div id="inner">
                    <li id="live_search" class="live_search"> <a href="#">'.$row['skillname'].'</a></li>  
                    </div>
                    </ul>
                    </div>   
				  ';
            }
              echo '</div>';
    ?>
	<!--AutoSuggestion PopUp ends -->
</div>

<?php	include_once('./ganalytics.php');	?>

<script type="text/javascript" src="js/jquery.form.min.js"></script>
<script type="text/javascript" src="js/upload.js"></script>


</body>
</html>

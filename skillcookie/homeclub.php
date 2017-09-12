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
		if ((strcspn($regno, '0123456789') != strlen($regno))) {
					   $xx = base64_encode(rand(111111,999999));
	echo	'<script>window.location = "home.php?tpsu='.$xx.'";</script>';
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
	<script type="text/javascript" src="./js/jquery2.js"></script>
	<script type="text/javascript" src="./js/actions.js"></script>

	<link rel="stylesheet" type="text/css" href="./css/home.css">
	
	<!-- favicon start-->
	<link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="./images/favicon.ico" type="image/x-icon">
	<!-- favicon end -->
	
	<!-- Autosuggest includes: -->
		<link rel="stylesheet" type="text/css" href="./autocomplete/autosuggest.css"></link>
		<script type="text/javascript" src="./autocomplete/autosuggest.js"></script>

		
		<?php
		   require_once('./classes/User.php');
					$ob = new User();
					$arr1 = $ob->getAllMembers11();
					
					$arr2 = $ob->getSkillsList();
		?>
		<!-- Autosuggest data: -->
		<script type="text/javascript">
		    var custom_array = <?php echo json_encode($arr1);  ?>
		</script>
		<script>
					var custom_array1 = <?php echo json_encode($arr2);  ?>
         </script>
	
			<!-- Autosuggest data: -->
		<script type="text/javascript">
		    var custom_array = <?php echo json_encode($arr1);  ?>
		</script>
		
		<!-- Feedback form starts -->
		
		<script>
              var _vengage = _vengage || [];
              (function(){
              var a, b, c;
              a = function (f) {
              return function () {
              _vengage.push([f].concat(Array.prototype.slice.call(arguments, 0)));
            };
          };
          b = ['load', 'addRule', 'addVariable', 'getURLParam', 'addRuleByParam', 'addVariableByParam', 'trackAction', 'submitFeedback', 'submitResponse', 'close', 'minimize', 'openModal', 'helpers'];
          for (c = 0; c < b.length; c++) {
          _vengage[b[c]] = a(b[c]);
        }
        var t = document.createElement('script'),
        s = document.getElementsByTagName('script')[0];
        t.async = true;
        t.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://s3.amazonaws.com/vetrack/init.min.js';
        s.parentNode.insertBefore(t, s);
        _vengage.push(['pubkey', '4f2fef27-e4b1-4e41-bee3-380bf4be24c5']);
      })();
      </script>
		
		<!-- Feedback form ends -->
	
</head>
<body>

<div id="wrapper">




	<div id="header">
		<center>
			<div id="logo">
				<a href="./homeclub.php"><div id="logo-image">

				</div>
			</div>
		
			<div id="tabs">
				<?php
					require_once('tabsclub.php');
				?>
			</div>
		</center>
	</div>





	<div id="container">
		

		<div id="profile">	
				
				<div id="profile_head" class="pro_c" >
					<div id="profile-details-icon" >
							<img src="images/profile.png" width="30px" height="30px" align="right" id="profile_details_icon_content"/>
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
						<div id="dp-upload">
							
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
		<div id="post">
			<input type="text" name="add-post" id="add-post"> 

			<img id="pin" src="./images/pin.png" height="30" width="30" style="cursor:pointer;">
			<img id="gigs" src="./images/suitcase.png" height="30" width="30" style="cursor:pointer;">
			<img id="event_post" src="./images/events1.png" height="30" width="30" style="cursor:pointer;">
			
			<input type="hidden" name="add-post-type" id="add-post-type" value="">
			<input type="hidden" name="post-tags" id="post-tags" value="">
			
			<button class="post" id="add-tag-button" style="background:#e74c3c;">Add a Tag</button>
			<button class="post" id="add-post-button">Post</button>
			<span id="posted" style="color:red;font-size:12px;margin-top:-25px;margin-left:-577px;position:absolute;"></span>
			<br>
			<span id="type-post" style="color:#888;font-size:10px;margin-left:-415px;"></span><br>
			<span id="post-tags-display" style="color:#000;font-size:10px;margin-left:75px;"></span>

		</div>		
		</center><br><Br>

	<center>

        	<div id="skilljar_1" style="background: #fff;">
			
			<div id="head_skill" class="skill_content">
				<div id="propic_skill">
					<img src="./images/skilljar.png" width="80px" height="80px"/>
				</div>
				<div id="add_skill_pic" style="float:right;">
					<img id="add-button-skilljar" src="./images/add.png" height="20" width="20" style="margin-top:0px;float:right;margin-left:0px;cursor:pointer;">
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
						<a style="text-decoration:none;" href="skilljar.php?skill='.$name.'">
						<span class="skilljar-item">'.$arr[$i].'</span>
						</a>';
					}
				?>
			</div>
			
		</div>
		<br>


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
					<img src="./images/members1.png" width="80px" height="80px"/>
				</div>
				<div id="add_skill_pic" style="float:right;">
					<img id="add-button-event" src="./images/add.png" height="20" width="20" style="margin-top:0px;float:right;margin-left:0px;cursor:pointer;">
				</div>
			</div>
			<div id="content_skill" class="skill_content">
				<?php
					if(isset($_COOKIE['_u__'])) {
						require_once('./classes/User.php');
						$ob = new User();
						$regno = $ob->decrypt($_COOKIE['_u__']);
						$mem = $ob->getAllMembers($regno);
						$arr = explode("|", $mem);
						$p=0;
						for($i=0;$i<count($arr)-1;$i++) {
							$p++;

							$reg = $arr[$i]; 
							$regnum = $ob->getRegnum($reg);
							$encrypted_reg = $ob->encrypt($regnum);
							$dp_link = $ob->getDp($regnum);
							$name = ucwords($ob->getName($regnum));
							if($dp_link == "") {
								$dp_link = './images/defaultdp.png';
							}
							if($name == "") {
								$name1 = '(Not a member yet)';
							}
							if(!($name) == "")
							{
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
										<span class="member-details-regno">'.$reg.'</span>
										<span class="member-details-name">'.$name1.'</span>
									</center>
								</div>
							</div>

							</a>
							';
							}
							else {
							echo '
							<div class="member-outer-box">
								<center>
								<div class="member-box-image">
									<img src="'.$dp_link.'" height="100%" width="100%">
								</div>
								</center>
								<div class="member-box-details">
									<center>
										<span class="member-details-regno">'.$reg.'</span>
										<span class="member-details-name">'.$name1.'</span>
									</center>
								</div>
							</div>
							';

							}
							if($p%6==0){
								echo "<br><br><br><br><br><br><br><br>";
							}
						}
					}

				?>
			</div>
			
		</div>
		<br>
	</center>


<br><br><br>
	<div id="footer">
		<span style="float:left;">&copy; Copyright 2014-15 SkillCookie. All rights reserved.</span>
		<span style="float:right;">
		</span>
	</div>



	<div id="layer">
		
	</div>


	<!--EVENT POP BOX STARTS-->
	<div id="add-item-box-event" class="add-item-box">
		<div id="add-item-box-content-event" class="add-item-box-content">
			<center><br>
			<input type="text" name="new-regno" id="new-regno" placeholder="Enter the name..." required><br><br>
			         					<script type="text/javascript"> new autosuggest("new-regno", custom_array); </script>
			<button id="add-new-regno">Add Member</button>
			</center>
		</div>
		<div class="close" title="Click to close this window.">
		x
		</div>
		<center><span id="message-event" style="color:red;font-size:14px;"></span></center>
	</div>
	<!--EVENT POP BOX ENDS-->


    <!--SKILLJAR POP BOX STARTS-->
	<div id="add-item-box-skilljar" class="add-item-box">
		<div id="add-item-box-content-skilljar" class="add-item-box-content">
			
			<br>
			<input type="text" name="new-skilljar" id="new-skilljar">
			         					<script type="text/javascript"> new autosuggest("new-skilljar", custom_array1); </script>

			<br>
			<input type="hidden" name="post-tags-skilljar" id="post-tags-skilljar" value=""><br>
			<span id="post-tags-display-" style="color:#000;font-size:10px;"></span>
			<br>
			<center><button id="add-new-skilljarMember">Add Skill</button> </center>
			
		</div>
		<div class="close" title="Click to close this window.">
		x
		</div>
		<center><span id="message-skilljar" style="color:red;font-size:14px;"></span><br></center>
	</div>
	<!--SKILLJAR POP BOX ENDS-->
	
	

	<!--DP UPLOAD FORM STARTS-->
	<div id="dp-box">
		<div id="dp-box-content">
			<center>
			<br><br>
				Select a picture :
				<form action="dpupload.php" method="post" enctype="multipart/form-data" id="MyUploadForm">
				<input name="ImageFile" id="imageInput" type="file" /><br>
				<input class="upload-button" type="submit"  id="submit-btn" value="Upload" />
				<!--<img src="images/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>-->
				</form>
				<div id="output"></div>
			</center>
		</div>
		<div class="close" title="Click to close this window.">
		x
		</div>
	</div>
	<!--PORTFOLIO POP BOX ENDS-->


	
	<!--ADD TAG STARTS-->

	<div id="tags-outer-box">
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
		<div class="close2" title="Click to close this window.">
		x
		</div>
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
		<div class="close3" title="Click to close this window.">
		x
		</div>
	</div>
	<!--ADD TAG ENDS-->


	<!--PROFILE POP BOX STARTS-->
	<div id="profile-details" class="add-item-box1" style="height:auto;">
		<div id="profile-details-content" class="add-item-box-content">
			<center>
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
			Email &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="email"  id="email" value="'.$email.'" required><br>
			Phone &nbsp;&nbsp;&nbsp;<input type="text" name="phone" id="phone" value="'.$phone.'"><br>
			Website <input type="text" name="website" id="website"placeholder="web" required value="'.$website.'"><br>
			Description<br><textarea name="about" id="about" cols=30 rows=4>'.$details.'</textarea>
			';
			?>
			<br>
			<button id="update-profile">Update Profile</button>
			</center>
		</div>
		<div class="close" title="Click to close this window.">
		x
		</div>
		<center><span id="message-update-profile" style="color:red;font-size:14px;"></span></center>
	</div>
	<!--PROFILE POP BOX ENDS-->



</div>


<script type="text/javascript" src="js/jquery.form.min.js"></script>
<script type="text/javascript" src="js/upload.js"></script>

<?php	include_once('./ganalytics.php');	?>


</body>
</html>
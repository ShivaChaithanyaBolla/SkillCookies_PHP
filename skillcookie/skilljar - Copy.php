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

				</div> </a>
			</div>
		
			<div id="tabs">
				<?php
					require_once('tabs.php');
				?>
			</div>
		</center>
	</div>






	<div id="container">
		

			<div id="profile" style="height: 150px;">	
				
				<div id="profile_head" class="pro_c" >
					<br>
				</div>

				
				<div id="profile_mid" class="pro_c">
					<center>

				
				
					<div id="profile-status" class="pro_mid_c">
						<div id="profile-name" class="pro_stat_c">
							<?php
								if(isset($_GET['skill'])) {
									require_once('./classes/Skilljar.php');
									$ob = new Skilljar();
									$skill = $ob->decrypt($_GET['skill']);
									//connect to DB and fetch originla name from there.
									$skillname = $ob->getSkillName($skill);
									if( $skillname == "0" ) {
										echo "<font size=5>".ucwords("Skilljars")."</font>";
									} else {
										echo "<font size=5>".ucwords($skillname)."</font>";
									}						
								}
							?>
						</div>
						
					</div>
					</center>
				</div>
		
		
				<br><br>

		<div id="events">
			<div class="leftside-icon">
				
			</div>
	
			<ul>
				<?php
					require_once('./authen.php');
					require_once('./classes/News.php');				
					$news = array();
					$obj = new News();
					$skill = $skillname;
					array_push($news, $obj->getRelatedPins($skill));
					array_push($news, $obj->getRelatedEvents($skill));
					array_push($news, $obj->getRelatedGigs($skill));
					$a = $news;
					foreach ($a as $v1) {
				    foreach ($v1 as $v2) {				    
				    
				    	$name = $v2[3];
				    	switch ($name) {
				    		case 'pin':
				    			$li_image = '<img height=30 width=30 src="./images/pin.png">';
				    			break;
				    		case 'gig':
				    			$li_image = '<img height=35 width=35 src="./images/suitcase.png">';
				    			break;
				    		case 'event':
				    			$li_image = '<img height=35 width=35 src="./images/events.png">';
				    			break;	
				    		default:
				    			$li_image = "";
				    			break;
				    	}

				        echo '<span style="margin-left:60px;color:#3498db;font-weight:bold;text-decoration:none;"><a href="view.php?id='.$obj->encrypt($v2[0]).'">'.$v2[0].'</a></span><br>';
				        echo '<span style="margin-left:60px;">'.$v2[1].'</span>';
				        echo '<span style="color:#ccc;float:right;font-size:12px;"></span><br>';
				        echo '<span style="color:#666;float:left;font-size:12px;margin-top:-30px;">'.$li_image.'</span><br>';
				        echo '<br>';
				        //echo "<hr style='background-color:#ddd;border-width:0;color:#ddd;height:1px;line-height:0;text-align:left;width:600px;;'/>";
				    }
				}
				?>
				<style type="text/css">
				a{text-decoration: none;color:#3498db;}
				a:hover{text-decoration: underline;color: black;}
				a:visited{text-decoration: none;color:#3498db;}
				</style>
			</ul>
		</div>






	<div id="footer">
		<span style="float:left;">&copy; Copyright 2014-15 SkillCookie. All rights reserved.</span>
		<span style="float:left;">
		</span>
	</div>


</div>


<script type="text/javascript" src="js/jquery.form.min.js"></script>
<script type="text/javascript" src="js/upload.js"></script>

<?php	include_once('./ganalytics.php');	?>


</body>
</html>
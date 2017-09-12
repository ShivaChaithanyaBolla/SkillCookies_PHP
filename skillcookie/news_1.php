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

<div id="layer">
		
</div>

<div id="wrapper">


	<div id="header">
		<center>
			<div id="logo">
				<a href="home.php"><div id="logo-image">

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
		

		<br><br>

		<div id="portfolio">
			<div class="leftside-icon">
				
			</div>
			<?php

				require_once('./authen.php');
				require_once('./classes/News.php');	
				require_once('./classes/User.php');				
				$news = [];
				$newsids = [];

				$obj = new News();
				$obj7 = new User();
				$regno = $obj->decrypt($_COOKIE['_u__']);
				$skills = array_unique($obj->getMySkills($regno));
				//print_r($obj->getMyClubs($regno));
				
				foreach($skills as $skill) {
					$x = $obj->getRelatedPins($skill);
					for($j=0;$j<count($x);$j++) {
						if(!in_array($x[$j], $news))
							array_push($news, $x[$j]);
					}
				}

				foreach($skills as $skill) {
					$x = $obj->getRelatedEvents($skill);
					for($j=0;$j<count($x);$j++) {
						if(!in_array($x[$j], $news))
							array_push($news, $x[$j]);
					}
				}

				foreach($skills as $skill) {
					$x = $obj->getRelatedGigs($skill);
					for($j=0;$j<count($x);$j++) {
						if(!in_array($x[$j], $news))
							array_push($news, $x[$j]);
					}
				}
				$cnt = count($news);
				for($p=1;$p<$cnt;$p++) {
					for($q=$cnt-1;$q>=$p;$q--) {
						if($news[$q-1][2]>$news[$q][2]) {
							$e = $news[$q-1];
							$news[$q-1] = $news[$q];
							$news[$q] = $e;
						}
					}
				}
				//var_dump($news);


				$news = array_reverse($news);
				$a = $news;
				foreach ($a as $v2) {
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

				        echo '<span style="margin-left:80px;color:#3498db;font-weight:bold;text-decoration:none;"><a href="view.php?id='.$obj->encrypt($v2[0]).'">'.ucwords($obj7->getName($v2[0])).'</a></span><br>';
				        echo '<span style="margin-left:80px;">'.$v2[1].'</span>';
				        //date('m/d/Y',$v2[2])
				        echo '<span style="color:#ccc;float:right;font-size:12px;"></span><br>';
				        echo '<span style="color:#666;float:left;font-size:12px;margin-top:-30px;margin-left:30px;">'.$li_image.'</span><br>';

				        if($v2[3] == 'pin' || $v2[3] == 'gig') {
				        	echo '
				        	<div class="votes" style="height:50px;width:20px;float:left;margin-top:-55px;z-index:-100;">
					        	
					        	<div class="upvote" style="height:20px;width:20px;opacity:0.5;float:left;text-align:center;cursor:pointer;">
					        		<img src="./images/up.gif" height=100% width=100%>
					        		<span class="votes_status" style="margin-top:-40px;font-size:13px;color:#000;position:absolute;margin-left:-10px;font-weight:bold;" xyz="hello">'.$obj->getUpvotes($v2[4], $v2[3]).'</span>
					        		
					        		<input type="hidden" value="'.$v2[4].'" field="'.$v2[3].'" regno="'.$obj->decrypt($_COOKIE['_u__']).'" id="votes_id" name="votes_id">
					        	</div>
					        	
					        	<div class="downvote" style="height:20px;width:20px;opacity:0.5;float:left;cursor:pointer;margin-top:10px;font-weight:bold;">
					        		<img src="./images/down.gif" height=100% width=100%>
					        		<span class="votes_status" style="font-size:13px;color:#000;position:absolute;">'.$obj->getDownvotes($v2[4], $v2[3]).'</span>

					        		<input type="hidden" value="'.$v2[4].'" field="'.$v2[3].'" regno="'.$obj->decrypt($_COOKIE['_u__']).'" id="votes_id" name="votes_id">
					        	</div>

				        	</div>
				        	';
				        }

				        echo '<br><br><br><br>';
				        //echo "<hr style='background-color:#ddd;border-width:0;color:#ddd;height:1px;line-height:0;text-align:left;width:600px;;'/>";
				
				}

			?>
			
			<style type="text/css">
				a{text-decoration: none;color:#3498db;}
				a:hover{text-decoration: underline;color: black;}
				.upvote img:hover{opacity: 1;}
				.downvote img:hover{opacity: 1;}
			</style>

		</div>
	</div>




<center>
	<div id="footer">
		<span style="float:left;">&copy; Copyright 2014-15 SkillCookie. All rights reserved.</span>
		<span style="float:right;">
		</span>
	</div>
</center>

</div>


<script type="text/javascript" src="js/jquery.form.min.js"></script>
<script type="text/javascript" src="js/upload.js"></script>

<?php	include_once('./ganalytics.php');	?>


</body>
</html>
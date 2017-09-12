<!DOCTYPE html>
<html>
<head>
	<title>
		SkillCookie
	</title> 
	<script type="text/javascript" src="./js/jquery2.js"></script>
	<script type="text/javascript" src="./js/actions.js"></script>

	<link rel="stylesheet" type="text/css" href="./css/home.css">
	<link rel="stylesheet" type="text/css" href="./css/style.css">

<!-- favicon start-->
	<link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="./images/favicon.ico" type="image/x-icon">
<!-- favicon end -->

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
										echo ucwords("Skilljars");
									} else {
										echo ucwords($skillname);
									}						
								}
							?>
						</div>
						
					</div>
					</center>
				</div>
			<br><br>
		
		<center>	

	<div id="container_1" style="margin-top: 70px;">
		<center>

			<section class="main">

				<ul class="timeline">



					<?php



					require_once('./authen.php');
					require_once('./classes/News.php');	 	
                    require_once('./classes/User.php');						
					$news = array();
					$news1 = array();
					$obj7 = new User();
					$obj = new News();
					$skill = $skillname;
					
					$x = $obj->getRelatedPins($skill);
					for($j=0;$j<count($x);$j++) {
						if(!in_array($x[$j], $news))
							array_push($news, $x[$j]);
					}
					 
					 $x = $obj->getRelatedEvents($skill);
					for($j=0;$j<count($x);$j++) {
						if(!in_array($x[$j], $news))
							array_push($news, $x[$j]);
					}
					
					$x = $obj->getRelatedGigs($skill);
					for($j=0;$j<count($x);$j++) {
						if(!in_array($x[$j], $news))
							array_push($news, $x[$j]);
					}
					
					  $cnt = count($news);
				for($p=1;$p<$cnt;$p++) {
					for($q=$cnt-1;$q>=$p;$q--) {
						if($news[$q-1][5]>$news[$q][5]) {
							$e = $news[$q-1];
							$news[$q-1] = $news[$q];
							$news[$q] = $e;
						}
					}
				}
				$news = array_reverse($news);
					$a = $news;
				    foreach ($a as $v2) {				    
				    	$name = $v2[3];
				    	switch ($name) {
				    		case 'pin':
				    			$li_image = '<img height=50 width=50 src="./images/pin.png">';
				    			break;
				    		case 'gig':
				    			$li_image = '<img height=50 width=50 src="./images/suitcase.png">';
				    			break;
				    		case 'event':
				    			$li_image = '<img height=50 width=50 src="./images/events1.png">';
				    			break;	
				    		default:
				    			$li_image = "";
				    			break;
				    	}


				    	echo '<li class="event">
						
						<div class="thumb"><p style="overflow:visible;z-index:-20;padding-left: 200%; padding-right: 25%;">'.$li_image.'</p></div>
						<div class="content-perspective">
							<div class="content">
								<div class="content-inner">
									<h3><a href="view.php?id='.$obj->encrypt($v2[0]).'">'.ucwords($obj7->getName($v2[0])).'</a></h3>';

// The Regular Expression filter
$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
									
// The Text you want to filter for urls
$text = $v2[1];

// Check if there is a url in the text
if(preg_match($reg_exUrl, $text, $url)) {

       // make the urls hyper links
      echo  '<p>'. preg_replace($reg_exUrl, '<i><a style="color:#FFAA70;" href="'.$url[0].'" rel="nofollow" target="_blank;">'.$url[0].'</a><i>', $text).'</p>';

} else {

       // if no urls in the text just return the text
       echo '<p>'.$text.'</p>';

}
								echo '</div>';


								if($v2[3] == 'pin' || $v2[3] == 'gig' || $v2[3] == 'event') {
								echo'
								<div class="votes">
					        	
					        	<div class="upvote">
					        		<span class="votes_status">'.$obj->getUpvotes($v2[4], $v2[3]).'</span>
					        		<img src="./images/up.gif" height=30px width=30px title="Vote Up">
					        		
					        		
					        		<input type="hidden" value="'.$v2[4].'" field="'.$v2[3].'" regno="'.$obj->decrypt($_COOKIE['_u__']).'" id="votes_id" name="votes_id">
					        	</div>
					        	
					        	<div class="downvote">
					        		<img src="./images/down.gif" height=30px width=30px title="Vote Down">
					        		<span class="votes_status">'.$obj->getDownvotes($v2[4], $v2[3]).'</span>

					        		<input type="hidden" value="'.$v2[4].'" field="'.$v2[3].'" regno="'.$obj->decrypt($_COOKIE['_u__']).'" id="votes_id" name="votes_id">
					        	</div>
								</div>';}

								else{
								echo'
								<div class="votes">
					        	
					        	<div class="upvote">					        		
					        		
					        	</div>
					        	
					        	<div class="downvote">
					        	</div>
								</div>';}

						echo '</div>
					</li>';

				}
				   ?>




				</ul>
			</section>
		</div>


	
		</center>
	






		

		

<center>
	<div id="footer">
		<span style="float:left;">&copy; Copyright 2014-15 SkillCookie. All rights reserved.</span>
		<span style="float:left;">
		</span>
	</div>
</center>

</div>


<script type="text/javascript" src="js/jquery.form.min.js"></script>
<script type="text/javascript" src="js/upload.js"></script>

<?php	include_once('./ganalytics.php');	?>

</body>
</html>
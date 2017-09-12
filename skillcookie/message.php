<?php
	if(isset($_GET['id'])) {
		require_once('./classes/User.php');
		$ob = new User();
		$to = $_GET['id'];		
		$to = $ob->decrypt($to);
		
		$x = $ob->validUsername($to);
		if( $x == "0" ) {
			$to = "null";
		}
	}
	else {
		$to = "null";
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
	<link rel="stylesheet" type="text/css" href="./css/msg.css">

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
		

		<br><br>

		<div id="portfolio">
			<div class="leftside-icon">
				
			</div>
			<?php
				if($to != "null") {
									$obj3 = new User();
									$frm = $ob->decrypt($_COOKIE['_u__']);
									$obj3->makeStatusRead($frm,$to);
									$obj3->makeNotifyNull($frm,$to);
									echo '
									        <style>
											   #notify {
											        visibility:hidden;
											   }
											</style>
									
									     ';
									

					echo'
					<center>
					<textarea name="msg-text" id="msg-text" rows=5 cols=40 style="font-family:Georgia"></textarea>
					<div id="msgBlock"></div>
					<br>
					<button id="send-msg">Send Message</button>
					<div id="forcenter" style=" width: 170px;"><div id="loading" style="margin:0 auto;"></div></div>
					<input type="hidden" name="to" id="to" value='.$ob->encrypt($to).'><br>
					<input type="hidden" name="from" id="from" value='.$_COOKIE['_u__'].'><br>
					<span id="error"></span>
					<hr>
					<!--<a href="message.php?id='.$ob->encrypt($to).'"><button>Refresh</button></a><br><br> -->
					</center> ';

                    echo '<div id="recentMsg">';
					   $obj3->getMessages($to, $frm);	
                    echo '</div>';					
                    echo '
                         <script type="text/javascript">
                         var auto_refresh = setInterval(
                         function ()
                          {
                            $("#recentMsg").load("record_count.php?to='.$to.'&from='.$frm.'").fadeIn("slow");
                          }, 1000); // refresh every 10000 milliseconds

                        </script>
                        ';
				} else {
					require_once('./classes/User.php');
					$obj3 = new User();
					echo '
									        <style>
											   #notify {
											        visibility:hidden;
											   }
											</style>
									
									     ';
					echo '

					<div style="width:100%;height:600px;font-family:gillsansmt;">
						'.$obj3->getInboxMsgs($obj3->decrypt($_COOKIE['_u__'])).'
						
						'.$obj3->getSentMsgs($obj3->decrypt($_COOKIE['_u__'])).'
						</div>

					</div>

					';
				}			
			
			?>
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



</body>
</html>
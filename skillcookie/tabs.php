<link rel="stylesheet" href="./css/jquery-ui.css">
<script type="text/javascript" src="./js/jquery-ui.js"></script>
<script type="text/javascript" src="./js/notify.js"></script>
			
			
			<?php
			     require_once('./classes/User.php');
			     $ob = new User();
				 $regnumber = $ob->decrypt($_COOKIE['_u__']);
				 $notifications = $ob ->notify($regnumber);
								echo "<input type='hidden' name='regnumber' id='regnumber' value='".$regnumber."'>";
				if($notifications == 0) {
				echo '
					    <style> .notify {
			               visibility: hidden;
			            }</style>
				     ';
				} else {
				echo '
					    <style> .notify {
			               visibility: visible;
			            }</style>
				     ';
				
				}   
			?>
		

			
			<div id="navbar" style="display:inline-block;">
			   <div>
				   <nav>
				   <?php
				   $xx = base64_encode(rand(111111,666666));
					echo '<a id="home" href="./home.php?tpsu='.$xx.'"><div>Home</div></a>
					<a href="./news.php?tpsu='.$xx.'"><div>What`s hot?</div></a>
					<a href="./srm.php?tpsu='.$xx.'"><div>SRM</div></a>
					<a id="messageCheck" href="./message.php?tpsu='.$xx.'"><div>Messages</div><span class="notify green" id="notify">'.$notifications.'</span></a>
					<a href="./search.php?tpsu='.$xx.'"><div>Search</div></a>
					<a href="./logout.php?tpsu='.$xx.'"><div>Log Out</div></a> ';
					?>
					</nav>
			   </div>

			</div>	

			
			

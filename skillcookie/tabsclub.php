<script type="text/javascript" src="./js/jquery-ui.js"></script>
			<div id="navbar" style="display:inline-block;">
				<div>
				   <?php
				   $xx = base64_encode(rand(111111,666666));
					echo '<a href="./homeclub.php?sessid='.$xx.'"><div>Home</div></a>
					<a href="./news.php?sessid='.$xx.'"><div>What`s new?</div></a>
					<a href="./srm.php?sessid='.$xx.'"><div>SRM</div></a>
					<a href="./message.php?sessid='.$xx.'"><div>Messages</div></a>
					<a href="./search.php?sessid='.$xx.'"><div>Search</div></a>
					<a href="./logout.php?sessid='.$xx.'"><div>Log Out</div></a> ';
					?>
				</div>

			</div>


			
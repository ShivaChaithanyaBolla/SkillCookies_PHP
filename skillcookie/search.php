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

<!-- favicon start-->
	<link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
        <link rel="icon" href="./images/favicon.ico" type="image/x-icon">
<!-- favicon end -->
		<!-- Autosuggest includes: -->
		<link rel="stylesheet" type="text/css" href="./autocomplete/autosuggest.css"></link>
		<script type="text/javascript" src="./autocomplete/autosuggest.js"></script>

		
		<?php
		   require_once('./classes/User.php');
					$ob1 = new User();
					$arr1 = $ob1->getSkillsList();
		?>
		<!-- Autosuggest data: -->
		<script type="text/javascript">
		    var custom_array = <?php echo json_encode($arr1);  ?>
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

<div id="layer">
		
</div>

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


		<center>

		<div id="search" style="max-width:700px;">
			
				<center>
					<div style="margin-top: 10px;">
					<input type="text" id="query" name="query" size=60 placeholder="Type a skill here...">
					   <script type="text/javascript"> new autosuggest("query", custom_array); </script>
					<br><br>
					<input type="hidden" name="search-categ" id="search-categ">

					<button id="search_skill">People</button>
					<button id="search_event">Events</button>
					<button id="search_pin">pins</button>
					<button id="search_gig">gigs</button>
					<button id="search_club">Clubs</button>
					<br>
					<span id="type-search" style="font-size:10px;color:#777;"></span>
					<br>
					<button id="search-btn">Search</button>
					
					</div>

					<div id="message" style="box-sizing: border-box;"> 
						<a href="message.php?id=VFZSQk5FMVVSWGhOUkVFd1RWRTlQUT09">
						<div style='background: url("images/hey.png") no-repeat center; width: 50px; height: 50px; margin-top: -50px; float: right;'>
						<div style='background: url("images/hey.png") no-repeat center; width: 50px; height: 50px; margin-top: -50px; float: right;'>
							<a href="message.php?id=VFZSQk5FMVVSWGhOUkVFd1RWRTlQUT09">
							</a></div>	
						</div>
						</a>
					</div>
				</center>
			<br>

		</div>
		<br>

		</center>

		<style>

			#search
			{
				box-sizing: border-box;
				width: 900px;
				height: auto;
				//background: rgba(255,255,255,1);
				//border:0.1px solid #000;
				//box-shadow:  0px 4px 6px 1px rgba(50, 50, 50, 0.14);
				//border-radius: 10px 10px 10px 10px;
				padding-top: 20px;
				margin-top: 10px;
			}

			#search input[id="query"] {
				border-radius: 5px;
				padding: 3px;
				font-size: 15px;
				border: 1px solid #ccc;
			}
			#search button{
			border: 0px;
			border-radius: 3px;
			font-family: 'seg'; 
			font-size: 14px;
			padding: 6px 10px 6px 10px; text-decoration:none; display:inline-block; color: #FFFFFF;
			background-color: rgba(79,130,186,0.6);
			box-shadow:  0px 4px 6px 1px rgba(50, 50, 50, 0.2); 
			*filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#B29AF8, endColorstr=#9174ED);
			}

			#search button:hover{
			 /*border-top-color: #8E6AF5;border-right-color: #8E6AF5;border-bottom-color: #8e6af5;border-left-color: #8e6af5;border-width: 1px 15px 1px 1px;border-style: solid;*/
			 background-color: rgba(79,130,186,1); 
			 box-shadow:  0px 4px 6px 1px rgba(50, 50, 50, 0.1);
			 *filter:progid:DXImageTransform.Microsoft.gradient(GradientType=0,startColorstr=#B29AF8, endColorstr=#9174ED);
			}

			#search-btn
			{
				border-radius: 0px !important;
				background: rgba(0,0,0,0.5) !important;
				color: #FFF;
				width: 100px;
				font-size: 15px;
				font-weight: bold;
				border-radius: 2px;
				box-shadow: none !important;
			}

			#query
			{
				font-family: "tah";
				width: 500px;
				color: rgba(76,130,186,1);
				box-sizing: border-box;
			}

			#message
			{
				font-family: 'arial';
				//box-shadow:  0px 4px 6px 1px rgba(50, 50, 50, 0.3);
				width: 100%;
				max-height: 400px;
				overflow-x:hidden;
			}
		</style>



	</div>


	<center>

	<div id="footer">
		<span style="float:left;">&copy; Copyright 2014-15 SkillCookie. All rights reserved.</span>
		<span style="float:right;">
		</span>
	</div>


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
</center>

<script type="text/javascript" src="js/jquery.form.min.js"></script>
<script type="text/javascript" src="js/upload.js"></script>

<?php	include_once('./ganalytics.php');	?>


</body>
</html>
<?php
	require_once('./classes/Others.php');
	class User extends Others {

		public function getUsername($regno) {
			require_once('./authen.php');
			$query='SELECT * FROM `signup` WHERE `regno`="'.$regno.'"';
			$res=mysql_query($query);
			while($data=mysql_fetch_array($res)) {
				$user=$data['name'];
			}
			return $user;
		}

		public function validUsername($regno) {
			require_once('./authen.php');
			$query='SELECT * FROM `signup` WHERE `regno`="'.$regno.'"';
			$res=mysql_query($query);
			$user = "0";
			while($data=mysql_fetch_array($res)) {
				$user=$data['name'];
			}
			return $user;
		}

		public function getAllEventsByRegno($regno){
			require_once('./authen.php');
			$query='SELECT `event` FROM `events` WHERE `regno`="'.$regno.'" ORDER BY `time` DESC';
			$res=mysql_query($query);
			$events = array();
			while($data=mysql_fetch_array($res)) {
				array_push($events, $data['event']);
			}
			return $events;
		}

		public function getAllPortfoliosByRegno($regno){
			require_once('./authen.php');
			$query='SELECT `portfolio` FROM `portfolio` WHERE `regno`="'.$regno.'" ORDER BY `time` DESC';
			$res=mysql_query($query);
			$events = array();
			while($data=mysql_fetch_array($res)) {
				array_push($events, $data['portfolio']);
			}
			return $events;
		}

		public function addEvent($regno, $event, $posttags){
			require_once('./authen.php');
			$query="INSERT INTO `events` (`regno`, `event`, `tags`) VALUES ('".htmlentities($regno)."','".htmlentities($event)."', '".htmlentities($posttags)."')";
			mysql_query($query);
		}

		public function addPin($regno, $pin, $posttags){
			require_once('./authen.php');
			$query="INSERT INTO `pins` (`regno`, `pin`, `tags`) VALUES ('".htmlentities($regno)."','".htmlentities($pin)."', '".htmlentities($posttags)."')";
			mysql_query($query);
		}

		public function addGig($regno, $gig, $posttags){
			require_once('./authen.php');
			$query="INSERT INTO `gigs` (`regno`, `gig`, `tags`) VALUES ('".htmlentities($regno)."','".htmlentities($gig)."', '".htmlentities($posttags)."')";
			mysql_query($query);
		}

		public function addPortfolio($regno, $portfolio, $posttags){
			require_once('./authen.php');
			$query="INSERT INTO `portfolio` (`regno`, `portfolio`, `tags`) VALUES ('".htmlentities($regno)."','".htmlentities($portfolio)."', '".htmlentities($posttags)."')";
			mysql_query($query);
		}

		public function addDetails($regno, $email, $phone, $website, $details){
			require_once('./authen.php');
			$q = mysql_query("SELECT `regno` FROM `details` WHERE `regno` = '".$regno."'");
			if(mysql_num_rows($q) > 0) {	//user exists
				mysql_query('UPDATE `details` SET `email`="'.htmlentities($email).'", `phone`="'.htmlentities($phone).'", `website`="'.htmlentities($website).'", `details`="'.htmlentities($details).'" WHERE `regno` = "'.$regno.'"');
				return true;
			}
			else {	//user doesn't exist
				mysql_query("INSERT INTO `details` (`regno`, `email`, `phone`, `website`, `details`) VALUES ('".htmlentities($regno)."','".htmlentities($email)."', '".htmlentities($phone)."', '".htmlentities($website)."', '".htmlentities($details)."')");
				return false;
			}
		}
		
		
	
		

		public function isDpSet($regno) {
			require_once('./authen.php');
			$q = mysql_query("SELECT `regno` FROM `profile` WHERE `regno` = '".$regno."'");
			if(mysql_num_rows($q) > 0)
				return true;	//user exists
			else 
				return false;	//user doesn't exist
		}

		public function getDp($regno) {
			require_once('./authen.php');
			$query='SELECT * FROM `profile` WHERE `regno`="'.$regno.'"';
			$res=mysql_query($query);
			$path="./images/defaultdp.png";
			while($data=mysql_fetch_array($res)) {
				$path=$data['dppath'];
			}
			return $path;
		}
		public function getName($regno) {
			require_once('./authen.php');
			$query='SELECT * FROM `signup` WHERE `regno`="'.$regno.'"';
			$res=mysql_query($query);
			while($data=mysql_fetch_array($res)) {
				$path=$data['name'];
			}
			return $path;
		}
		public function getNameClub($regno) {
			require_once('./authen.php');
			$query='SELECT * FROM `signup_club` WHERE `username`="'.$regno.'"';
			$res=mysql_query($query);
			while($data=mysql_fetch_array($res)) {
				$path=$data['name'];
			}
			return $path;
		}
		public function getTagEvent($regno,$eventid) {
		    require_once('./authen.php');
			$query = 'SELECT * FROM `events` WHERE `tags`="'.$regno.'" AND `eventid`="'.$eventid.'"';
			$res = mysql_query($query);
			while($data=mysql_fetch_array($res)) {
			     $path=$data['event'];
			}
			return $path;
		}
		public function getTagGig($regno,$gigid) {
		    require_once('./authen.php');
			$query = 'SELECT * FROM `gigs` WHERE `tags`="'.$regno.'" AND `gigid`="'.$gigid.'"';
			$res = mysql_query($query);
			while($data=mysql_fetch_array($res)) {
			     $path=$data['gig'];
			}
			return $path;
		}
		public function getTagPin($regno,$pinid) {
		    require_once('./authen.php');
			$query = 'SELECT * FROM `pins` WHERE `tags`="'.$regno.'" AND `pinid`="'.$pinid.'"';
			$res = mysql_query($query);
			while($data=mysql_fetch_array($res)) {
			     $path=$data['pin'];
			}
			return $path;
		}
		
		public function getClubAdmin($regno) {
			require_once('./authen.php');
			$query='SELECT * FROM `signup_club` WHERE `username`="'.$regno.'"';
			$res=mysql_query($query);
			while($data=mysql_fetch_array($res)) {
				$path=$data['clubadmin'];
			}
			return $path;
		}

		public function getAllSkillsByRegno($regno) {
			require_once('./authen.php');
			$query='SELECT `skillname` FROM `skills` WHERE `regno` = "'.$regno.'"';
			$res=mysql_query($query);
			$events = array();
			while($data=mysql_fetch_array($res)) {
				array_push($events, $data['skillname']);
			}
			return $events;
		}

		public function addSkilljar($regno, $skilljar){     
			require_once('./authen.php');
			$q = mysql_query("SELECT * FROM `skills` WHERE `regno` = '".$regno."' AND `skillname`='".$skilljar."'  ");
			if(mysql_num_rows($q) > 0)
			    $temp = 1;
			else
			    $temp = 0;
			if(($this->skillExistence($skilljar) == true) && $temp==0 ) {
				//if exists in the skill list, then add it to the profile of the user
				mysql_query("INSERT INTO `skills` (`regno`, `skillname`) VALUES ('".htmlentities($regno)."','".htmlentities($skilljar)."')");
				echo "Skill added!";
			} else if(($this->skillExistence($skilljar) == true) && $temp==1 ) {
                echo "You have already added this skill to your Skilljar";

            } else {
				mysql_query("INSERT INTO `skillapproverequest` (`skillname`, `regno`) VALUES ('".htmlentities($skilljar)."','".htmlentities($regno)."')");
				echo "This skill is sent to admin for approval.";
			}			
		}

		public function addSkillToClub($regno, $addregno){
			$addreg = $addregno;
			$addregno = $addregno."|";
			require_once('./authen.php');
			$q = mysql_query("SELECT `regno` FROM `club_skills` WHERE `regno` = '".$regno."'");
			if(mysql_num_rows($q) > 0) {	//user exists
				$query='SELECT `skills` FROM `club_skills` WHERE `regno` = "'.$regno.'"';
				$res=mysql_fetch_row(mysql_query($query));
				$mem = $res[0];
				$members = explode("|", $mem);
				//print_r($members);
				for($i=0;$i<(count($members)-1);$i++) {
					if($members[$i]==$addreg) {
						return;
					}
				}
				$updated = $mem.$addregno;
				mysql_query('UPDATE `club_skills` SET `skills`="'.$updated.'" WHERE `regno` = "'.$regno.'"');
			}
			else {	//user doesn't exist
				mysql_query("INSERT INTO `club_skills` (`regno`, `skills`) VALUES ('".$regno."','".$addregno."')");
			}

		}

		public function skillExistence($skill) {
			require_once('./authen.php');
			$q = mysql_query("SELECT `skillname` FROM `skilljar` WHERE `skillname` = '".$skill."'");
			if(mysql_num_rows($q) > 0)
				return true;	//user exists
			else 
				return false;	//user doesn't exist
		}

		public function countEvent($regno) {
			require_once('./authen.php');
			$query='SELECT COUNT(*) FROM `events` WHERE `regno` = "'.$regno.'"';
			$res=mysql_fetch_row(mysql_query($query));
			return $res[0];
		}

		public function countGigs($regno) {
			require_once('./authen.php');
			$query='SELECT COUNT(*) FROM `gigs` WHERE `regno` = "'.$regno.'"';
			$res=mysql_fetch_row(mysql_query($query));
			return $res[0];
		}

		public function countPins($regno) {
			require_once('./authen.php');
			$query='SELECT COUNT(*) FROM `pins` WHERE `regno` = "'.$regno.'"';
			$res=mysql_fetch_row(mysql_query($query));
			return $res[0];
		}

		public function getSkillsList() {
			require_once('./authen.php');
			$query='SELECT `skillname` FROM `skilljar`';
			$res=mysql_query($query);
			$events = array();
			while($data=mysql_fetch_array($res)) {
				array_push($events, $data['skillname']);
			}
			return $events;
		}
		public function getAllMembers11() {
		    require_once('./authen.php');
			$query='SELECT `name` FROM `signup`';
			$res=mysql_query($query);
			$events=array();
			while($data=mysql_fetch_array($res)) {
			    array_push($events,$data['name']);
			}
			return $events;
		
		}
		

	        public function getDescription($regno) {
		     require_once('./authen.php');
			$query='SELECT `details` FROM `details` WHERE `regno` = "'.$regno.'"';
			$res=mysql_fetch_row(mysql_query($query));
			if($res[0] != null)
			   return $res[0];	
			else  {
			   $res[0] = "Please update your profile to add Description of your club...";
		       return $res[0];
			}

		}

		

		public function addMemberToClub($regno, $addregno){
			$addreg = $addregno;
			$addregno = $addregno."|";
			require_once('./authen.php');
			$q = mysql_query("SELECT `regno` FROM `club_members` WHERE `regno` = '".$regno."'");
			if(mysql_num_rows($q) > 0) {	//user exists
				$query='SELECT `members` FROM `club_members` WHERE `regno` = "'.$regno.'"';
				$res=mysql_fetch_row(mysql_query($query));
				$mem = $res[0];
				$members = explode("|", $mem);
				//print_r($members);
				for($i=0;$i<(count($members)-1);$i++) {
					if($members[$i]==$addreg) {
						echo "Already exists.";
						return;
					}
				}
				$updated = $mem.$addregno;
				mysql_query('UPDATE `club_members` SET `members`="'.$updated.'" WHERE `regno` = "'.$regno.'"');
				echo "Member added.";
			}
			else {	//user doesn't exist
				mysql_query("INSERT INTO `club_members` (`regno`, `members`) VALUES ('".$regno."','".$addregno."')");
				echo "Member added.";
			}

		}

		public function getAllMembers($regno) {
			require_once('./authen.php');
			$query='SELECT `members` FROM `club_members` WHERE `regno` = "'.$regno.'"';
			$res=mysql_fetch_row(mysql_query($query));
			$mem = $res[0];
			return $mem;
		}
		
		public function getRegnum($regnum) {
		    require_once('./authen.php');
			$query='SELECT `regno` FROM `signup` WHERE `name` = "'.$regnum.'"';
			$res=mysql_fetch_array(mysql_query($query));
			$num = $res['regno'];
			return $num;
		}
		

		public function getAllClubs() {
			require_once('./authen.php');
			$query='SELECT `username` FROM `signup_club`';
			$res=mysql_query($query);
			$clubs = array();
			while($data=mysql_fetch_array($res)) {
				array_push($clubs, $data['username']);
			}
			return $clubs;
		}


	
		public function sendMessage($from, $to, $msg, $time){
			require_once('./authen.php');
			$query="INSERT INTO `messages` (`from`, `to`,`message`, `time`,`notify`,`read`) VALUES ('".htmlentities($from)."','".htmlentities($to)."', '".htmlentities($msg)."', '".htmlentities($time)."','1','0')";
			mysql_query($query);
		}

		public function getMessages($to, $from) {
			require_once('./authen.php');
			$query = 'SELECT * FROM `messages` WHERE `to` = "'.$to.'" AND `from` = "'.$from.'" OR `to` = "'.$from.'" AND `from` = "'.$to.'" ORDER BY `time` DESC';
			$res = mysql_query($query);
			while ($data = mysql_fetch_array($res)) {
				//if($data['from'] == $ob->decrypt($_COOKIE['_u__']
						//$regno = $ob->decrypt($_COOKIE['_u__']);
				        $regno = $data['from'];

						require_once('./classes/User.php');
							if($this->isDpSet($regno) == true) {
								$dp_path = $this->getDp($regno);	
							}
							else {
								$dp_path = './images/msg_dp.png';
							}
			               echo '<div class="load_status">
                                       <div class="status_img"><img src='.$dp_path.' style="height:40px;max-width:100%;border-radius:50px;" /></div>
                                       <div class="status_text">'.ucwords($this->getUsername($data['from'])).'</div>
                                       &nbsp;&nbsp;&nbsp;<p class="text">'.$data['message'].'</p>
                                       <div class="date" style="float:right;">'.gmdate("Y-m-d\ | H:i:s",  $data['time']).'</div>
                                       <div class="clear"></div>
                                       </div>';
			}
		}

		public function getInboxMsgs($user) {
			echo '<div style="width:46%;height:96%;float:left;border-right:1px solid #ccc;padding:2%;overflow:auto;font-family:gillsansmt;">
							<h3>Inbox</h3><hr>';
			require_once('./authen.php');
			$query = 'SELECT DISTINCT `from` FROM `messages` WHERE `to` = "'.$user.'" ORDER BY `time` DESC';
			$res = mysql_query($query);
			while ($data = mysql_fetch_array($res)) {
				echo '<a style="text-decoration:none;font-family:gillsansmt;float:left;" href="message.php?id='.$this->encrypt($data['from']).'">';
				echo '<span style="font-family:gillsansmt;font-size:17px;color:rgb(200,10,10);font-weight:bold;">'.ucwords($this->getUsername($data['from'])).'</span><br>';
				echo '</a>';
				$numb = $this->getStatus($user,$data['from']);
				if($numb) {
				     echo '<div id="status" style="padding-left:550px;color:#00688B;">UnRead('.$numb.')</div>';
				} else {
				     echo '<div id="status" style="padding-left:550px;visibility:hidden;color:#00688B;">Read</div>';
				} 
				echo '<hr style="color:#fff;">';
				
			}
			echo '</div>';
		}
		
		public function getStatus($to,$from) {
			require_once('./authen.php');
			$query = mysql_query("SELECT * FROM `messages` WHERE `from` = '".$from."' AND `to`='".$to."' AND `read` = 0 ");
			if(mysql_num_rows($query) > 0) {
			     $numb = mysql_num_rows($query);
		    }  else {
			     $numb = 0;
			}
			return $numb;
		}

		public function makeStatusRead($to,$from) {
		     require_once('./authen.php');
			 mysql_query('UPDATE `messages` SET `read` = 1 WHERE `to`="'.$to.'" AND `from`="'.$from.'"');
		}
		
		public function makeNotifyNull($to,$frm) {
		      require_once('./authen.php');
		      mysql_query('UPDATE `messages` SET `notify` = 0 WHERE `to`="'.$to.'" AND `from`="'.$frm.'"');
		}
		
		public function getSentMsgs($user) {

			echo '<div style="width:44%;font-family:gillsansmt;float:right;height:96%;padding:2%;overflow:auto;">
							<h3>Sent</h3><hr>';
			require_once('./authen.php');
			$query = 'SELECT DISTINCT `to` FROM `messages` WHERE `from` = "'.$user.'" ORDER BY `time` DESC';
			$res = mysql_query($query);
			while ($data = mysql_fetch_array($res)) {
				echo '<a style="text-decoration:none;font-family:gillsansmt;" href="message.php?id='.$this->encrypt($data['to']).'">';
				echo '<span style="font-family:gillsansmt;font-size:17px;color:rgb(200,10,10);font-weight:bold;">'.ucwords($this->getUsername($data['to'])).'</span><br>';
				echo '<hr style="color:#fff;">';
				echo '</a>';
			}
			echo '</div>';
		}
		
			public function notify($regno) {
		    require_once('./authen.php');
			$query = mysql_query("SELECT * FROM `messages` WHERE `to` = '".$regno."' AND `notify` = 1 ");
			
			if(mysql_num_rows($query) > 0) {
			     $num = mysql_num_rows($query);
		    }  else {
			     $num = 0;
			}
			return $num;
		}
		
			 
		public function UpdateMessage($regnumber) {
		  require_once('./authen.php');
		  mysql_query('UPDATE `messages` SET `notify` = 0 WHERE `to`="'.$regnumber.'"');	
		}

	}

?>

<?php
	require_once('./classes/Others.php');
	class News extends Others {
		public function getMySkills($regno) {
			require_once('./authen.php');
			$skills = array();
			$query = 'SELECT `skillname` FROM `skills` WHERE `regno` = "'.$regno.'"';
			$res = mysql_query($query);
			while ($data = mysql_fetch_array($res)) {
				array_push($skills, $data['skillname']);
			}
			return $skills;
			 
		}

		public function getMyClubs($regno) {
			require_once('./authen.php');
			$clubs = array();
			$query = 'SELECT `regno` FROM `club_members` WHERE `members` LIKE "%'.$regno.'%"';
			$res = mysql_query($query);
			while ($data = mysql_fetch_array($res)) {
				array_push($clubs, $data['regno']);
			}
			return $clubs;
		}

		public function getRelatedPins($tag) {
			//get all the pins related to that particular tag
			require_once('./authen.php');
			$posts = array();
			$post = array();
			$query = 'SELECT * FROM `pins` WHERE `tags` LIKE "%'.$tag.'%" ORDER BY `upvotes` ASC LIMIT 0, 10';
			//echo $query;
			$res = mysql_query($query);
			while ($data = mysql_fetch_array($res)) {
				array_push($post, $data['regno']);
				array_push($post, $data['pin']);				
				array_push($post, date_default_timezone_set("Asia/Bangkok"));
				array_push($post, "pin");
				array_push($post, $data['pinid']);
				$noOfUpVotes =  $this->getUpvotes($data['pinid'], "pin");
				$noOfDownVotes = $this->getDownvotes($data['pinid'], "pin");
				$difference = $noOfUpVotes + $noOfDownVotes;
				array_push($post,$difference);
				array_push($posts, $post);
				$post = array();
			}
			return $posts;
		}

		public function getRelatedEvents($tag) {
			//get all the pins related to that particular tag
			require_once('./authen.php');
			$events = array();
			$event = array();
			$query = 'SELECT * FROM `events` WHERE `tags` LIKE "%'.$tag.'%"';
			$res = mysql_query($query);
			while ($data = mysql_fetch_array($res)) {
				array_push($event, $data['regno']);
				array_push($event, $data['event']);
				array_push($event, date_default_timezone_set("Asia/Bangkok"));
				array_push($event, "event");
				array_push($event, $data['eventid']);
				$noOfUpVotes =  $this->getUpvotes($data['eventid'], "event");
				$noOfDownVotes = $this->getDownvotes($data['eventid'], "event");
				$difference = $noOfUpVotes + $noOfDownVotes;
				array_push($event,$difference);
				array_push($events, $event);
				$event = array();
			}
			return $events;
		}

		public function getRelatedGigs($tag) {
			//get all the pins related to that particular tag
			require_once('./authen.php');
			$gigs = array();
			$gig = array();
			$query = 'SELECT * FROM `gigs` WHERE `tags` LIKE "%'.$tag.'%" ORDER BY `upvotes` ASC LIMIT 0, 10';
//			echo $query;
			$res = mysql_query($query);
			while ($data = mysql_fetch_array($res)) {
				array_push($gig, $data['regno']);
				array_push($gig, $data['gig']);				
				array_push($gig, date_default_timezone_set("Asia/Bangkok"));
				array_push($gig, "gig");				
				array_push($gig, $data['gigid']);
				$noOfUpVotes =  $this->getUpvotes($data['gigid'], "gig");
				$noOfDownVotes = $this->getDownvotes($data['gigid'], "gig");
				$difference = $noOfUpVotes + $noOfDownVotes;
				array_push($gig,$difference);
				array_push($gigs, $gig);
				$gig = array();
			}
			return $gigs;
		}

		public function getUpvotes($id, $field){
			require_once('./authen.php');
			$query = "";
			if($field == "pin")
				$query='SELECT `upvotes` FROM `pins` WHERE `pinid` = "'.$id.'"';
			else if($field == "gig")
				$query='SELECT `upvotes` FROM `gigs` WHERE `gigid` = "'.$id.'"';
            else
			    $query='SELECT `upvotes` FROM `events` WHERE `eventid` = "'.$id.'"';
			$res=mysql_query($query);
			while($data=mysql_fetch_array($res)) {	
				$vote_list = $data['upvotes'];
			}
			$vlist = explode('###', $vote_list);
			$val = count($vlist)-1;
			return $val;
		}

		public function getDownvotes($id, $field){
			require_once('./authen.php');
			$query = "";
			if($field == "pin")
				$query='SELECT `downvotes` FROM `pins` WHERE `pinid` = "'.$id.'"';
			else if($field == "gig")
				$query='SELECT `downvotes` FROM `gigs` WHERE `gigid` = "'.$id.'"';
            else
			    $query='SELECT `downvotes` FROM `events` WHERE `eventid` = "'.$id.'"';

			$res=mysql_query($query);
			while($data=mysql_fetch_array($res)) {	
				$vote_list = $data['downvotes'];
			}
			$vlist = explode('###', $vote_list);
			$val = (count($vlist)-1);
			return -1*$val;
		}		

	}
?>		
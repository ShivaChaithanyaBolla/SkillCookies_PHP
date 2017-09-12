<?php
	
	if(isset($_COOKIE['_u__'])) {


		if(isset($_POST['eventdata'])) {
		  if($_POST['eventdata'] !=null) {
		    	$data = $_POST['eventdata'];
		    	$posttags = $_POST['posttags'];
		    	require_once('./classes/User.php');
		    	$ob = new User();
		    	$regno = $ob->decrypt($_COOKIE['_u__']);
		    	$arr = $ob->addEvent($regno, $data, $posttags);
		    	echo "Event added!";
			}
                else {
                      echo "C'mon you cannot add an empty event";
                   }		   
		}	
	

		if(isset($_POST['portfoliodata'])) {
		  if($_POST['portfoliodata'] != null) {
		     	$data = $_POST['portfoliodata'];
			    $posttags = $_POST['posttags'];
		    	require_once('./classes/User.php');
		    	$ob = new User();
		    	$regno = $ob->decrypt($_COOKIE['_u__']);
		    	$arr = $ob->addPortfolio($regno, $data, $posttags);
		    	echo "Portfolio added!";
			} 
		   else {
		        echo "C'mon you cannot add an empty portfolio";
			}  
		}		


		if(isset($_POST['skilljardata'])) {
			$data = $_POST['skilljardata'];
			require_once('./classes/User.php');
			$ob = new User();
			$regno = $ob->decrypt($_COOKIE['_u__']);
			$arr = $ob->addSkilljar($regno, $data);
		       if(strlen($regno) != 10 && is_numeric($regno) == 0) {
			      $arr1 = $ob->addSkillToClub($regno,$data);
		        }
		}

                if(isset($_POST['skilljardataMember'])) {
		   if($_POST['skilljardataMember'] != null) {
			$data = $_POST['skilljardataMember'];
			require_once('./classes/User.php');
			$ob = new User();
			$regno = $ob->decrypt($_COOKIE['_u__']);
			$arr = $ob->addSkilljar($regno, $data);
		       if(strlen($regno) != 10 && is_numeric($regno) == 0) {
			      $arr1 = $ob->addSkillToClub($regno,$data);
		        } 
		    }
		else 
		   echo "C'mon you cannot add an empty skill :P";
		 }

		if(isset($_POST['postdata']) && isset($_POST['datatype'])) {
			$post = $_POST['postdata'];
			$datatype = $_POST['datatype'];
			$posttags = $_POST['posttags'];
			require_once('./classes/User.php');
			$ob = new User();
			$regno = $ob->decrypt($_COOKIE['_u__']);
			$postingAs = '';
			
			if($datatype == "pin") {
				$arr = $ob->addPin($regno, $post, $posttags);
				$postingAs = "pin";
			} else if($datatype == "gigs") {
				$arr = $ob->addGig($regno, $post, $posttags);
				$postingAs = "Gig";
			} else if($datatype == "event_post") {
				$arr = $ob->addEvent($regno, $post, $posttags);
				$postingAs = "event";
			} else {

			}
			echo "Successfully posted as '".$postingAs."'";
			
		}

		if(isset($_POST['email']) && isset($_POST['phone']) &&  isset($_POST['website']) &&  isset($_POST['about']) ) {
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$website = $_POST['website'];
			$details = $_POST['about'];
			require_once('./classes/User.php');
			$ob = new User();
			$regno = $ob->decrypt($_COOKIE['_u__']);
			$arr = $ob->addDetails($regno, $email, $phone, $website, $details);
			echo "Updated!!";
		}

		if(isset($_POST['addregno'])) {
		 if($_POST['addregno'] != null) {
			$regno = $_POST['addregno'];
			require_once('./classes/User.php');
			$ob = new User();
			$club = $ob->decrypt($_COOKIE['_u__']);
			$ob->addMemberToClub($club, $regno);
		}
		else {
		    echo "Cannot add a empty member...";
		}
		}



		//searching

		if(isset($_POST['query']) && isset($_POST['search_categ'])) {
			$query = $_POST['query'];
			$search_categ = $_POST['search_categ'];
			require_once('./classes/User.php');
			$ob = new User();
			$regno = $ob->decrypt($_COOKIE['_u__']);
			
			 if ($search_categ == "pin") {
				require_once('./authen.php');
				$query='SELECT * FROM `pins` WHERE `tags` LIKE "%'.$query.'%"';
				$res=mysql_query($query);
				while($data=mysql_fetch_array($res)) {
					echo '<div style="height:70px;width:400px;padding:10px;background:#fafafa;border-radius:5px;">';
						//echo '<img style="height:70px;width:70px;float:left;border-radius:50px;" src="'.$ob->getDp($data['regno']).'">';
						echo '<br><span style="font-size:22px;">'.ucwords($ob->getTagPin($data['tags'],$data['pinid'])).'</span><br>';
						echo '<span style="font-size:18px;">Added by : '.ucwords($ob->getName($data['regno'])).'</span><br>';
					echo "</div><br><br>";
					echo '
						<a href="message.php?id='.$ob->encrypt($data['regno']).'">
						<div style="width:50px;height:50px;float:right;margin-top:-50px;background:url(images/hey.png) no-repeat center center;">
							
						</div>
						</a>
						';
				}
			} else if ($search_categ == "event") {
				require_once('./authen.php');
				$query='SELECT * FROM `events` WHERE `tags` LIKE "%'.$query.'%"';
				$res=mysql_query($query);
				while($data=mysql_fetch_array($res)) {
					echo '<div style="height:70px;width:400px;padding:10px;background:#fafafa;border-radius:5px;">';
						//echo '<img style="height:70px;width:70px;float:left;border-radius:50px;" src="'.$ob->getDp($data['regno']).'">';
						echo '<br><span style="font-size:22px;">'.ucwords($ob->getTagEvent($data['tags'],$data['eventid'])).'</span><br>';
						echo '<span style="font-size:18px;">Added by : '.ucwords($ob->getName($data['regno'])).'</span><br>';
					echo "</div><br><br>";
					echo '
						<a href="message.php?id='.$ob->encrypt($data['regno']).'">
						<div style="width:50px;height:50px;float:right;margin-top:-50px;background:url(images/hey.png) no-repeat center center;">
							
						</div>
						</a>
						';

				}
			}else if ($search_categ == "gig") {
				require_once('./authen.php');
				$query='SELECT * FROM `gigs` WHERE `tags` LIKE "%'.$query.'%"';
				$res=mysql_query($query);
				while($data=mysql_fetch_array($res)) {
					echo '<div style="height:70px;width:400px;padding:10px;background:#fafafa;border-radius:5px;">';
						//echo '<img style="height:70px;width:70px;float:left;border-radius:50px;" src="'.$ob->getDp($data['regno']).'">';
						echo '<br><span style="font-size:22px;">'.ucwords($ob->getTagGig($data['tags'],$data['gigid'])).'</span><br>';
						echo '<span style="font-size:18px;">Added by : '.ucwords($ob->getName($data['regno'])).'</span><br>';

					echo "</div><br><br>";
			        echo '
						<a href="message.php?id='.$ob->encrypt($data['regno']).'">
						<div style="width:50px;height:50px;float:right;margin-top:-50px;background:url(images/hey.png) no-repeat center center;">
							
						</div>
						</a>
						';
				}
			} else if ($search_categ == "club") {
				require_once('./authen.php');
				$query='SELECT * FROM `club_skills` WHERE `skills` LIKE "%'.$query.'%"';
				$res=mysql_query($query);
				while($data=mysql_fetch_array($res)) {
					echo '<a href="view.php?id='.$ob->encrypt($data['regno']).'">';
					echo '<div style="height:70px;width:400px;padding:10px;background:#fafafa;border-radius:5px;">';
						echo '<img style="height:70px;width:70px;float:left;border-radius:50px;" src="'.$ob->getDp($data['regno']).'">';
						echo '<br><span style="font-size:22px;">'.ucwords($ob->getName($data['regno'])).'</span><br>';
						echo '<span style="font-size:18px;">'.$data['regno'].'</span><br>';
						echo '
						<a href="message.php?id='.$ob->encrypt($data['regno']).'">
						<div style="width:50px;height:50px;float:right;margin-top:-50px;background:url(images/hey.png) no-repeat center center;">
							
						</div>
						</a>
						';
					echo "</div>
					</a><br><br>";
				}

			} else if ($search_categ == "skill") {
				require_once('./authen.php');
				$query='SELECT * FROM `skills` WHERE `skillname`="'.$query.'"';
				$res=mysql_query($query);
				while($data=mysql_fetch_array($res)) {
					echo '<a href="view.php?id='.$ob->encrypt($data['regno']).'">';
					echo '<div style="height:70px;width:400px;padding:10px;background:#fafafa;border-radius:5px;">';
						echo '<img style="height:70px;width:70px;float:left;border-radius:50px;" src="'.$ob->getDp($data['regno']).'">';
						echo '<br><span style="font-size:22px;">'.ucwords($ob->getName($data['regno'])).'</span><br>';
						echo '<span style="font-size:18px;">'.$data['regno'].'</span><br>';
						echo '
						<a href="message.php?id='.$ob->encrypt($data['regno']).'">
						<div style="width:50px;height:50px;float:right;margin-top:-50px;background:url(images/hey.png) no-repeat center center;">
							
						</div>
						</a>
						';
					echo "</div>
					</a><br><br>";
				}

			}
		
		}

		//submitting message starts

		if(isset($_POST['msg']) && isset($_POST['to']) &&  isset($_POST['from']) ) {
			$msg = $_POST['msg'];
			$to = $_POST['to'];
			$from = $_POST['from'];
			$time = time();
			require_once('./classes/User.php');
			$ob = new User();
			$arr = $ob->sendMessage($ob->decrypt($from), $ob->decrypt($to), $msg, $time);
		}

		//submitting message ends

		//Notifications 
		if(isset($_POST['regnumber'])) {
		    $regnumber = $_POST['regnumber'];
			echo $regnumber;
			require_once('./classes/User.php');
			$ob = new User();
			$arr = $ob->UpdateMessage($regnumber);
		}

		if(isset($_POST['vid']) && isset($_POST['vfield']) &&  isset($_POST['imp']) && isset($_POST['regno'])) {
			$vid = $_POST['vid'];
			$vfield = $_POST['vfield'];
			$regno = $_POST['regno'];
			$type = $_POST['imp'];			
			require_once('./classes/User.php');
			$ob = new User();
			if($type=="upvote") {
				
				if($vfield == 'gig') {
					require_once('./authen.php');
					$query='SELECT `upvotes` FROM `gigs` WHERE `gigid` = "'.$vid.'"';
					$res=mysql_query($query);
					while($data=mysql_fetch_array($res)) {	
						$vote_list = $data['upvotes'];
					}
					$vlist = explode('###', $vote_list);
					if(!in_array($regno, $vlist)) {
						$vote_list = $vote_list.$regno."###";
						$query = 'UPDATE `gigs` SET `upvotes` = "'.$vote_list.'" WHERE `gigid` = "'.$vid.'"';
						mysql_query($query);
						echo "Voted Up!";
					} else {
						echo "Already Voted Up by you!!";
					}
					
				} else if($vfield == 'pin') {
					require_once('./authen.php');
					$query='SELECT `upvotes` FROM `pins` WHERE `pinid` = "'.$vid.'"';
					$res=mysql_query($query);
					while($data=mysql_fetch_array($res)) {	
						$vote_list = $data['upvotes'];
					}
					$vlist = explode('###', $vote_list);
					if(!in_array($regno, $vlist)) {
						$vote_list = $vote_list.$regno."###";
						$query = 'UPDATE `pins` SET `upvotes` = "'.$vote_list.'" WHERE `pinid` = "'.$vid.'"';
						mysql_query($query);
						echo "Voted Up!";
					} else {
						echo "Already Voted Up by you!!";
					}
				}  else if($vfield == 'event') {
					require_once('./authen.php');
					$query='SELECT `upvotes` FROM `events` WHERE `eventid` = "'.$vid.'"';
					$res=mysql_query($query);
					while($data=mysql_fetch_array($res)) {	
						$vote_list = $data['upvotes'];
					}
					$vlist = explode('###', $vote_list);
					if(!in_array($regno, $vlist)) {
						$vote_list = $vote_list.$regno."###";
						$query = 'UPDATE `events` SET `upvotes` = "'.$vote_list.'" WHERE `eventid` = "'.$vid.'"';
						mysql_query($query);
						echo "Voted Up!";
					} else {
						echo "Already Voted Up by you!!";
					}
				}
				


			} else if($type=="downvote") {
				if($vfield == 'gig') {
					require_once('./authen.php');
					$query='SELECT `downvotes` FROM `gigs` WHERE `gigid` = "'.$vid.'"';
					$res=mysql_query($query);
					while($data=mysql_fetch_array($res)) {	
						$vote_list = $data['downvotes'];
					}
					$vlist = explode('###', $vote_list);
					if(!in_array($regno, $vlist)) {
						$vote_list = $vote_list.$regno."###";
						$query = 'UPDATE `gigs` SET `downvotes` = "'.$vote_list.'" WHERE `gigid` = "'.$vid.'"';
						mysql_query($query);
						echo "Voted Down!";
					} else {
						echo "Already Voted Down by you!!";
					}
					
				} else if($vfield == 'pin') {
					require_once('./authen.php');
					$query='SELECT `downvotes` FROM `pins` WHERE `pinid` = "'.$vid.'"';
					$res=mysql_query($query);
					while($data=mysql_fetch_array($res)) {	
						$vote_list = $data['downvotes'];
					}
					$vlist = explode('###', $vote_list);
					if(!in_array($regno, $vlist)) {
						$vote_list = $vote_list.$regno."###";
						$query = 'UPDATE `pins` SET `downvotes` = "'.$vote_list.'" WHERE `pinid` = "'.$vid.'"';
						mysql_query($query);
						echo "Voted Down!";
					} else {
						echo "Already Voted Down by you!!";
					}
				}  else if($vfield == 'event') {
					require_once('./authen.php');
					$query='SELECT `downvotes` FROM `events` WHERE `eventid` = "'.$vid.'"';
					$res=mysql_query($query);
					while($data=mysql_fetch_array($res)) {	
						$vote_list = $data['downvotes'];
					}
					$vlist = explode('###', $vote_list);
					if(!in_array($regno, $vlist)) {
						$vote_list = $vote_list.$regno."###";
						$query = 'UPDATE `events` SET `downvotes` = "'.$vote_list.'" WHERE `eventid` = "'.$vid.'"';
						mysql_query($query);
						echo "Voted Down!";
					} else {
						echo "Already Voted Down by you!!";
					}
				}
			}
		}

		//submitting message ends


	}


?>
<?php

$to = $_GET['to'];
$from = $_GET['from'];
require_once('./classes/User.php');
		    	$ob = new User();;
require_once('./authen.php');
			$query = 'SELECT * FROM `messages` WHERE `to` = "'.$to.'" AND `from` = "'.$from.'" OR `to` = "'.$from.'" AND `from` = "'.$to.'" ORDER BY `time` DESC';
			$res = mysql_query($query);
			while ($data = mysql_fetch_array($res)) {
				
				//if($data['from'] == $ob->decrypt($_COOKIE['_u__']
						//$regno = $ob->decrypt($_COOKIE['_u__']);
				        $regno = $data['from'];

						require_once('./classes/User.php');
							if($ob->isDpSet($regno) == true) {
								$dp_path = $ob->getDp($regno);	
							}
							else {
								$dp_path = './images/msg_dp.png';
							}
			echo '<div class="load_status">
<div class="status_img"><img src='.$dp_path.' style="height:40px;max-width:100%;border-radius:50px;" /></div>
<div class="status_text">'.ucwords($ob->getUsername($data['from'])).'
</div>
&nbsp;&nbsp;&nbsp;<p class="text">'.$data['message'].'</p>
<div class="date" style="float:right;">'.gmdate("Y-m-d\ | H:i:s",  $data['time']).'</div>
<div class="clear"></div>
</div>';
			}?>
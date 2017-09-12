<?php
	class Others
	{
		public function encrypt($str){
			$str = base64_encode(base64_encode(base64_encode($str)));
			return $str;
		}

		public function decrypt($str){
			$str = base64_decode(base64_decode(base64_decode($str)));
			return $str;
		}
		
	}	
?>		
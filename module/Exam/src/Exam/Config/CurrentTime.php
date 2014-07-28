<?php
	namespace Exam\Config;
	
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	
	class CurrentTime {
		public function getCurrentTime() {
			return date('Y-m-d H:i:s');
		}
		
	}
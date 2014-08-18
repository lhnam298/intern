<?php
	namespace Exam\Config;

	class PassWord {

		protected $salt	= "9b804af6e8399bdccfacb9551c9d7d45e6a88d67";

		public function generatePassWord($password, $username) {
			return hash('sha1', $username . $password . $this->salt);
		}

	}
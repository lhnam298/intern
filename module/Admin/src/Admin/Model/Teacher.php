<?php
	namespace Admin\Model;

	class Teacher {
		public $teacher_id;
		public $username;
		private $_password;
		public $name;
		public $birthday;
		public $level;
		public $del_flg;
		public $created_at;

		public function exchangeArray($data) {
			$this->teacher_id	= (isset($data['teacher_id'])) ? $data['teacher_id'] : null;
			$this->username	= (isset($data['username'])) ? $data['username'] : null;
			$this->_password	= (isset($data['password'])) ? $data['password'] : null;
			$this->name	= (isset($data['name'])) ? $data['name'] : null;
			$this->birthday	= (isset($data['birthday'])) ? $data['birthday'] : null;
			$this->level	= (isset($data['level'])) ? $data['level'] : null;
			$this->del_flg	= (isset($data['del_flg'])) ? $data['del_flg'] : null;
			$this->created_at	= (isset($data['created_at'])) ? $data['created_at'] : null;
		}

		public function getPassword() {
			return $this->_password;
		}

		public function setPassword($password) {
			$this->_password	= $password;
		}
	}
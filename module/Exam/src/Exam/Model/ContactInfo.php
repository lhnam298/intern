<?php
	namespace Exam\Model;

	class ContactInfo {
		public $contact_id;
		public $name;
		public $email;
		public $phone;
		public $title;
		public $content;
		public $del_flg;
		public $visited;
		public $created_at;

		public function exchangeArray($data) {
			$this->contact_id	= (isset($data['contact_id'])) ? $data['contact_id'] : null;
			$this->name	= (isset($data['name'])) ? $data['name'] : null;
			$this->email	= (isset($data['email'])) ? $data['email'] : null;
			$this->phone	= (isset($data['phone'])) ? $data['phone'] : null;
			$this->title	= (isset($data['title'])) ? $data['title'] : null;
			$this->content	= (isset($data['content'])) ? $data['content'] : null;
			$this->del_flg	= (isset($data['del_flg'])) ? $data['del_flg'] : null;
			$this->visited	= (isset($data['visited'])) ? $data['visited'] : null;
			$this->created_at	= (isset($data['created_at'])) ? $data['created_at'] : null;
		}
	}
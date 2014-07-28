<?php
	namespace Exam\Model;
	
	class QuestionType {
		public $question_type_id;
		public $name;
		public $description;
		public $mark;
		public $question_num;
		public $del_flg;
		public $created_at;
		public $updated_at;
		
		public function exchangeArray($data) {
			$this->question_type_id	= (isset($data['question_type_id'])) ? $data['question_type_id'] : null;
			$this->name	= (isset($data['name'])) ? $data['name'] : null;
			$this->description	= (isset($data['description'])) ? $data['description'] : null;
			$this->mark	= (isset($data['mark'])) ? $data['mark'] : null;
			$this->del_flg	= (isset($data['del_flg'])) ? $data['del_flg'] : null;
			$this->created_at	= (isset($data['created_at'])) ? $data['created_at'] : null;
			$this->updated_at	= (isset($data['updated_at'])) ? $data['updated_at'] : null;
		}
	}
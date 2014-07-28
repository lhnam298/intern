<?php
	namespace Exam\Model;
	
	class Subject {
		public $subject_id;
		public $subject_name;
		public $description;
		public $test_time;
		public $question_num;
		public $del_flg;
		public $created_at;
		public $updated_at;
		
		public function exchangeArray($data) {
			$this->subject_id	= (isset($data['subject_id'])) ? $data['subject_id'] : null;
			$this->subject_name	= (isset($data['subject_name'])) ? $data['subject_name'] : null;
			$this->description	= (isset($data['description'])) ? $data['description'] : null;
			$this->test_time	= (isset($data['test_time'])) ? $data['test_time'] : null;
			$this->question_num	= (isset($data['question_num'])) ? $data['question_num'] : null;
			$this->del_flg	= (isset($data['del_flg'])) ? $data['del_flg'] : null;
			$this->created_at	= (isset($data['created_at'])) ? $data['created_at'] : null;
			$this->updated_at	= (isset($data['updated_at'])) ? $data['updated_at'] : null;
		}
	}
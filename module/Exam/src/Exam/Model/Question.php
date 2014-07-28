<?php
	namespace Exam\Model;
	
	class Question {
		public $question_id;
		public $subject_id;
		public $question_type_id;
		public $question;
		public $answer;
		public $del_flg;
		public $created_at;
		public $updated_at;
		
		public function exchangeArray($data) {
			$this->question_id	= (isset($data['question_id'])) ? $data['question_id'] : null;
			$this->subject_id	= (isset($data['subject_id'])) ? $data['subject_id'] : null;
			$this->question_type_id	= (isset($data['question_type_id'])) ? $data['question_type_id'] : null;
			$this->question	= (isset($data['question'])) ? $data['question'] : null;
			$this->answer	= (isset($data['answer'])) ? $data['answer'] : null;
			$this->del_flg	= (isset($data['del_flg'])) ? $data['del_flg'] : null;
			$this->created_at	= (isset($data['created_at'])) ? $data['created_at'] : null;
			$this->updated_at	= (isset($data['updated_at'])) ? $data['updated_at'] : null;
		}
	}
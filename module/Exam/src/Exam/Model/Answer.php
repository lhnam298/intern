<?php
	namespace Exam\Model;
	
	class Answer {
		public $answer_id;
		public $question_id;
		public $choice_1;
		public $choice_2;
		public $choice_3;
		public $choice_4;
		public $del_flg;
		public $created_at;
		public $updated_at;
		
		public function exchangeArray($data) {
			$this->answer_id	= (isset($data['answer_id'])) ? $data['answer_id'] : null;
			$this->question_id	= (isset($data['question_id'])) ? $data['question_id'] : null;
			$this->choice_1	= (isset($data['choice_1'])) ? $data['choice_1'] : null;
			$this->choice_2	= (isset($data['choice_2'])) ? $data['choice_2'] : null;
			$this->choice_3	= (isset($data['choice_3'])) ? $data['choice_3'] : null;
			$this->choice_4	= (isset($data['choice_4'])) ? $data['choice_4'] : null;
			$this->del_flg	= (isset($data['del_flg'])) ? $data['del_flg'] : null;
			$this->created_at	= (isset($data['created_at'])) ? $data['created_at'] : null;
			$this->updated_at	= (isset($data['updated_at'])) ? $data['updated_at'] : null;
		}
	}
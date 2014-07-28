<?php
	namespace Exam\Model;
	
	class TestInfo {
		public $test_info_id;
		public $subject_id;
		public $student_id;
		public $test_again;
		public $mark;
		public $del_flg;
		public $created_at;
		public $updated_at;
		
		public function exchangeArray($data) {
			$this->test_info_id	= (isset($data['test_info_id'])) ? $data['test_info_id'] : null;
			$this->subject_id	= (isset($data['subject_id'])) ? $data['subject_id'] : null;
			$this->student_id	= (isset($data['student_id'])) ? $data['student_id'] : null;
			$this->test_again	= (isset($data['test_again'])) ? $data['test_again'] : null;
			$this->mark	= (isset($data['mark'])) ? $data['mark'] : null;
			$this->del_flg	= (isset($data['del_flg'])) ? $data['del_flg'] : null;
			$this->created_at	= (isset($data['created_at'])) ? $data['created_at'] : null;
			$this->updated_at	= (isset($data['updated_at'])) ? $data['updated_at'] : null;
		}
	}
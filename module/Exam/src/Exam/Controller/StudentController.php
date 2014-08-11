<?php
	namespace Exam\Controller;
	
	use Zend\Mvc\Controller\AbstractActionController,
		Zend\Session\Container,
		Zend\View\Model\ViewModel,
		Zend\Permissions\Acl\Acl,
		Zend\Permissions\Acl\Role\GenericRole as Role,
		Zend\Permissions\Acl\Resource\GenericResource as Resource,
		Exam\Model\SubjectTable,
		Exam\Model\AnswerTable,
		Exam\Model\TestInfo,
		Exam\Form\ExamContentForm,
		Exam\Config\Config,
		Exam\Form\ExamForm;
		
	class StudentController extends IndexController {
		
		protected $testInfoTable;
		
		/**
		 * Hiển thị danh sách môn học để học sinh lựa chọn làm bài thi 
		 */
		public function examAction() {
			$this->init();
			if (!$this->_getAcl()->isAllowed($this->sessionStudent->right, null, "student_exam")) {
				$this->redirect()->toUrl('../index/login');
			}
			
			$announcement	= "";
			$requireTestAgain	= 0;
			$subject_id	= null;
			$this->subjectTable	= $this->getServiceLocator()->get('Exam\Model\SubjectTable');
			$subject	= $this->subjectTable->fetchAll();
			foreach ($subject as $item){
				$arrSubject[$item->subject_id]	= $item->subject_name;
			}
			
			$form	= new ExamForm();
			$form->initial();
			if ($this->getRequest()->isPost()) {
				$form->setData($this->getRequest()->getPost());
				if ($form->isValid()) {
					$this->data = $form->getData();
					$subject_id	= $this->data['subject'];
					$this->testInfoTable	= $this->getServiceLocator()->get('Exam\Model\TestInfoTable');
					$exam	= $this->testInfoTable->getTestInfo($this->sessionStudent->info->student_id, $subject_id);
					if ($exam != null && $exam->test_again != 1) {
						$announcement	= "Bạn đã làm bài thi này. ";
						if ($exam->test_again	== 0) 
							$requireTestAgain	= 1;
					}
					elseif ($this->checkData($subject_id)) {
						$this->initParameterOfExam();
						$this->saveResult($subject_id);
						$url	= "createexam/".$subject_id;
						$this->redirect()->toUrl($url);
					}
					else $announcement	= "Môn thi chưa đủ dữ liệu, hãy quay lại sau!";
				}
			}
			
			return new ViewModel(array(
									'form' => $form,
									'selectedItem' => $subject_id,
									'arrSubject' => $arrSubject,
									'announcement' => $announcement,
									'requireTestAgain' => $requireTestAgain,
			));
		}
		
		public function initParameterOfExam() {
			$this->sessionStudent	= new Container('student');
			$this->sessionStudent->finishTime	= null;
			$this->sessionStudent->remainTime	= null;
			$this->sessionStudent->arrExamAnswer	= null;
			$this->sessionStudent->arrExamQuestion	= null;
			$this->sessionStudent->arrChoice	= null;
			$this->sessionStudent->arrAnswered	= null;
			$this->sessionStudent->numOfQuestion	= null;
		}
		
		/**
		 * Kiểm tra số lượng câu hỏi của môn học có đủ để tạo đề thi không
		 * @param int $subjectId Id môn học
		 */
		public function checkData($subjectId) {
			$this->subjectTable	= $this->getServiceLocator()->get('Exam\Model\SubjectTable');
			$info	= $this->subjectTable->getById($subjectId);
			$examNum	= $info->question_num;
			$type1	= (int)($examNum/2);
			$type2	= (int)(($examNum - $type1)/2);
			$type3	= $examNum - $type1 - $type2;

			$this->questionTable	= $this->getServiceLocator()->get('Exam\Model\QuestionTable');
			if ($type1 > count($this->questionTable->getByTypeSubject(Config::TRUE_FALSE_QUESTION, $subjectId))) return 0;
			if ($type2 > count($this->questionTable->getByTypeSubject(Config::CORRECT_QUESTION, $subjectId))) return 0;
			if ($type3 > count($this->questionTable->getByTypeSubject(Config::BEST_CORRECT_QUESTION, $subjectId))) return 0;
			return 1;
		}
		
		/**
		 * Insert yêu cầu thi lại của học sinh vào db
		 */
		public function requireTestAgainAction() {
			$this->init();
			if (!$this->_getAcl()->isAllowed($this->sessionStudent->right, null, "student_requiretestagain")) {
				$this->redirect()->toUrl('../index/login');
			}
			
			$subjectId	= $this->params('id');
			$this->testInfoTable	= $this->getServiceLocator()->get('Exam\Model\TestInfoTable');
			$info	= $this->testInfoTable->getTestInfo($this->sessionStudent->info->student_id, $subjectId);
			$info->test_again	= 3;
			$this->testInfoTable->saveTestInfo($info);
			$this->redirect()->toUrl('../exam');
		}

		function  generateQuestion($min, $max, $quantity) {
			$numbers = range($min, $max);
			shuffle($numbers);
			return array_slice($numbers, 0, $quantity);
		}
		
		public function moveToArray($question) {
			$arr	= array();
			foreach ($question as $item)
				$arr[]	= $item;
			return $arr;
		}
		
		public function generateExam($type1, $type2, $type3, $subjectId) {
			$this->questionTable	= $this->getServiceLocator()->get('Exam\Model\QuestionTable');
			$this->answerTable	= $this->getServiceLocator()->get('Exam\Model\AnswerTable');
			
			$arrAllQuestion	= $this->moveToArray($this->questionTable->getByTypeSubject(Config::TRUE_FALSE_QUESTION, $subjectId));
			$arrIndex	= $this->generateQuestion(0, count($arrAllQuestion)-1, $type1);
			for ($i=0; $i<$type1; $i++) {
				$arrExamQuestion[]	= $arrAllQuestion[$arrIndex[$i]]->question;	
				$arrExamAnswer[]	= $arrAllQuestion[$arrIndex[$i]]->answer;			
			}
			
			$arrAllQuestion	= $this->moveToArray($this->questionTable->getByTypeSubject(Config::CORRECT_QUESTION, $subjectId));
			$arrIndex	= $this->generateQuestion(0, count($arrAllQuestion)-1, $type2);
			for ($i=0; $i<$type2; $i++) {
				$arrExamQuestion[]	= $arrAllQuestion[$arrIndex[$i]]->question;
				$arrExamAnswer[]	= $arrAllQuestion[$arrIndex[$i]]->answer;
				$choices	= $this->answerTable->getByQId($arrAllQuestion[$arrIndex[$i]]->question_id);
				$arrChoice[]	= $choices;
			}
			
			$arrAllQuestion	= $this->moveToArray($this->questionTable->getByTypeSubject(Config::BEST_CORRECT_QUESTION, $subjectId));
			$arrIndex	= $this->generateQuestion(0, count($arrAllQuestion)-1, $type3);
			for ($i=0; $i<$type3; $i++) {
				$arrExamQuestion[]	= $arrAllQuestion[$arrIndex[$i]]->question;
				$arrExamAnswer[]	= $arrAllQuestion[$arrIndex[$i]]->answer;
				$choices	= $this->answerTable->getByQId($arrAllQuestion[$arrIndex[$i]]->question_id);
				$arrChoice[]	= $choices;
			}
			
			$this->sessionStudent->arrExamAnswer	= $arrExamAnswer;
			$this->sessionStudent->arrExamQuestion	= $arrExamQuestion;
			$this->sessionStudent->arrChoice	= $arrChoice;
		}
		
		public function saveResult($subjectId) {
			$this->testInfoTable	= $this->getServiceLocator()->get('Exam\Model\TestInfoTable');
			$info	= $this->testInfoTable->getTestInfo($this->sessionStudent->info->student_id, $subjectId);
			if ($info	== null) {
				$info	= new TestInfo();
				$info->student_id	= $this->sessionStudent->info->student_id;
				$info->subject_id	= $subjectId;
				$info->mark	= 0;
				$info->test_again	= 0;
				$info->del_flg	= 0;
				$this->testInfoTable->saveTestInfo($info);
			}
			elseif ($info->test_again == 1) {
				$info->test_again	= 2;
				$this->testInfoTable->saveTestInfo($info);
			}
			elseif ($this->sessionStudent->mark >= $info->mark) {
				$info->mark	= $this->sessionStudent->mark;
				$this->testInfoTable->saveTestInfo($info);
			}
		}
		
		/**
		 * Tạo và hiển thị bài thi 
		 */
		public function createExamAction() {
			$this->init();
			if (!$this->_getAcl()->isAllowed($this->sessionStudent->right, null, "student_createexam")) {
				$this->redirect()->toUrl('../index/login');
			}
			$subjectId	= $this->params('id');
			$this->testInfoTable	= $this->getServiceLocator()->get('Exam\Model\TestInfoTable');
			$exam	= $this->testInfoTable->getTestInfo($this->sessionStudent->info->student_id, $subjectId);
			if ($exam->test_again == 0 && $exam->test_again == 2) $this->redirect()->toUrl('../showresult');
			
			$this->subjectTable	= $this->getServiceLocator()->get('Exam\Model\SubjectTable');
			$info	= $this->subjectTable->getById($subjectId);
			$num	= $info->question_num;
			$time	= $info->test_time;
			$this->sessionStudent->numOfQuestion	= $num;
			if ($this->sessionStudent->finishTime == null)
				$this->sessionStudent->finishTime	= date("m/d/Y h:i:s a", time()+$time*60);
			$this->sessionStudent->remainTime	= (strtotime($this->sessionStudent->finishTime) - strtotime(date("m/d/Y h:i:s a")));

			$type1	= (int)($num/2);
			$type2	= (int)(($num - $type1)/2);
			$type3	= $num - $type1 - $type2;
			if ($this->sessionStudent->arrExamQuestion == null)
				$this->generateExam($type1, $type2, $type3, $subjectId);

			return new ViewModel(array(
									'arrQuestion' 	=> $this->sessionStudent->arrExamQuestion,
									'arrChoice'		=> $this->sessionStudent->arrChoice,
									'numOfQuestion'	=> $this->sessionStudent->numOfQuestion,
									'remainTime'	=> $this->sessionStudent->remainTime,
									'subjectID'		=> $subjectId,
			));
		}
		
		/**
		 * Tính kết quả bài thi
		 */
		public function finishExamAction() {
			$this->init();
			if (!$this->_getAcl()->isAllowed($this->sessionStudent->right, null, "student_finishexam")) {
				$this->redirect()->toUrl('../index/login');
			}
			
			$subjectId	= $this->params('id');
			$num	= $this->sessionStudent->numOfQuestion;
			for ($i=1; $i<=$num; $i++) {
				$name	= "question".$i;
				if (isset($_POST[$name]))
					$this->data[$i]	= $_POST[$name];
				else 
					$this->data[$i]	= null;
			}
			$mark	= $this->calculateMark($this->data, $this->sessionStudent->arrExamAnswer, $this->sessionStudent->numOfQuestion);
			$this->sessionStudent->arrAnswered	= $this->data;
			$this->sessionStudent->mark	= round($mark, 2);
			$this->saveResult($this->params('id'));
			$this->calculateAvarageMark($this->sessionStudent->info->student_id);
			$this->sessionStudent->offsetUnset('finishTime');
			$this->sessionStudent->offsetUnset('remainTime');
			$url	= '../showresult/'.$subjectId;
			$this->redirect()->toUrl($url);
		}
		
		/**
		 * Hiển thị đáp án và kết quả
		 */
		public function showResultAction() {
			$this->init();
			if (!$this->_getAcl()->isAllowed($this->sessionStudent->right, null, "student_showresult")) {
				$this->redirect()->toUrl('../index/login');
			}
			
			$subjectId	= $this->params('id');
			$this->subjectTable	= $this->getServiceLocator()->get('Exam\Model\SubjectTable');
			$info	= $this->subjectTable->getById($subjectId);
			return new ViewModel(array(
									'student'	=> $this->sessionStudent->info,
									'mark' 		=> $this->sessionStudent->mark,
									'subject'	=> $info->subject_name,
			));
		}
				
		public function viewAnswerAction() {
			$this->init();
			if (!$this->_getAcl()->isAllowed($this->sessionStudent->right, null, "student_viewanswer")) {
				$this->redirect()->toUrl('../index/login');
			}
			$num	= $this->sessionStudent->numOfQuestion;
			$type1	= (int)($num/2);
			$type2	= (int)(($num - $type1)/2);
			$type3	= $num - $type1 - $type2;
			$form	= new ExamContentForm($type1, $type2, $type3);
			$form->initial();
			
			return new ViewModel(array(
									'form'			=> $form,
									'mark' 			=> $this->sessionStudent->mark,
									'arrQuestion' 	=> $this->sessionStudent->arrExamQuestion,
									'arrAnswered'	=> $this->sessionStudent->arrAnswered,
									'arrAnswer'		=> $this->sessionStudent->arrExamAnswer,
									'arrChoice'		=> $this->sessionStudent->arrChoice,
									'numOfQuestion'	=> $this->sessionStudent->numOfQuestion,
			));
		}
		
		/**
		 * Tính điểm bài thi
		 * @param array $data Bài làm của học sinh
		 * @param array $arrA Đáp án bài thi
		 * @param int $num Số lượng câu hỏi
		 */
		public function calculateMark($data, $arrA, $num) {
			$mark	= 0;
			$type1	= (int)($num/2);
			$type2	= (int)(($num - $type1)/2);
			$type3	= $num - $type1 - $type2;
			for ($i=1; $i<=$num; $i++) {
				if ($i <= $type1){
					if ($data[$i] == $arrA[$i-1])
						$mark	= $mark + 1; 
				}
				elseif ($i <= $type1+$type2) {
					$answer	= "";
					if (!isset($data[$i])) continue;
					foreach ($data[$i] as $item)
						if ($answer == "")
							$answer	= $item;
						else 
							$answer	= $answer."&".$item;
					if ($answer == $arrA[$i-1])
						$mark	= $mark + 2;
				}
				else {
					if ($data[$i] == $arrA[$i-1])
						$mark	= $mark + 2; 
				}				
			}
			return 10*$mark/($type1*1 + $type2*2 + $type3*2);
		}
		
		/**
		 * Tính điểm trung bình của học sinh
		 * @param int $student_id Id của học sinh
		 */
		public function calculateAvarageMark($student_id) {
			$this->testInfoTable	= $this->getServiceLocator()->get('Exam\Model\TestInfoTable');
			$result	= $this->testInfoTable->getByStudentId($student_id);
			$sum	= 0;
			foreach ($result as $item)
				$sum +=	$item->mark;
			$avarage_mark	= $sum/count($result);
			$this->sessionStudent->info->average_mark	= round($avarage_mark, 2);
			$this->studentTable	= $this->getServiceLocator()->get('Exam\Model\StudentTable');
			$this->studentTable->saveStudent($this->sessionStudent->info);
		}
		
		/**
		 * Đăng xuất
		 */
		public function logoutAction() {
			$this->sessionStudent	= new Container('student');
			$this->sessionStudent->offsetUnset('info');
			$this->sessionStudent->offsetUnset('errExamAnswer');
			$this->sessionStudent->offsetUnset('arrExamQuestion');
			$this->sessionStudent->offsetUnset('arrChoice');
			$this->sessionStudent->offsetUnset('arrAnswered');
			$this->sessionStudent->offsetUnset('numOfQuestion');
			$this->sessionStudent->offsetUnset('mark');
			$this->sessionStudent->offsetUnset('right');
			$this->redirect()->toUrl('../index/index');
		}

	}
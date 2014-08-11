<?php
	namespace Admin\Controller;
	
	use Zend\Mvc\Controller\AbstractActionController,
		Zend\View\Model\ViewModel,
		Zend\Session\Container,
		Zend\Paginator\Paginator,
		Zend\Paginator\Adapter\Null as PageNull,
		Zend\Permissions\Acl\Acl,
		Zend\Permissions\Acl\Role\GenericRole as Role,
		Zend\Permissions\Acl\Resource\GenericResource as Resource,
		
		Admin\Form\LoginForm,
		Admin\Form\Validate\Login,
		
		Admin\Model\Teacher,
		Admin\Model\TeacherTable,
		Admin\Form\NewTeacherForm,
		Admin\Form\Validate\NewTeacher,
		
		Exam\Model\QuestionType,
		Exam\Model\QuestionTypeTable,
		
		Exam\Model\Question,
		Exam\Model\QuestionTable,
		Admin\Form\Validate\CreateQuestion,
		Admin\Form\CreateQuestionForm,
		Admin\Form\EditQuestionForm,
		Admin\Form\Validate\EditQuestion,
		
		Admin\Form\Validate\CreateSubject,
		Admin\Form\CreateSubjectForm,
		Exam\Model\Subject,
		
		Exam\Model\Answer,
		Exam\Model\AnswerTable,
		Exam\Config\Config,
		Exam\Config\CurrentTime;
	
	class AdminController extends AbstractActionController {
		
		protected $student;
		protected $studentTable;
		protected $teacher;
		protected $teacherTable;
		protected $questionTypeTable;
		protected $subjectTable;
		protected $subject;
		protected $question;
		protected $questionTable;
		protected $answer;
		protected $answerTable;
		protected $examInfoTable;
		
		protected $success	= "";
		protected $err	= "";
		protected $data	= null;
		protected $perpage	= Config::PAGINATOR_PER_PAGE;
		
		protected $sessionAdmin;
		private $_acl;
		
		/**
		 * Lấy quyền truy cập action
		 */
		public function _getAcl() {
			if(!$this->_acl)
				$this->_acl = $this->getServiceLocator()->get("Acl");
			return $this->_acl;
		}

		/**
		 * Khởi tạo session, layout
		 */
		public function init() {
			$this->layout('admin/layout');
			$this->sessionAdmin	= new Container('admin');
			$this->layout()->setVariable('admin', $this->sessionAdmin->info->username);
			$this->layout()->setVariable('level', $this->sessionAdmin->info->level);
			$this->examInfoTable	= $this->getServiceLocator()->get('Exam\Model\TestInfoTable');
			$this->layout()->setVariable('require', count($this->examInfoTable->getByRequireTestAgain()));
		}
		
		public function indexAction() {
			$this->init();
			if (!$this->_getAcl()->isAllowed($this->sessionAdmin->right, null, "admin_index")) {
				$this->redirect()->toUrl('login');
			}
		}
		
		/* --- Question --- */
		
		/**
		 * Thêm câu hỏi
		 */
		public function addQuestionAction() {
			$this->init();
			if (!$this->_getAcl()->isAllowed($this->sessionAdmin->right, null, "admin_addquestion")) {
				$this->redirect()->toUrl('login');
			}
			
			$this->questionTypeTable	= $this->getServiceLocator()->get('Exam\Model\QuestionTypeTable');
			$type	= $this->questionTypeTable->fetchAll();
			foreach ($type as $itemType){
				$arrType[$itemType->question_type_id]	= $itemType->name;
			}
			
			$this->subjectTable	= $this->getServiceLocator()->get('Exam\Model\SubjectTable');
			$subject	= $this->subjectTable->fetchAll();
			foreach ($subject as $itemSubject){
				$arrSubject[$itemSubject->subject_id]	= $itemSubject->subject_name;
			}
			
			$form	= new CreateQuestionForm();
			$form->initial('Thêm câu hỏi', $arrType, $arrSubject);
			$error	= 0;
			$err	= array(0, 0, 0, 0);
			
			if ($this->getRequest()->isPost()) {
				$validateQuestion	= new CreateQuestion();
				$form->setInputFilter($validateQuestion->getInputFilter());
				$form->setData($this->getRequest()->getPost());
				if ($form->isValid()) {
					$this->data = $form->getData();
					if ($this->data['question_type'] != Config::TRUE_FALSE_QUESTION) {
						if ($this->data['choice_1'] == "") {
							$error	= 1;
							$err[0]	= 1;
						}
						if ($this->data['choice_2'] == "") {
							$error	= 1;
							$err[1]	= 1;
						}
						if ($this->data['choice_3'] == "") {
							$error	= 1;
							$err[2]	= 1;
						}
						if ($this->data['choice_4'] == "") {
							$error	= 1;
							$err[3]	= 1;
						}
					} 
					if ($error	== 0) {
						$this->saveData($this->data);
						$url	= 'questionbysubject/'.$this->data['subject'];
						$this->redirect()->toUrl($url);
					}
				}
			}
			
			return new ViewModel(array(
									'form' => $form,
									'err'	=> $err,
			));
		}
		
		/**
		 * View câu hỏi theo loại câu hỏi
		 */
		public function viewQuestionAction() {
			$this->init();
			if (!$this->_getAcl()->isAllowed($this->sessionAdmin->right, null, "admin_viewquestion")) {
				$this->redirect()->toUrl('login');
			}
			
			$id	= $this->params('id');
			$this->questionTable	= $this->getServiceLocator()->get('Exam\Model\QuestionTable');
			$paginator	= $this->questionTable->getByType($id);
			$paginator->setCurrentPageNumber((int) $this->params()->fromQuery('page', 1));
			$paginator->setItemCountPerPage($this->perpage);
			
			$this->subjectTable	= $this->getServiceLocator()->get('Exam\Model\SubjectTable');
			$subject	= $this->subjectTable->fetchAll();
			foreach ($subject as $item)
				$arrSub[$item->subject_id]	= $item->subject_name;
			return new ViewModel(array(
									'paginator' => $paginator,
									'subject'	=> $arrSub,
									'id' => $id,
									'perpage'	=> $this->perpage,
			));
		}
		
		/**
		 * View câu hỏi theo môn học
		 */
		public function questionBySubjectAction() {
			$this->init();
			if (!$this->_getAcl()->isAllowed($this->sessionAdmin->right, null, "admin_viewquestion")) {
				$this->redirect()->toUrl('login');
			}
			
			$id	= $this->params('id');
			$this->subjectTable	= $this->getServiceLocator()->get('Exam\Model\SubjectTable');
			$currentSubject	= $this->subjectTable->getById($id);
			$this->questionTable	= $this->getServiceLocator()->get('Exam\Model\QuestionTable');
			$paginator	= $this->questionTable->getBySubject($id);
			$paginator->setCurrentPageNumber((int) $this->params()->fromQuery('page', 1));
			$paginator->setItemCountPerPage($this->perpage);
			return new ViewModel(array(
									'paginator' => $paginator,
									'id'	=> $id,
									'perpage'	=> $this->perpage,
									'subjectName'	=> $currentSubject->subject_name,
			));
		}
		
		/**
		 * Sửa câu hỏi 
		 */
		public function editQuestionAction() {
			$this->init();
			if (!$this->_getAcl()->isAllowed($this->sessionAdmin->right, null, "admin_editquestion")) {
				$this->redirect()->toUrl('login');
			}
			if (!isset($this->sessionAdmin->beforeEditUrl))
				$this->sessionAdmin->beforeEditUrl = $this->getRequest()->getHeader('Referer')->getUri();
			$this->answer	= null;
			$questionId	= $this->params('id');
			$this->questionTable	= $this->getServiceLocator()->get('Exam\Model\QuestionTable');
			$this->answerTable	= $this->getServiceLocator()->get('Exam\Model\AnswerTable');
			$this->question	= $this->questionTable->getById($questionId);
			$choice	= $this->answerTable->getByQId($questionId);
			$form	= new EditQuestionForm();
			$form->initial('Sửa câu hỏi', $this->question->question_type_id, $this->question, $choice);
		
			if ($this->getRequest()->isPost()) {
				$validateQuestion	= new EditQuestion($this->question->question_type_id);
				$form->setInputFilter($validateQuestion->getInputFilter());
				$form->setData($this->getRequest()->getPost());
				if ($form->isValid()) {
					$this->data = $form->getData();
					$this->data['question_id']	= $questionId;
					$this->data['question_type']	= $this->question->question_type_id;
					$this->data['subject']	= $this->question->subject_id;
					$this->data['answer_id']	= ($choice != null) ? $choice->answer_id : null;
					$this->saveData($this->data);
					$url	= $this->sessionAdmin->beforeEditUrl;
					$this->sessionAdmin->offsetUnset('beforeEditUrl');
					$this->redirect()->toUrl($url);
				}
			}
			
			return new ViewModel(array(
									'form' => $form,
									'questionId' => $questionId,
									'questionType' => $this->question->question_type_id,
			));
		}
		
		/**
		 * Xóa phương án lựa chọn của câu hỏi
		 * @param int $questionId Id câu hỏi
		 */
		public function deleteAnswer($questionId) {
			$this->answerTable	= $this->getServiceLocator()->get('Exam\Model\AnswerTable');
			$this->answer	= $this->answerTable->getByQId($questionId);
			$this->answer->del_flg	= 1;
			$this->answerTable->saveAnswer($this->answer);
		}
		
		/**
		 * Xóa câu hỏi
		 * @param int $questionId Id câu hỏi
		 */
		public function deleteQuestion($questionId) {
			$this->questionTable	= $this->getServiceLocator()->get('Exam\Model\QuestionTable');
			$this->question	= $this->questionTable->getById($questionId);
			$this->question->del_flg	= 1;				
			$this->questionTable->saveQuestion($this->question);
			if ($this->question->question_type_id	!= 1)
				$this->deleteAnswer($this->question->question_id);
		}
		
		public function deleteQuestionAction() {
			$this->init();
			if (!$this->_getAcl()->isAllowed($this->sessionAdmin->right, null, "admin_deletequestion")) {
				$this->redirect()->toUrl('login');
			}
			$this->deleteQuestion($this->params('id'));
			$url = $this->getRequest()->getHeader('Referer')->getUri();
			$this->redirect()->toUrl($url);
		}
		
		public function saveData($data) {
			
			$this->question	= new Question();
			$this->question->question_id	= (isset($data['question_id'])) ? $data['question_id'] : null;
			$this->question->subject_id	= $data['subject'];
			$this->question->question_type_id	= $data['question_type'];
			$this->question->question	= $data['content'];
			$this->question->del_flg	= 0;
					
			switch ($data['question_type']) {
				case Config::TRUE_FALSE_QUESTION:
					$this->question->answer	= $data['answer1'];
					break;
				case Config::CORRECT_QUESTION:
					$answer	= "";
					foreach ($data['answer2'] as $item)
						if ($answer == "")
							$answer	= $item;
						else 
							$answer	= $answer."&".$item;
					$this->question->answer	= $answer;
					break;
				case Config::BEST_CORRECT_QUESTION:
					$this->question->answer	= $data['answer3'];
					break;
			}

			$this->questionTable	= $this->getServiceLocator()->get('Exam\Model\QuestionTable');					
			$lastQuestionId	= $this->questionTable->saveQuestion($this->question);
			
			if ($data['question_type']	!= Config::TRUE_FALSE_QUESTION) {
				$this->answer	= new Answer();
				$this->answer->answer_id	= $data['answer_id'];
				$this->answer->question_id	= (isset($data['question_id'])) ? $data['question_id'] : $lastQuestionId;
				$this->answer->choice_1	= $data['choice_1'];
				$this->answer->choice_2	= $data['choice_2'];
				$this->answer->choice_3	= $data['choice_3'];
				$this->answer->choice_4	= $data['choice_4'];
				$this->answer->del_flg	= 0;
				$this->answerTable	= $this->getServiceLocator()->get('Exam\Model\AnswerTable');
				$this->answerTable->saveAnswer($this->answer);
			}
		}
		
		/* --- Student ---*/
		
		public function viewStudentAction() {
			$this->init();
			if (!$this->_getAcl()->isAllowed($this->sessionAdmin->right, null, "admin_viewstudent")) {
				$this->redirect()->toUrl('login');
			}
			
			$this->studentTable	= $this->getServiceLocator()->get('Exam\Model\StudentTable');
			$paginator = $this->studentTable->fetchAll(true, 'ex_student');
			$paginator->setCurrentPageNumber((int) $this->params()->fromQuery('page', 1));
			$paginator->setItemCountPerPage($this->perpage);
			
			return new ViewModel(array(
				'paginator' => $paginator,
				'perpage'	=> $this->perpage,
			));
		}
			
		public function deleteStudentAction() {
			$this->init();
			if (!$this->_getAcl()->isAllowed($this->sessionAdmin->right, null, "admin_deletestudent")) {
				$this->redirect()->toUrl('login');
			}
			
			$studentId	= $this->params('id');
			$this->studentTable	= $this->getServiceLocator()->get('Exam\Model\StudentTable');
			$this->student	= $this->studentTable->getById($studentId);
			$this->student->del_flg	= 1;				
			$this->studentTable->saveStudent($this->student);
			$this->examInfoTable	= $this->getServiceLocator()->get('Exam\Model\TestInfoTable');
			$tested	= $this->examInfoTable->getByStudentId($studentId);
			foreach ($tested as $test) {
				$test->del_flg	= 1;
				$this->examInfoTable->saveTestInfo($test);
			}
		 	$this->redirect()->toUrl('../viewstudent');
		}
		
		/* --- Subject --- */
		
		public function addSubjectAction() {
			$this->init();
			if (!$this->_getAcl()->isAllowed($this->sessionAdmin->right, null, "admin_addsubject")) {
				$this->redirect()->toUrl('login');
			}
			
			$form	= new CreateSubjectForm();
			$form->initial('Thêm môn học');		

			if ($this->getRequest()->isPost()) {
				$validateSubject	= new CreateSubject();
				$form->setInputFilter($validateSubject->getInputFilter());
				$form->setData($this->getRequest()->getPost());
				if ($form->isValid()) {
					$this->data = $form->getData();
					if (!$this->checkSubjectName($this->data['name'])) {
						$this->err	= "Môn học đã tồn tại!";
					}
					else {
						$this->subject	= new Subject();
						$this->subject->subject_name	= $this->data['name'];
						$this->subject->description	= $this->data['description'];
						$this->subject->test_time	= $this->data['time'];
						$this->subject->question_num	= $this->data['num'];
						$this->subject->del_flg	= 0;
						$this->subjectTable	= $this->getServiceLocator()->get('Exam\Model\SubjectTable');
						$this->subjectTable->saveSubject($this->subject);
						$this->redirect()->toUrl('viewsubject');
						
					}
				}
			}
			
			return new ViewModel(array(
									'form' => $form, 
									'err' => $this->err,	
			));
		}
		
		public function viewSubjectAction() {
			$this->init();
			if (!$this->_getAcl()->isAllowed($this->sessionAdmin->right, null, "admin_viewsubject")) {
				$this->redirect()->toUrl('login');
			}
			
			$this->subjectTable	= $this->getServiceLocator()->get('Exam\Model\SubjectTable');
			$paginator = $this->subjectTable->fetchAll(true, 'ex_subject');
			$paginator->setCurrentPageNumber((int) $this->params()->fromQuery('page', 1));
			$paginator->setItemCountPerPage($this->perpage);
			
			return new ViewModel(array(
				'paginator' => $paginator,
				'perpage'	=> $this->perpage,
			));
		}
		
		public function editSubjectAction() {
			$this->init();
			if (!$this->_getAcl()->isAllowed($this->sessionAdmin->right, null, "admin_editsubject")) {
				$this->redirect()->toUrl('login');
			}
			
			$subjectId	= $this->params('id');
			$this->subjectTable	= $this->getServiceLocator()->get('Exam\Model\SubjectTable');
			$subject	= $this->subjectTable->getById($subjectId);
			$form	= new CreateSubjectForm();
			$form->initial('Sửa môn học', $subject);
			
			if ($this->getRequest()->isPost()) {
				$validateSubject	= new CreateSubject();
				$form->setInputFilter($validateSubject->getInputFilter());
				$form->setData($this->getRequest()->getPost());
				if ($form->isValid()) {
					$this->data = $form->getData();
					if (!$this->checkEditSubjectName($subjectId, $this->data['name']))
						$this->err	= "Tên môn học bị trùng!";
					else {
						$this->subject	= new Subject();
						$this->subject->subject_id	= $subjectId;
						$this->subject->subject_name	= $this->data['name'];
						$this->subject->description	= $this->data['description'];
						$this->subject->test_time	= $this->data['time'];
						$this->subject->question_num	= $this->data['num'];
						$this->subject->del_flg	= 0;
						$this->subjectTable->saveSubject($this->subject);
						$this->redirect()->toUrl('../viewsubject');
					}
				}
			}
			
			return new ViewModel(array(
									'form' => $form,
									'id' => $subjectId,
									'err' => $this->err,	
			));
		}
		
		public function deleteSubjectAction() {
			$this->init();
			if (!$this->_getAcl()->isAllowed($this->sessionAdmin->right, null, "admin_deletesubject")) {
				$this->redirect()->toUrl('login');
			}
			$subjectId	= $this->params('id');
			$this->subjectTable	= $this->getServiceLocator()->get('Exam\Model\SubjectTable');
			$this->subject	= $this->subjectTable->getById($subjectId);
			$this->subject->del_flg	= 1;				
			$this->subjectTable->saveSubject($this->subject);
			$this->questionTable	= $this->getServiceLocator()->get('Exam\Model\QuestionTable');
			$listQuestion	= $this->questionTable->getBySubject($this->subject->subject_id);
			foreach ($listQuestion as $question)
				$this->deleteQuestion($question->question_id);
		 	$this->redirect()->toUrl('../viewsubject');
		}
		
		public function checkSubjectName($name) {
			$this->subjectTable	= $this->getServiceLocator()->get('Exam\Model\SubjectTable');
			$result	= $this->subjectTable->getByName($name);
			if ($result	== null) return true;
			return false;
		}
		
		public function checkEditSubjectName($subjectId, $name) {
			$this->subjectTable	= $this->getServiceLocator()->get('Exam\Model\SubjectTable');
			$result	= $this->subjectTable->getByName($name);
			if ($result == null || $result->subject_id	== $subjectId) return true;
			return false;
		}
		
		/* --- Teacher --- */
		
		public function loginAction() {
			$this->layout('admin/layout_login');
			$form	= new LoginForm();
			$form->initial();
			
			if ($this->getRequest()->isPost()) {
				$validateLogin	= new Login();
				$form->setInputFilter($validateLogin->getInputFilter());
				$form->setData($this->getRequest()->getPost());
				if ($form->isValid()) {
					$this->data = $form->getData();
					$result	= $this->checkTeacher($this->data);
					if ($result != null) {
						$sessionAdmin	= new Container('admin');
						$sessionAdmin->info	= $result;
						if ($result->level	== 1)
							$sessionAdmin->right	= "Manager";
						else
							$sessionAdmin->right	= "Teacher";
						$this->redirect()->toUrl('index');
					}
					else 
						$this->err	= "Sai tên đăng nhập hoặc mật khẩu!";
				}
			}

			return new ViewModel(array('form' => $form, 'err' => $this->err));
		}
		
		public function logoutAction() {
			$sessionAdmin	= new Container('admin');
			$sessionAdmin->offsetUnset('info');
			$sessionAdmin->offsetUnset('right');
			$this->redirect()->toUrl('../admin/login');
		}
		
		public function viewTeacherAction() {
			$this->init();
			if (!$this->_getAcl()->isAllowed($this->sessionAdmin->right, null, "admin_viewteacher")) {
				$this->redirect()->toUrl('login');
			}
			
			$this->teacherTable	= $this->getServiceLocator()->get('Admin\Model\TeacherTable');
			$paginator = $this->teacherTable->fetchAll(true, 'ex_teacher');
			$paginator->setCurrentPageNumber((int) $this->params()->fromQuery('page', 1));
			$paginator->setItemCountPerPage($this->perpage);
			
			return new ViewModel(array(
				'paginator' => $paginator,
				'perpage'	=> $this->perpage,
				'level'		=> $this->sessionAdmin->info->level,
			));
		}
		
		public function newTeacherAction() {
			$this->init();
			if(!$this->_getAcl()->isAllowed($this->sessionAdmin->right, null, "admin_newteacher")) {
				$this->redirect()->toUrl('index');
			}
			$form	= new NewTeacherForm();
			$form->initial();
			$form->get('submit')->setAttribute('value', 'Tạo tài khoản');
			if ($this->getRequest()->isPost()) {
				$validateTeacher	= new NewTeacher();
				$form->setInputFilter($validateTeacher->getInputFilter());
				$form->setData($this->getRequest()->getPost());
				if ($form->isValid()) {
					$data = $form->getData();
					if (!$this->checkUsername($data)) {
						$this->err	= "Tên đăng nhập đã tồn tại!";
					}
					else {
						$this->teacher	= new Teacher();
						$this->teacher->username	= $data['username'];
						$this->teacher->setPassword(md5($data['password']));
						$this->teacher->name	= $data['yourname'];
						$parts = explode('-', $data['birthday']);
						$date  = $parts[2]."-".$parts[1]."-".$parts[0];
						$this->teacher->birthday	= $date;
						$this->teacher->level	= 0;
						$this->teacher->del_flg	= 0;
						$time	= new CurrentTime();
						$this->teacher->created_at	= $time->getCurrentTime();
						$this->teacherTable	= $this->getServiceLocator()->get('Admin\Model\TeacherTable');
						$this->teacherTable->saveTeacher($this->teacher);
						$this->redirect()->toUrl('viewteacher');
					}
				}
			}
			
			return new ViewModel(array(
									'form' => $form, 
									'err' => $this->err,	
			));
		}
		
		public function deleteTeacherAction() {
			$this->init();
			if(!$this->_getAcl()->isAllowed($this->sessionAdmin->right, null, "admin_deleteteacher")) {
				$this->redirect()->toUrl('index');
			}
			$teacherId	= $this->params('id');
			$this->teacherTable	= $this->getServiceLocator()->get('Admin\Model\TeacherTable');
			$this->teacher	= $this->teacherTable->getById($teacherId);
			$this->teacher->del_flg	= 1;				
			$this->teacherTable->saveTeacher($this->teacher);
		 	$this->redirect()->toUrl('../viewteacher');
		}
		
		public function checkUsername($data) {
			$this->teacherTable	= $this->getServiceLocator()->get('Admin\Model\TeacherTable');
			$result	= $this->teacherTable->getByUsername($data['username']);
			if ($result	== null)
				return true;
			return false;
		}
		
		public function checkTeacher($data) {
			$this->teacherTable	= $this->getServiceLocator()->get('Admin\Model\TeacherTable');
			$result	= $this->teacherTable->getByUserPass($data['username'], md5($data['password']));
			return $result;
		}
		
		/* --- Test --- */
		
		public function moveToArray($listExam) {
			$arr	= array();
			foreach ($listExam as $item)
				$arr[]	= $item;
			return $arr;
		}
		
		public function viewRequireAction() {
			$this->init();
			if(!$this->_getAcl()->isAllowed($this->sessionAdmin->right, null, "admin_viewrequire")) {
				$this->redirect()->toUrl('login');
			}
			
			$arrStudent	= array();
			$arrSubject	= array();
			$this->studentTable	= $this->getServiceLocator()->get('Exam\Model\StudentTable');
			$this->subjectTable	= $this->getServiceLocator()->get('Exam\Model\SubjectTable');
			$this->examInfoTable	= $this->getServiceLocator()->get('Exam\Model\TestInfoTable');
			$arr	= $this->moveToArray($this->examInfoTable->getByRequireTestAgain(false));
			$paginator	= $this->examInfoTable->getByRequireTestAgain(true);
			$paginator->setCurrentPageNumber((int) $this->params()->fromQuery('page', 1));
			$paginator->setItemCountPerPage($this->perpage);
			foreach ($arr as $item) {
				$arrStudent[$item->student_id]	= $this->studentTable->getById($item->student_id)->name;
				$arrSubject[$item->subject_id]	= $this->subjectTable->getById($item->subject_id)->subject_name;
			}

			return new ViewModel(array(	'paginator' => $paginator,
										'perpage'	=> $this->perpage,
										'arrStudentName' => $arrStudent,
										'arrSubjectName' => $arrSubject,
			));
		}
		
		public function allowTestAgainAction() {
			$this->init();
			if(!$this->_getAcl()->isAllowed($this->sessionAdmin->right, null, "admin_allowtestagain")) {
				$this->redirect()->toUrl('login');
			}
			
			$examId	= $this->params('id');
			$this->examInfoTable	= $this->getServiceLocator()->get('Exam\Model\TestInfoTable');
			$info	= $this->examInfoTable->getById($examId);
			$info->test_again	= Config::ALLOW_TEST_AGAIN;
			$this->examInfoTable->saveTestInfo($info);
			$this->redirect()->toUrl('../viewrequire');
		}
		
		public function denyTestAgainAction() {
			$this->init();
			if(!$this->_getAcl()->isAllowed($this->sessionAdmin->right, null, "admin_denytestagain")) {
				$this->redirect()->toUrl('login');
			}
			
			$examId	= $this->params('id');
			$this->examInfoTable	= $this->getServiceLocator()->get('Exam\Model\TestInfoTable');
			$info	= $this->examInfoTable->getById($examId);
			$info->test_again	= Config::DENY_TEST_AGAIN;
			$this->examInfoTable->saveTestInfo($info);
			$this->redirect()->toUrl('../viewrequire');
		}
	}
<?php
	namespace Exam\Controller;

	use Zend\Mvc\Controller\AbstractActionController,
		Zend\View\Model\ViewModel,
		Zend\Session\Container,
		Zend\Permissions\Acl\Acl,
		Zend\Permissions\Acl\Role\GenericRole as Role,
		Zend\Permissions\Acl\Resource\GenericResource as Resource,

		Exam\Form\Validate\Register,
		Exam\Form\RegisterForm,
		Exam\Model\Student,
		Exam\Model\StudentTable,
		Exam\Form\Validate\Login,
		Exam\Form\LoginForm,
		Exam\Model\Question,
		Exam\Model\QuestionTable,
		Exam\Config\Config,
		Exam\Config\CurrentTime;

	class IndexController extends AbstractActionController {

		protected $student;
		protected $studentTable;
		protected $teacher;
		protected $teacherTable;
		protected $subject;
		protected $subjectTable;
		protected $question;
		protected $questionTable;
		protected $answer;
		protected $answerTable;
		protected $topStudent;

		protected $sessionStudent;
		protected $err;
		protected $success;
		protected $data;
		protected $perpage	= Config::PAGINATOR_PER_PAGE;
		private $_acl;

		public function getAcl() {
			if(!$this->_acl) {
				$this->_acl = $this->getServiceLocator()->get("Acl");
			}
			return $this->_acl;
		}

		public function init() {
			$this->subjectTable	= $this->getServiceLocator()->get('Exam\Model\SubjectTable');
			$this->studentTable	= $this->getServiceLocator()->get('Exam\Model\StudentTable');
			$this->subject	= $this->subjectTable->fetchAll();
			$this->topStudent	= $this->studentTable->getTop();
			$this->layout()->setVariable('subject', $this->subject);
			$this->layout()->setVariable('topStudent', $this->topStudent);
			$this->sessionStudent	= new Container('student');
			if ($this->sessionStudent->info != null) {
				$this->layout()->setVariable('student', true);
				$this->layout()->setVariable('name', $this->sessionStudent->info->username);
				$this->layout()->setVariable('mark', $this->sessionStudent->info->average_mark);
			}
		}

		public function indexAction() {
			$this->init();
		}

		public function loginAction() {
			$this->init();
			$this->err	= "";
			$form	= new LoginForm();
			$form->initial();

			if ($this->getRequest()->isPost()) {
				$validateLogin	= new Login();
				$form->setInputFilter($validateLogin->getInputFilter());
				$form->setData($this->getRequest()->getPost());
				if ($form->isValid()) {
					$this->data = $form->getData();
					$this->student	= $this->checkStudent($this->data);
					if ($this->student != null) {
						$sessionStudent	= new Container('student');
						$sessionStudent->info	= $this->student;
						$sessionStudent->right	= "Student";
						$sessionStudent->finishTime	= null;
						$this->redirect()->toUrl('../index/index');
					}
					else
						$this->err	= "Sai tên đăng nhập hoặc mật khẩu!";
				}
			}
			return new ViewModel(array('form' => $form, 'err' => $this->err));
		}

		public function registerAction() {
			$this->init();
			$this->err	= "";
			$this->success	= "";
			$form	= new RegisterForm();
			$form->initial();
			$form->get('submit')->setAttribute('value', 'Đăng ký');
			if ($this->getRequest()->isPost()) {
				$validateRegister	= new Register();
				$form->setInputFilter($validateRegister->getInputFilter());
				$form->setData($this->getRequest()->getPost());
				if ($form->isValid()) {
					$this->data = $form->getData();
					if (!$this->checkUsername($this->data)) {
						$this->err	= "Tên đăng nhập đã được sử dụng!";
					}
					else {
						$this->student	= new Student();
						$this->student->student_id	= (isset($data['student_id'])) ? $data['student_id'] : null;
						$this->student->username	= $this->data['username'];
						$this->student->setPassword(md5($this->data['password']));
						$this->student->name	= $this->data['yourname'];
						$parts = explode('-', $this->data['birthday']);
						$date  = $parts[2]."-".$parts[1]."-".$parts[0];
						$this->student->birthday	= $date;
						$this->student->average_mark	= 0;
						$this->student->del_flg	= 0;
						$this->studentTable	= $this->getServiceLocator()->get('Exam\Model\StudentTable');
						$this->studentTable->saveStudent($this->student);
						$this->success	= "Đăng ký thành công. Hãy đăng nhập để làm bài thi!";
					}
				}
			}
			return new ViewModel(array('form' => $form, 'err' => $this->err, 'success' => $this->success));
		}

		public function checkStudent($data) {
			$this->studentTable	= $this->getServiceLocator()->get('Exam\Model\StudentTable');
			$result	= $this->studentTable->getStudent($data['username'], md5($data['password']));
			return $result;
		}

		public function checkUsername($data) {
			$this->studentTable	= $this->getServiceLocator()->get('Exam\Model\StudentTable');
			$result	= $this->studentTable->getUsername($data['username']);
			if ($result	== null)
				return true;
			return false;
		}

		public function introduceAction() {

		}

		public function contactAction() {

		}

		public function viewStudentAction() {
			$this->init();
			$this->studentTable	= $this->getServiceLocator()->get('Exam\Model\StudentTable');
			$paginator = $this->studentTable->fetchAll(true, 'ex_student');
			$paginator->setCurrentPageNumber((int) $this->params()->fromQuery('page', 1));
			$paginator->setItemCountPerPage($this->perpage);

			return new ViewModel(array(
				'paginator' => $paginator,
				'perpage'	=> $this->perpage,
			));
		}

		public function viewTeacherAction() {
			$this->init();
			$this->teacherTable	= $this->getServiceLocator()->get('Admin\Model\TeacherTable');
			$paginator = $this->teacherTable->fetchAll(true, 'ex_teacher');
			$paginator->setCurrentPageNumber((int) $this->params()->fromQuery('page', 1));
			$paginator->setItemCountPerPage($this->perpage);

			return new ViewModel(array(
				'paginator' => $paginator,
				'perpage'	=> $this->perpage,
			));
		}

		public function viewSubjectInfoAction() {
			$this->init();
			$subjectId	= $this->params('id');
			$this->subjectTable	= $this->getServiceLocator()->get('Exam\Model\SubjectTable');
			$this->subject	= $this->subjectTable->getById($subjectId);
			return new ViewModel(array(
				'selectedSubject' => $this->subject,
			));
		}

	}
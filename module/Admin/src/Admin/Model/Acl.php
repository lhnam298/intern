<?php
	namespace Admin\Model;

	use Zend\Permissions\Acl\Acl as ZendAcl,
		Zend\Permissions\Acl\Role\GenericRole as Role,
		Zend\Permissions\Acl\Resource\GenericResource as Resource;

	class Acl extends ZendAcl {
		public function __construct() {

			$this->addRole(new Role("Teacher"))->addRole(new Role("Manager"), "Teacher");
			$this->addRole(new Role("Student"));

			$this->allow("Student", null, array("student_exam"));
			$this->allow("Student", null, array("student_requiretestagain"));
			$this->allow("Student", null, array("student_createexam"));
			$this->allow("Student", null, array("student_showresult"));
			$this->allow("Student", null, array("student_finishexam"));
			$this->allow("Student", null, array("student_logout"));
			$this->allow("Student", null, array("student_viewanswer"));

			$this->allow("Teacher", null, array("admin_index"));
			$this->allow("Teacher", null, array("admin_viewquestion"));
			$this->allow("Teacher", null, array("admin_addquestion"));
			$this->allow("Teacher", null, array("admin_editquestion"));
			$this->allow("Teacher", null, array("admin_deletequestion"));
			$this->allow("Teacher", null, array("admin_viewstudent"));
			$this->allow("Teacher", null, array("admin_viewteacher"));
			$this->allow("Teacher", null, array("admin_deletestudent"));
			$this->allow("Teacher", null, array("admin_addsubject"));
			$this->allow("Teacher", null, array("admin_viewsubject"));
			$this->allow("Teacher", null, array("admin_editsubject"));
			$this->allow("Teacher", null, array("admin_deletesubject"));
			$this->allow("Teacher", null, array("admin_login"));
			$this->allow("Teacher", null, array("admin_logout"));
			$this->allow("Teacher", null, array("admin_viewrequire"));
			$this->allow("Teacher", null, array("admin_allowtestagain"));
			$this->allow("Teacher", null, array("admin_questionbysubject"));
			$this->allow("Teacher", null, array("admin_denytestagain"));
			$this->allow("Manager", null, array("admin_newteacher"));
			$this->allow("Manager", null, array("admin_deleteteacher"));

		}
	}
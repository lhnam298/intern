<?php
	namespace Application\Model;
	use Zend\Permissions\Acl\Acl as ZendAcl;
	use Zend\Permissions\Acl\Role\GenericRole as Role;
	use Zend\Permissions\Acl\Resource\GenericResource as Resource;
	
	class Acl extends ZendAcl {
		public function __construct(){
			$this->addRole(new Role('uest'))
				->addRole(new Role('Student'), 'Guest')
				->addRole(new Role('Teacher'), 'Student');
			$guestPrivileges	= array('index_index');
			$studentPrivileges  = array('');
			$teacherPrivileges	= array('');
			$this->allow("Guest", null, array("index_index", "login_index"));
			$this->allow()
		}
	}
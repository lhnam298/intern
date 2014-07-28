<?php
	namespace Admin;
	
	use Admin\Model\TeacherTable,
		Admin\Model\Teacher,
		Admin\Model\Acl,
		Exam\Model\QuestionType,
		Exam\Model\QuestionTypeTable,
		Exam\Model\Subject,
		Exam\Model\SubjectTable,
		Zend\Db\ResultSet\ResultSet,
		Zend\Db\TableGateway\TableGateway;
	
	class Module {
		
		public function getServiceConfig() {
	    	return array(
	          	'factories' => array(
	             	'Admin\Model\TeacherTable' => function ($sm) {
						$tableGateway = $sm->get('TeacherTableGateway');        
		           		$table	= new TeacherTable($tableGateway);
			            return $table;
		            },
					'TeacherTableGateway' =>  function($sm) {
		            	$dbAdapter	= $sm->get('Zend\Db\Adapter\Adapter');
	             		$resultSetPrototype = new ResultSet();
						$resultSetPrototype->setArrayObjectPrototype(new Teacher());
						return new TableGateway('ex_teacher', $dbAdapter, null, $resultSetPrototype);
		            },
		            'Exam\Model\QuestionTypeTable' => function ($sm) {
						$tableGateway = $sm->get('QuestionTypeTableGateway');        
		           		$table	= new QuestionTypeTable($tableGateway);
			            return $table;
		            },
					'QuestionTypeTableGateway' =>  function($sm) {
		            	$dbAdapter	= $sm->get('Zend\Db\Adapter\Adapter');
	             		$resultSetPrototype = new ResultSet();
						$resultSetPrototype->setArrayObjectPrototype(new QuestionType());
						return new TableGateway('ex_question_type', $dbAdapter, null, $resultSetPrototype);
		            },
		            'Exam\Model\SubjectTable' => function ($sm) {
						$tableGateway = $sm->get('SubjectTableGateway');        
		           		$table	= new SubjectTable($tableGateway);
			            return $table;
		            },
					'SubjectTableGateway' =>  function($sm) {
		            	$dbAdapter	= $sm->get('Zend\Db\Adapter\Adapter');
	             		$resultSetPrototype = new ResultSet();
						$resultSetPrototype->setArrayObjectPrototype(new Subject());
						return new TableGateway('ex_subject', $dbAdapter, null, $resultSetPrototype);
		            },
		            'Acl' => function($sm) {
						$acl = new Acl();
						return $acl;
					},
	          	),
			);
	    }
		
	    public function getAutoloaderConfig()
	    {
	        return array(
	            'Zend\Loader\ClassMapAutoloader' => array(
	                __DIR__ . '/autoload_classmap.php',
	            ),
	            'Zend\Loader\StandardAutoloader' => array(
	                'namespaces' => array(
	                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
	                ),
	            ),
	        );
	    }
	
	    public function getConfig()
	    {
	        return include __DIR__ . '/config/module.config.php';
	    }
	} 
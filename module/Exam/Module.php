<?php
	namespace Exam;
	
	use Exam\Model\Student,
		Exam\Model\StudentTable,
		Exam\Model\Answer,
		Admin\Model\Acl,
		Exam\Model\AnswerTable,
		Exam\Model\Question,
		Exam\Model\QuestionTable,
		Exam\Model\TestInfo,
		Exam\Model\TestInfoTable,
		Zend\Db\ResultSet\ResultSet,
		Zend\Db\TableGateway\TableGateway;
	
	class Module {
		
		public function getServiceConfig() {
			return array(
				'factories' => array(
					'Exam\Model\StudentTable' => function ($sm) {
						$tableGateway = $sm->get('StudentTableGateway');
						$table	= new StudentTable($tableGateway);
						return $table;
					},
					'StudentTableGateway' =>  function($sm) {
						$dbAdapter	= $sm->get('Zend\Db\Adapter\Adapter');
						$resultSetPrototype = new ResultSet();
						$resultSetPrototype->setArrayObjectPrototype(new Student());
						return new TableGateway('ex_student', $dbAdapter, null, $resultSetPrototype);
					},
					'Exam\Model\QuestionTable' => function ($sm) {
						$tableGateway = $sm->get('QuestionTableGateway');
						$table	= new QuestionTable($tableGateway);
						return $table;
					},
					'QuestionTableGateway' =>  function($sm) {
						$dbAdapter	= $sm->get('Zend\Db\Adapter\Adapter');
						$resultSetPrototype = new ResultSet();
						$resultSetPrototype->setArrayObjectPrototype(new Question());
						return new TableGateway('ex_question', $dbAdapter, null, $resultSetPrototype);
					},
					'Exam\Model\AnswerTable' => function ($sm) {
						$tableGateway = $sm->get('AnswerTableGateway');
						$table	= new AnswerTable($tableGateway);
						return $table;
					},
					'AnswerTableGateway' =>  function($sm) {
						$dbAdapter	= $sm->get('Zend\Db\Adapter\Adapter');
						$resultSetPrototype = new ResultSet();
						$resultSetPrototype->setArrayObjectPrototype(new Answer());
						return new TableGateway('ex_answer', $dbAdapter, null, $resultSetPrototype);
					},
					'Exam\Model\TestInfoTable' => function ($sm) {
						$tableGateway = $sm->get('TestInfoTableGateway');
						$table	= new TestInfoTable($tableGateway);
						return $table;
					},
					'TestInfoTableGateway' =>  function($sm) {
					$dbAdapter	= $sm->get('Zend\Db\Adapter\Adapter');
					$resultSetPrototype = new ResultSet();
						$resultSetPrototype->setArrayObjectPrototype(new TestInfo());
						return new TableGateway('ex_test_info', $dbAdapter, null, $resultSetPrototype);
					},
					'Acl' => function($sm) {
						$acl = new Acl();
						return $acl;
					},
				),
			);
		}
	
		public function getAutoloaderConfig() {
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
	
		public function getConfig() {
			return include __DIR__ . '/config/module.config.php';
		}
	}
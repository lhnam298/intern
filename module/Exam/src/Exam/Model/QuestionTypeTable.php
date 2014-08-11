<?php
	namespace Exam\Model;
	
	use Zend\Db\TableGateway\TableGateway,
		Zend\Db\Sql\Select,
	 	Zend\Paginator\Adapter\DbSelect,
	 	Zend\Paginator\Paginator,
	 	Zend\Db\ResultSet\ResultSet;
	 	
	class QuestionTypeTable extends ObjectTable {
		
		public function fetchAll($paginated=false, $tableName=null) {
			if ($paginated) {
				$select = new Select($tableName);
				$select->where(array('del_flg'	=> '0'));
				$resultSetPrototype = new ResultSet();
				$resultSetPrototype->setArrayObjectPrototype(new QuestionType());
				$paginatorAdapter = new DbSelect(
					$select,
					$this->tableGateway->getAdapter(),
					$resultSetPrototype
				);
				$paginator = new Paginator($paginatorAdapter);
				return $paginator;
			}
			$resultSet = $this->tableGateway->select(array('del_flg' => '0'));
			return $resultSet;
		}
		
		public function getById($id) {
			
		}
		
		public function getByName($name) {
			
		}
	}
<?php
	namespace Exam\Model;
	
	use Zend\Db\TableGateway\TableGateway,
		Zend\Db\Sql\Select,
	 	Zend\Paginator\Adapter\DbSelect,
	 	Zend\Paginator\Paginator,
	 	Zend\Db\ResultSet\ResultSet;
	
	abstract class ObjectTable {
		protected $tableGateway;
		abstract protected function getByName($name);
		abstract protected function getById($id);
		abstract protected function fetchAll();
		
		public function __construct(TableGateway $tableGateway) {
			$this->tableGateway	= $tableGateway;
		}
		
//		public function fetchAll() {
//			$resultSet	= $this->tableGateway->select(array('del_flg' => '0'));
//			return $resultSet;
//		}
	}
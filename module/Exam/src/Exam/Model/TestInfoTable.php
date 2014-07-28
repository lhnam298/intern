<?php
	namespace Exam\Model;
	
	use Zend\Db\TableGateway\TableGateway,
		Zend\Db\Sql\Select,
	 	Zend\Paginator\Adapter\DbSelect,
	 	Zend\Paginator\Paginator,
	 	Zend\Db\ResultSet\ResultSet,
	 	Exam\Config\CurrentTime;
	 	
	class TestInfoTable extends ObjectTable {
		
		public function fetchAll($paginated=false, $tableName=null) {
			if ($paginated) {
				$select = new Select($tableName);
				$select->where(array('del_flg'	=> '0'));
				$resultSetPrototype = new ResultSet();
				$resultSetPrototype->setArrayObjectPrototype(new TestInfo());
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
			$rowset	= $this->tableGateway->select(array('test_info_id' => $id, 'del_flg' => '0'));
			$row	= $rowset->current();
			return $row;
		}
		
		public function getByName($name) {
			
		}
		
		public function getByStudentId($student_id) {
			$resultSet	= $this->tableGateway->select(array('student_id' => $student_id, 'del_flg' => '0'));
			return $resultSet;
		}
		
		public function getTestInfo($student_id, $subject_id) {
			$rowset	= $this->tableGateway->select(array('student_id' 	=> $student_id, 
														'subject_id' 	=> $subject_id,
														'del_flg'		=> '0'));
			$row	= $rowset->current();
			return $row;
		}
		
		public function getByRequireTestAgain($paginated=false) {
			if ($paginated) {
				$select = new Select('ex_test_info');
				$select->where(array(	'test_again'	=> '3',
										'del_flg' 		=> '0'));
				$resultSetPrototype = new ResultSet();
				$resultSetPrototype->setArrayObjectPrototype(new TestInfo());
				$paginatorAdapter = new DbSelect(
					$select,
					$this->tableGateway->getAdapter(),
					$resultSetPrototype
				);
				$paginator = new Paginator($paginatorAdapter);
				return $paginator;
			}		
			$resultSet	= $this->tableGateway->select(array('test_again' => '3', 'del_flg' => '0'));
			return $resultSet;
		}
		
		public function saveTestInfo(TestInfo $info){
			$data	= array(
				'test_info_id'	=> $info->test_info_id,
				'student_id'	=> $info->student_id,
				'subject_id'	=> $info->subject_id,
				'test_again'	=> $info->test_again,
				'mark'			=> $info->mark,
				'del_flg'		=> $info->del_flg);
			
				$id	= (int)$info->test_info_id;
				$time	= new CurrentTime();
				if ($id == 0) {
					$data['created_at']	= $time->getCurrentTime();
					$this->tableGateway->insert($data);
				}
				else {
					$data['updated_at']	= $time->getCurrentTime();
					$this->tableGateway->update($data, array('test_info_id' => $id));
				}
		}
	}
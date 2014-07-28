<?php
	namespace Exam\Model;
	
	use Zend\Db\TableGateway\TableGateway,
		Zend\Db\Sql\Select,
	 	Zend\Paginator\Adapter\DbSelect,
	 	Zend\Paginator\Paginator,
	 	Zend\Db\ResultSet\ResultSet,
	 	Exam\Config\CurrentTime;
	 	
	class StudentTable extends ObjectTable {
		
		public function fetchAll($paginated=false, $tableName=null) {
			if ($paginated) {
				$select = new Select($tableName);
				$select->where(array('del_flg'	=> '0'));
				$resultSetPrototype = new ResultSet();
				$resultSetPrototype->setArrayObjectPrototype(new Student());
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
		
		public function getStudent($username, $password) {
			$rowset	= $this->tableGateway->select(array('username' 	=> $username, 
														'password' 	=> $password, 
														'del_flg'	=> '0'));
			$row	= $rowset->current();
			return $row;
		}
		
		public function getById($id) {
			$rowset	= $this->tableGateway->select(array('student_id' => $id, 'del_flg' => '0'));
			$row	= $rowset->current();
			return $row;
		}
		
		public function getByName($name) {
			
		}
				
		public function getUsername($username) {
			$rowset	= $this->tableGateway->select(array('username'	=> $username, 
														'del_flg'	=> '0'));
			$row	= $rowset->current();
			return $row;
		}
		
		public function getTop($quantity = 10) {
			$select = $this->tableGateway->getSql()->select();
			$select->where(array('del_flg' => '0'));
			$select->order('average_mark DESC')->limit($quantity);
			$resultSet = $this->tableGateway->selectWith($select);
			return $resultSet;
		}
		
		public function saveStudent(Student $student){
			$data	= array(
				'student_id'	=> $student->student_id,
				'username'		=> $student->username,
				'password'		=> $student->getPassword(),
				'name'			=> $student->name,
				'birthday'		=> $student->birthday,
				'average_mark'	=> $student->average_mark,
				'del_flg'		=> $student->del_flg);
			
				$id	= (int)$student->student_id;
				if ($id == 0) {
					$time	= new CurrentTime();
					$data['created_at']	= $time->getCurrentTime();
					$this->tableGateway->insert($data);
				}
				else 
					$this->tableGateway->update($data, array('student_id' => $id));
		}
	}
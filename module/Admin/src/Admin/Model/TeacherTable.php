<?php
	namespace Admin\Model;
	
	use Zend\Db\TableGateway\TableGateway,
		Zend\Db\Sql\Select,
	 	Zend\Paginator\Adapter\DbSelect,
	 	Zend\Paginator\Paginator,
	 	Zend\Db\ResultSet\ResultSet,
	 	Exam\Config\CurrentTime;
	 	
	use Exam\Model\ObjectTable;
	
	class TeacherTable extends ObjectTable {
		
		public function fetchAll($paginated=false, $tableName=null) {
			if ($paginated) {
				$select = new Select($tableName);
				$select->where(array('del_flg'	=> '0'));
				$resultSetPrototype = new ResultSet();
				$resultSetPrototype->setArrayObjectPrototype(new Teacher());
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
		
		public function getByUserPass($username, $password) {
			$rowset	= $this->tableGateway->select(array('username'	=> $username, 
														'password'	=> $password,
														'del_flg'	=> '0'));
			$row	= $rowset->current();
			return $row;
		}
		
		public function getById($id) {
			$rowset	= $this->tableGateway->select(array('teacher_id' => $id, 'del_flg' => '0'));
			$row	= $rowset->current();
			return $row;
		}
		
		public function getByUsername($username) {
			$rowset	= $this->tableGateway->select(array('username' => $username, 'del_flg' => '0'));
			$row	= $rowset->current();
			return $row;
		}
		
		public function getByName($name) {
			
		}
		
		public function saveTeacher(Teacher $teacher){
			$data	= array(
				'teacher_id'	=> $teacher->teacher_id,
				'username'		=> $teacher->username,
				'password'		=> $teacher->getPassword(),
				'name'			=> $teacher->name,
				'birthday'		=> $teacher->birthday,
				'level'			=> $teacher->level,
				'del_flg'		=> $teacher->del_flg);
			
				$id	= (int)$teacher->teacher_id;
				if ($id == 0) {
					$time	= new CurrentTime();
					$data['created_at']	= $time->getCurrentTime();
					$this->tableGateway->insert($data);
				}
				else 
					$this->tableGateway->update($data, array('teacher_id' => $id));
		}

	}
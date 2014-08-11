<?php
	namespace Exam\Model;
	
	use Zend\Db\TableGateway\TableGateway,
		Zend\Db\Sql\Select,
	 	Zend\Paginator\Adapter\DbSelect,
	 	Zend\Paginator\Paginator,
	 	Zend\Db\ResultSet\ResultSet,
	 	Exam\Config\CurrentTime;
	
	class SubjectTable extends ObjectTable {

		public function fetchAll($paginated=false, $tableName=null) {
			if ($paginated) {
				$select = new Select($tableName);
				$select->where(array('del_flg'	=> '0'));
				$resultSetPrototype = new ResultSet();
				$resultSetPrototype->setArrayObjectPrototype(new Subject());
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
		
		public function getByName($name) {
			$rowset	= $this->tableGateway->select(array('subject_name' => $name, 'del_flg' => '0'));
			$row	= $rowset->current();
			return $row;
		}
		
		public function getById($id) {
			$rowset	= $this->tableGateway->select(array('subject_id' => $id, 'del_flg' => '0'));
			$row	= $rowset->current();
			return $row;
		}

		public function saveSubject(Subject $subject){
			$data	= array(
				'subject_id'	=> $subject->subject_id,
				'subject_name'	=> $subject->subject_name,
				'description'	=> $subject->description,
				'test_time'		=> $subject->test_time,
				'question_num'	=> $subject->question_num,
				'del_flg'		=> $subject->del_flg);
			
				$id	= (int)$subject->subject_id;
				$time	= new CurrentTime();
				if ($id == 0) {
					$data['created_at']	= $time->getCurrentTime();
					$this->tableGateway->insert($data);
				}
				else {
					$data['updated_at']	= $time->getCurrentTime();
					$this->tableGateway->update($data, array('subject_id' => $id));
				}
		}
	}
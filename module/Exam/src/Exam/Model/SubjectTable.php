<?php
	namespace Exam\Model;

	use Zend\Db\TableGateway\TableGateway,
		Zend\Db\Sql\Select,
	 	Zend\Paginator\Adapter\DbSelect,
	 	Zend\Paginator\Paginator,
	 	Zend\Db\ResultSet\ResultSet;

	class SubjectTable extends ObjectTable {

		/**
		 * get all subjects
		 * @param string $paginated if $paginated=true then use paginate
		 * @param string $tableName db table's name
		 */
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

		/**
		 * get subject by subject's name
		 * @param string $subject_name
		 */
		public function getByName($subject_name) {
			$rowset	= $this->tableGateway->select(array('subject_name' => $subject_name, 'del_flg' => '0'));
			$row	= $rowset->current();
			return $row;
		}

		/**
		 * get subject by subject's id
		 * @param int $id subject's id
		 */
		public function getById($id) {
			$rowset	= $this->tableGateway->select(array('subject_id' => $id, 'del_flg' => '0'));
			$row	= $rowset->current();
			return $row;
		}

		/**
		 * insert or update subject's info
		 * @param Subject $subject
		 */
		public function saveSubject(Subject $subject){
			$data	= array(
				'subject_id'	=> $subject->subject_id,
				'subject_name'	=> $subject->subject_name,
				'description'	=> $subject->description,
				'test_time'		=> $subject->test_time,
				'question_num'	=> $subject->question_num,
				'del_flg'		=> $subject->del_flg);

				$id	= (int)$subject->subject_id;
				if ($id == 0) {
					$data['created_at']	= date('Y-m-d H:i:s');
					$this->tableGateway->insert($data);
				}
				else {
					$data['updated_at']	= date('Y-m-d H:i:s');
					$this->tableGateway->update($data, array('subject_id' => $id));
				}
		}
	}
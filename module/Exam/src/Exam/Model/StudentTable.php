<?php
	namespace Exam\Model;

	use Zend\Db\TableGateway\TableGateway,
		Zend\Db\Sql\Select,
	 	Zend\Paginator\Adapter\DbSelect,
	 	Zend\Paginator\Paginator,
	 	Zend\Db\ResultSet\ResultSet;

	class StudentTable extends ObjectTable {

		/**
		 * get all students
		 * @param string $paginated if $paginated=true then use paginate
		 * @param string $tableName db table's name
		 */
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

		/**
		 * exist student account
		 * @param string $username
		 * @param string $password
		 */
		public function getStudent($username, $password) {
			$rowset	= $this->tableGateway->select(array('username' 	=> $username,
														'password' 	=> $password,
														'del_flg'	=> '0'));
			$row	= $rowset->current();
			return $row;
		}

		/**
		 * get student by student_id
		 * @param int $id student's id
		 */
		public function getById($id) {
			$rowset	= $this->tableGateway->select(array('student_id' => $id, 'del_flg' => '0'));
			$row	= $rowset->current();
			return $row;
		}

		/**
		 * get student by username
		 * @param string $username
		 */
		public function getByName($username) {

		}

		/**
		 * exist account's username
		 * @param string $username
		 */
		public function getUsername($username) {
			$rowset	= $this->tableGateway->select(array('username'	=> $username,
														'del_flg'	=> '0'));
			$row	= $rowset->current();
			return $row;
		}

		/**
		 * get top good students
		 * @param int $quantity number of top students
		 */
		public function getTop($quantity = 10) {
			$select = $this->tableGateway->getSql()->select();
			$select->where(array('del_flg' => '0'));
			$select->order('average_mark DESC')->limit($quantity);
			$resultSet = $this->tableGateway->selectWith($select);
			return $resultSet;
		}

		/**
		 * insert or update student's info
		 * @param Student $student
		 */
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
					$data['created_at']	= date('Y-m-d H:i:s');
					$this->tableGateway->insert($data);
				}
				else
					$this->tableGateway->update($data, array('student_id' => $id));
		}
	}
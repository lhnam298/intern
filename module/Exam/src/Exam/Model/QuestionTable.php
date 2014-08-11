<?php
	namespace Exam\Model;
	
	use Zend\Db\TableGateway\TableGateway,
		Zend\Db\Sql\Select,
	 	Zend\Paginator\Adapter\DbSelect,
	 	Zend\Paginator\Paginator,
	 	Zend\Db\ResultSet\ResultSet,
	 	Exam\Config\CurrentTime;
	 	
	class QuestionTable extends ObjectTable {
		
		public function fetchAll($paginated=false, $tableName=null) {
			if ($paginated) {
				$select = new Select($tableName);
				$select->where(array('del_flg'	=> '0'));
				$resultSetPrototype = new ResultSet();
				$resultSetPrototype->setArrayObjectPrototype(new Question());
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
			$id	= (int)$id;
			$rowset	= $this->tableGateway->select(array('question_id' => $id, 'del_flg' => '0'));
			$row	= $rowset->current();
			return $row;
		}
		
		public function getByName($name) {
			
		}
		
		public function getBySubject($subjectId) {
			$select = new Select('ex_question');
			$select->where(array(	'subject_id'	=> $subjectId,
									'del_flg' 			=> '0'));
			$resultSetPrototype = new ResultSet();
			$resultSetPrototype->setArrayObjectPrototype(new Question());
			$paginatorAdapter = new DbSelect(
				$select,
				$this->tableGateway->getAdapter(),
				$resultSetPrototype
			);
			$paginator = new Paginator($paginatorAdapter);
			return $paginator;	
		}
		
		public function getByType($typeQuestion) {
			$select = new Select('ex_question');
			$select->where(array(	'question_type_id'	=> $typeQuestion,
									'del_flg' 			=> '0'));
			$resultSetPrototype = new ResultSet();
			$resultSetPrototype->setArrayObjectPrototype(new Question());
			$paginatorAdapter = new DbSelect(
				$select,
				$this->tableGateway->getAdapter(),
				$resultSetPrototype
			);
			$paginator = new Paginator($paginatorAdapter);
			return $paginator;				
		}
		
		public function getByTypeSubject($type, $subject) {
			$type	= (int)$type;
			$subject	= (int)$subject;
			$resultSet = $this->tableGateway->select(array(	'question_type_id'	=> $type,
															'subject_id' 		=> $subject,
															'del_flg' 			=> '0'));
			return $resultSet;
		}
		
		public function saveQuestion(Question $question) {
			$data	= array(
				'subject_id'		=> $question->subject_id,
				'question_type_id'	=> $question->question_type_id,
				'question'			=> $question->question,
				'answer'			=> $question->answer,
				'del_flg'			=> $question->del_flg);
			
				$id	= (int)$question->question_id;
				$time	= new CurrentTime();
				if ($id == 0) {
					$data['created_at']	= $time->getCurrentTime();
					$this->tableGateway->insert($data);
					return $this->tableGateway->lastInsertValue;
				}
				else {
					if ($this->getById($id)) {
						$data['updated_at']	= $time->getCurrentTime();
						$this->tableGateway->update($data, array('question_id' => $id));
					}
					else 
					throw new \Exception("Form id does not exist");
				}
		}
	}
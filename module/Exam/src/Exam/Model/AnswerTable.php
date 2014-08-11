<?php
	namespace Exam\Model;
	
	use Zend\Db\TableGateway\TableGateway,
		Zend\Db\Sql\Select,
		Zend\Paginator\Adapter\DbSelect,
		Zend\Paginator\Paginator,
		Zend\Db\ResultSet\ResultSet,
		Exam\Config\CurrentTime;
	
	class AnswerTable extends ObjectTable {
		
		public function fetchAll($paginated=false, $tableName=null) {
			if ($paginated) {
				$select = new Select($tableName);
				$select->where(array('del_flg'	=> '0'));
				$resultSetPrototype = new ResultSet();
				$resultSetPrototype->setArrayObjectPrototype ( new Answer());
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
		
		public function getByQId($id) {
			$id	= (int)$id;
			$rowset	= $this->tableGateway->select(array('question_id' => $id, 'del_flg' => '0'));
			$row	= $rowset->current();
			return $row;
		}
		
		public function saveAnswer(Answer $answer) {
			$data	= array(
				'answer_id'			=> $answer->answer_id,
				'question_id'		=> $answer->question_id,
				'choice_1'			=> $answer->choice_1,
				'choice_2'			=> $answer->choice_2,
				'choice_3'			=> $answer->choice_3,
				'choice_4'			=> $answer->choice_4,
				'del_flg'			=> $answer->del_flg);
			
				$id	= (int)$answer->answer_id;
				$time	= new CurrentTime();
				if ($id == 0) {
					$data['created_at']	= $time->getCurrentTime();
					$this->tableGateway->insert($data);
				}
				else {
					$data['updated_at']	= $time->getCurrentTime();
					$this->tableGateway->update($data, array('answer_id' => $id));
				}
		}
	}
<?php
	namespace Exam\Model;

	use Zend\Db\TableGateway\TableGateway,
		Zend\Db\Sql\Select,
		Zend\Paginator\Adapter\DbSelect,
		Zend\Paginator\Paginator,
		Zend\Db\ResultSet\ResultSet,
		Exam\Config\CurrentTime;

	class ContactInfoTable extends ObjectTable {

		public function fetchAll($paginated=false, $tableName=null) {
			if ($paginated) {
				$select = new Select($tableName);
				$select->where(array('del_flg' => '0'));
				$select->order('visited ASC');
				$select->order('created_at DESC');
				$resultSetPrototype = new ResultSet();
				$resultSetPrototype->setArrayObjectPrototype ( new ContactInfo());
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

		public function newContact() {
			$resultSet = $this->tableGateway->select(array('del_flg' => '0', 'visited' => 0));
			return count($resultSet);
		}

		public function saveContact(ContactInfo $contact) {
			$time	= new CurrentTime();
			$data	= array(
				'contact_id'	=> $contact->contact_id,
				'name'			=> $contact->name,
				'email'			=> $contact->email,
				'phone'			=> $contact->phone,
				'title'			=> $contact->title,
				'content'		=> $contact->content,
				'del_flg'		=> $contact->del_flg,
				'visited'		=> $contact->visited,
				'created_at'	=> $contact->created_at,
			);

			$id	= (int)$contact->contact_id;
			if ($id == 0) {
				$data['created_at']	= $time->getCurrentTime();
				$this->tableGateway->insert($data);
			}
			else
				$this->tableGateway->update($data, array('contact_id' => $id));
		}

		public function getById($id) {
			$rowset	= $this->tableGateway->select(array('contact_id' => $id, 'del_flg' => '0'));
			$row	= $rowset->current();
			return $row;
		}

		public function getByName($name) {

		}
	}
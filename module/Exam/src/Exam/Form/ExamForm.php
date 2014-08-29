<?php
	namespace Exam\Form;

	use Zend\Form\Form;

	class ExamForm extends Form {

		public function __construct($name = null) {
			parent::__construct ( 'exam' );
		}

		public function initial() {
			$this->add ( array (
				'name' => 'subject',
				'type' => 'Select',
				'options' => array (
					'label' => 'Môn học',
					'disable_inarray_validator' => true,
				),
			));

			$this->add ( array (
				'name' => 'submit',
				'type' => 'Submit',
				'attributes' => array (
					'value' => 'Go',
					'id' => 'submitbutton',
				),
			));
		}
	}
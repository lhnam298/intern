<?php
	namespace Exam\Form;

	use Zend\Form\Form;

	class ExamContentForm extends Form {

		public function __construct() {
			parent::__construct ( 'examcontent' );
		}

		public function initial($type1, $type2, $type3) {
			for($i = 1; $i <= $type1; $i ++) {
				$name = "question" . $i;
				$label = "Câu" . " " . $i . ":";
				$this->add ( array (
					'name' => $name,
					'type' => 'Radio',
					'options' => array (
						'label' => $label,
						'value_options' => array (
							'1' => 'Đúng',
							'0' => 'Sai',
						),
					),
				));
			}

			for($i = $type1 + 1; $i <= $type1 + $type2; $i ++) {
				$name = "question" . $i;
				$label = "Câu" . " " . $i . ":";
				$this->add ( array (
					'name' => $name,
					'type' => 'MultiCheckbox',
					'options' => array (
						'label' => $label,
						'disable_inarray_validator' => true,
					),
				));
			}

			for($i = $type1 + $type2 + 1; $i <= $type1 + $type2 + $type3; $i ++) {
				$name = "question" . $i;
				$label = "Câu" . " " . $i . ":";
				$this->add ( array (
					'name' => $name,
					'type' => 'Radio',
					'options' => array (
						'label' => $label,
						'disable_inarray_validator' => true,
					),
				));
			}

			$this->add ( array (
				'type' => 'Zend\Form\Element\Csrf',
				'name' => 'csrf',
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
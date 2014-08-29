<?php

	namespace Admin\Form;

	use Zend\Form\Form;

	class EditQuestionForm extends Form {

		public function __construct($name = null) {
			parent::__construct ( 'edit' );
		}

		public function initial($name, $questionType, $question, $choice) {
			$this->setAttribute ( 'method', 'post' );

			$this->add ( array (
				'name' => 'content',
				'type' => 'Textarea',
				'attributes' => array (
					'class' => 'ckeditor',
					'value' => $question->question,
				),
				'options' => array (
					'label' => 'Câu hỏi',
				),
			));

			switch ($questionType) {
				case TRUE_FALSE_QUESTION :
					$this->add ( array (
						'name' => 'answer1',
						'type' => 'Radio',
						'options' => array (
							'label' => 'Đáp án',
							'value_options' => array (
								'1' => 'Đúng',
								'0' => 'Sai',
							),
							'label_attributes' => array (
								'class' => 'radio-inline',
							),
						),
						'attributes' => array (
							'value' => $question->answer,
						),
					));
					break;
				case CORRECT_QUESTION :
				case BEST_CORRECT_QUESTION :
					$this->add ( array (
						'name' => 'choice_1',
						'type' => 'Textarea',
						'attributes' => array (
							'class' => 'ckeditor',
							'value' => $choice->choice_1,
						),
						'options' => array (
							'label' => 'Lựa chọn thứ nhất',
						),
					));

					$this->add ( array (
						'name' => 'choice_2',
						'type' => 'Textarea',
						'attributes' => array (
							'class' => 'ckeditor',
							'value' => $choice->choice_2,
						),
						'options' => array (
							'label' => 'Lựa chọn thứ hai',
						),
					));

					$this->add ( array (
						'name' => 'choice_3',
						'type' => 'Textarea',
						'attributes' => array (
							'class' => 'ckeditor',
							'value' => $choice->choice_3,
						),
						'options' => array (
							'label' => 'Lựa chọn thứ ba',
						),
					));

					$this->add ( array (
						'name' => 'choice_4',
						'type' => 'Textarea',
						'attributes' => array (
							'class' => 'ckeditor',
							'value' => $choice->choice_4,
						),
						'options' => array (
							'label' => 'Lựa chọn thứ tư',
						),
					));

					if ($questionType == CORRECT_QUESTION) {
						$ans = explode ( "&", $question->answer );
						$this->add ( array (
							'name' => 'answer2',
							'type' => 'MultiCheckbox',
							'options' => array (
								'label' => 'Đáp án',
								'value_options' => array (
									'1' => '1',
									'2' => '2',
									'3' => '3',
									'4' => '4',
								),
								'label_attributes' => array (
									'class' => 'radio-inline',
								),
							),
							'attributes' => array (
								'value' => $ans,
							),
						));
					}
					else {
						$this->add ( array (
							'name' => 'answer3',
							'type' => 'Radio',
							'options' => array (
								'label' => 'Đáp án',
								'value_options' => array (
									'1' => '1',
									'2' => '2',
									'3' => '3',
									'4' => '4',
								),
								'label_attributes' => array (
									'class' => 'radio-inline',
								),
							),
							'attributes' => array (
								'value' => $question->answer,
							),
						));
					}
					break;
			}

			$this->add ( array (
				'type' => 'Zend\Form\Element\Csrf',
				'name' => 'csrf',
			));

			$this->add ( array (
				'name' => 'submit',
				'type' => 'Submit',
				'attributes' => array (
					'value' => $name,
					'id' => 'submitbutton',
					'class' => 'btn btn-success',
				),
			));
		}
	}
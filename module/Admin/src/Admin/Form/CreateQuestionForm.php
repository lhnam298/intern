<?php

	namespace Admin\Form;

	use Zend\Form\Form;

	class CreateQuestionForm extends Form {
		public function __construct($name = null) {
			parent::__construct ( 'question' );
		}

		public function initial($name, $arrType = null, $arrSubject = null) {
			$this->setAttribute ( 'method', 'post' );

			$this->add ( array (
					'name' => 'subject',
					'type' => 'Select',
					'options' => array (
							'label' => 'Môn học',
							'disable_inarray_validator' => true,
							'value_options' => $arrSubject,
					),
					'attributes' => array (
							'class' => 'form-control',
					),
			) );

			$this->add ( array (
					'name' => 'question_type',
					'type' => 'Select',
					'options' => array (
							'label' => 'Loại câu hỏi',
							'disable_inarray_validator' => true,
							'value_options' => $arrType,
					),
					'attributes' => array (
							'class' => 'form-control',
							'id' => 'typeId',
					),
			) );

			$this->add ( array (
					'name' => 'content',
					'type' => 'Textarea',
					'attributes' => array (
							'class' => 'ckeditor',
					),
					'options' => array (
							'label' => 'Câu hỏi',
					),
			) );

			$this->add ( array (
					'name' => 'choice_1',
					'type' => 'Textarea',
					'attributes' => array (
							'class' => 'ckeditor',
					),
					'options' => array (
							'label' => 'Lựa chọn thứ nhất',
					),
			) );

			$this->add ( array (
					'name' => 'choice_2',
					'type' => 'Textarea',
					'attributes' => array (
							'class' => 'ckeditor',
					),
					'options' => array (
							'label' => 'Lựa chọn thứ hai',
					),
			) );

			$this->add ( array (
					'name' => 'choice_3',
					'type' => 'Textarea',
					'attributes' => array (
							'class' => 'ckeditor',
					),
					'options' => array (
							'label' => 'Lựa chọn thứ ba',
					),
			) );

			$this->add ( array (
					'name' => 'choice_4',
					'type' => 'Textarea',
					'attributes' => array (
							'class' => 'ckeditor',
					),
					'options' => array (
							'label' => 'Lựa chọn thứ tư',
					),
			) );

			$this->add ( array (
					'name' => 'answer1',
					'type' => 'Radio',
					'options' => array (
// 							'label' => 'Đáp án',
							'value_options' => array (
									'1' => 'Đúng',
									'0' => 'Sai',
							),
							'label_attributes' => array (
									'class' => 'radio-inline',
							),
					),
					'attributes' => array (
							'value' => '1',
					),
			) );

			$this->add ( array (
					'name' => 'answer2',
					'type' => 'MultiCheckbox',
					'options' => array (
// 							'label' => 'Đáp án',
							'value_options' => array (
									'1' => '1',
									'2' => '2',
									'3' => '3',
									'4' => '4',
							),
							'label_attributes' => array (
									'class' => 'checkbox-inline',
							),
					),
					'attributes' => array (
							'value' => array (
									'1',
									'2',
									'3',
									'4',
							),
					),
			) );

			$this->add ( array (
					'name' => 'answer3',
					'type' => 'Radio',
					'options' => array (
// 							'label' => 'Đáp án',
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
							'value' => '1',
					),
			) );

			$this->add ( array (
					'type' => 'Zend\Form\Element\Csrf',
					'name' => 'csrf',
			) );

			$this->add ( array (
					'name' => 'submit',
					'type' => 'Submit',
					'attributes' => array (
							'value' => $name,
							'id' => 'submitbutton',
							'class' => 'btn btn-success',
					),
			) );
		}
	}
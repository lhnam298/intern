<?php
	
	namespace Admin\Form;
	
	use Zend\Form\Form;
	
	class CreateSubjectForm extends Form {
		public function __construct($name = null) {
			parent::__construct ( 'subject' );
		}
		
		public function initial($name, $subject = null) {
			$this->setAttribute ( 'method', 'post' );
			
			for($i = 10; $i <= 90; $i ++)
				$arrTime [$i] = $i;
			
			for($i = 10; $i <= 50; $i ++)
				$arrNum [$i] = $i;
			
			if ($subject == null) {
				$this->add ( array (
						'name' => 'name',
						'type' => 'Text',
						'options' => array (
								'label' => 'Tên môn học' 
						),
						'attributes' => array (
								'class' => 'form-control',
								'placeholder' => 'Nhập tên môn học' 
						) 
				) );
				
				$this->add ( array (
						'name' => 'description',
						'type' => 'Textarea',
						'options' => array (
								'label' => 'Mô tả' 
						),
						'attributes' => array (
								'class' => 'ckeditor' 
						) 
				) );
				
				$this->add ( array (
						'name' => 'num',
						'type' => 'Select',
						'options' => array (
								'label' => 'Số lượng câu hỏi',
								'disable_inarray_validator' => true,
								'value_options' => $arrNum 
						),
						'attributes' => array (
								'value' => '50',
								'class' => 'form-control' 
						) 
				) );
				
				$this->add ( array (
						'name' => 'time',
						'type' => 'Select',
						'options' => array (
								'label' => 'Thời gian',
								'disable_inarray_validator' => true,
								'value_options' => $arrTime 
						),
						'attributes' => array (
								'value' => '20',
								'class' => 'form-control' 
						) 
				) );
			} 
			else {
				$this->add ( array (
						'name' => 'name',
						'type' => 'Text',
						'options' => array (
								'label' => 'Tên môn học' 
						),
						'attributes' => array (
								'class' => 'form-control',
								'value' => $subject->subject_name 
						) 
				) );
				
				$this->add ( array (
						'name' => 'description',
						'type' => 'Textarea',
						'options' => array (
								'label' => 'Mô tả' 
						),
						'attributes' => array (
								'class' => 'ckeditor',
								'value' => $subject->description 
						) 
				) );
				
				$this->add ( array (
						'name' => 'num',
						'type' => 'Select',
						'options' => array (
								'label' => 'Số lượng câu hỏi',
								'disable_inarray_validator' => true,
								'value_options' => $arrNum 
						),
						'attributes' => array (
								'value' => $subject->question_num,
								'class' => 'form-control' 
						) 
				) );
				
				$this->add ( array (
						'name' => 'time',
						'type' => 'Select',
						'options' => array (
								'label' => 'Thời gian',
								'disable_inarray_validator' => true,
								'value_options' => $arrTime 
						),
						'attributes' => array (
								'value' => $subject->test_time,
								'class' => 'form-control' 
						) 
				) );
			}
			
			$this->add ( array (
					'type' => 'Zend\Form\Element\Csrf',
					'name' => 'csrf' 
			) );
			
			$this->add ( array (
					'name' => 'submit',
					'type' => 'Submit',
					'attributes' => array (
							'value' => $name,
							'id' => 'submitbutton',
							'class' => 'btn btn-success' 
					) 
			) );
		}
	}
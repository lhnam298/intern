<?php
	namespace Exam\Form;

	use Zend\Form\Form;

	class ContactForm extends Form {
		public function __construct($name = null) {

			parent::__construct ( 'contact' );
		}

		public function initial() {
			$this->setAttribute ( 'method', 'post' );

			$this->add ( array (
					'name' => 'name',
					'type' => 'Text',
					'options' => array (
							'label' => 'Họ tên',
					),
					'attributes' => array (
							'class' => 'form-control',
							'placeholder' => 'Họ tên',
					)
			) );

			$this->add ( array (
					'name' => 'email',
					'type' => 'Text',
					'options' => array (
							'label' => 'Email',
					),
					'attributes' => array (
							'class' => 'form-control',
							'placeholder' => 'Email',
					)
			) );

			$this->add ( array (
					'name' => 'phone',
					'type' => 'Text',
					'options' => array (
							'label' => 'Số điện thoại',
					),
					'attributes' => array (
							'class' => 'form-control',
							'placeholder' => 'Số điện thoại',
					)
			) );

			$this->add ( array (
					'name' => 'title',
					'type' => 'Text',
					'options' => array (
							'label' => 'Tiêu đề',
					),
					'attributes' => array (
							'class' => 'form-control',
							'placeholder' => 'Tiêu đề',
					)
			) );

			$this->add ( array (
					'name' => 'content',
					'type' => 'Textarea',
					'options' => array (
							'label' => 'Góp ý',
					),
					'attributes' => array (
							'class' => 'ckeditor',
					)
			) );

			$this->add ( array (
					'name' => 'submit',
					'type' => 'Submit',
					'attributes' => array (
							'value' => 'Gửi',
							'id' => 'submitbutton',
					)
			) );
		}
	}
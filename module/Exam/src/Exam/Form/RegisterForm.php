<?php
	namespace Exam\Form;

	use Zend\Form\Form;

	class RegisterForm extends Form {

		public function __construct($name = null) {
			parent::__construct ( 'register' );
		}

		public function initial() {
			$this->setAttribute ( 'method', 'post' );

			$this->add ( array (
				'name' => 'username',
				'type' => 'Text',
				'options' => array (
					'label' => 'Tên đăng nhập',
				),
				'attributes' => array (
					'class' => 'form-control',
					'placeholder' => 'Tên đăng nhập',
				),
			));

			$this->add ( array (
				'name' => 'password',
				'type' => 'Password',
				'options' => array (
					'label' => 'Mật khẩu',
				),
				'attributes' => array (
					'class' => 'form-control',
					'placeholder' => 'Mật khẩu',
				),
			));

			$this->add ( array (
				'name' => 're_password',
				'type' => 'Password',
				'options' => array (
					'label' => 'Nhập lại mật khẩu',
				),
				'attributes' => array (
					'class' => 'form-control',
					'placeholder' => 'Nhập lại mật khẩu',
				),
			));

			$this->add ( array (
				'name' => 'yourname',
				'type' => 'Text',
				'options' => array (
					'label' => 'Họ tên',
				),
				'attributes' => array (
					'class' => 'form-control',
					'placeholder' => 'Họ tên',
				),
			));

			$this->add ( array (
				'name' => 'birthday',
				'type' => 'Text',
				'options' => array (
					'label' => 'Ngày sinh',
				),
				'attributes' => array (
					'id' => 'datepicker',
					'class' => 'form-control',
					'placeholder' => 'Ngày, tháng, năm sinh',
				),
			));

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
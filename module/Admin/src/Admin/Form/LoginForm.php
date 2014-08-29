<?php

	namespace Admin\Form;

	use Zend\Form\Form;

	class LoginForm extends Form {
		public function __construct($name = null) {
			parent::__construct ( 'login' );
		}

		public function initial() {
			$this->setAttribute ( 'method', 'post' );

			$this->add ( array (
				'name' => 'username',
				'type' => 'Text',
				'attributes' => array (
					'class' => 'form-control',
					'placeholder' => 'Tên đăng nhập',
				),
			));

			$this->add ( array (
				'name' => 'password',
				'type' => 'Password',
				'attributes' => array (
					'class' => 'form-control',
					'placeholder' => 'Mật khẩu',
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
					'value' => 'Đăng nhập',
					'class' => 'btn btn-lg btn-primary btn-block',
					'id' => 'submitbutton',
				),
			));
		}
	}
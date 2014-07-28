<?php
	namespace Exam\Form;
	
	use Zend\Form\Form;
	
	class RegisterForm extends Form {
		public function __construct($name = null) {
			parent::__construct('register');
        	$this->setAttribute('method', 'post');
        	
        	$this->add(array(          
        					'name' => 'username',
            				'type' => 'Text',
            				'options' => array(
                					'label' => 'Tên đăng nhập',
        					),
        	));
        	
        	$this->add(array(          
        					'name' => 'password',
            				'type' => 'Password',
            				'options' => array(
                					'label' => 'Mật khẩu',
        					)
        	));
        	
        	$this->add(array(          
        					'name' => 're_password',
            				'type' => 'Password',
            				'options' => array(
                					'label' => 'Nhập lại mật khẩu',
        					)
        	));
        	
        	$this->add(array(          
        					'name' => 'yourname',
            				'type' => 'Text',
            				'options' => array(
                					'label' => 'Họ tên',
        					)
        	));
        	
        	$this->add(array(          
        					'name' => 'birthday',
            				'type' => 'Date',
            				'options' => array(
                					'label' => 'Ngày sinh',
        					)
        	));
        	
        	$this->add(array(
				            'name' => 'submit',
				            'type' => 'Submit',
				            'attributes' => array(
				                'value' => 'Go',
				                'id' => 'submitbutton',
            				)
        	));
		}
	}
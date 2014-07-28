<?php
	namespace Admin\Form;

	use Zend\Form\Form,
		Exam\Form\RegisterForm;

	class NewTeacherForm extends RegisterForm {
		
	    public function __construct($name = null) {
	       parent::__construct('teacher');
	    }
	}
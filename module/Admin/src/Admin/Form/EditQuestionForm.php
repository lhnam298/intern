<?php
	namespace Admin\Form;

	use Zend\Form\Form;

	class EditQuestionForm extends Form {
		
    	public function __construct($name = null) {
       
	        parent::__construct('edit');
	        
	        $this->add(array(          
	        	'name' => 'subject',
	            'type' => 'Select',
				'options' => array(
					'label' => 'Môn học',
	        		'disable_inarray_validator' => true,
				)
	        ));
	        
			$this->add(array(          
	        	'name' => 'question_type',
	            'type' => 'Select',
				'options' => array(
					'label' => 'Loại câu hỏi',
					'disable_inarray_validator' => true,
				),
	        ));
	        
			$this->add(array(
            	'name' => 'submit',
            	'type' => 'Submit',
            	'attributes' => array(
                	'value' => 'Go',
                	'id' => 'submitbutton',
            	),
        	));
	    }
	}
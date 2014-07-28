<?php
	namespace Admin\Form;

	use Zend\Form\Form;

	class CreateSubjectForm extends Form {
		
    public function __construct($name = null) {
       
        parent::__construct('subject');
        $this->setAttribute('method', 'post');
        
        $this->add(array(          
        	'name' => 'name',
            'type' => 'Text',
			'options' => array(
				'label' => 'Tên môn học',
			)
        ));
        
        $this->add(array(
			'name' => 'description',
        	'type' 		=> 'Textarea',
			'attributes' => array(
                'rows' => '2',
			),												
			'options' => array(
				'label' => 'Mô tả',
			),
		));
		
		$this->add(array(          
        	'name' => 'num',
            'type' => 'Select',
			'options' => array(
				'label' => 'Số lượng câu hỏi',
				'disable_inarray_validator' => true,
			),
			'attributes' => array(
				'value' => '50',
			),
        ));
        
        $this->add(array(          
        	'name' => 'time',
            'type' => 'Select',
			'options' => array(
				'label' => 'Thời gian',
				'disable_inarray_validator' => true,
			),
			'attributes' => array(
				'value' => '20',
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
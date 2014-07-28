<?php
	namespace Admin\Form\Validate;
	
	use Zend\InputFilter\InputFilter;
	use Zend\InputFilter\Factory as InputFactory;
	use Zend\InputFilter\InputFilterAwareInterface;
	use Zend\InputFilter\InputFilterInterface;
	
	class CreateQuestion implements InputFilterAwareInterface {
		protected $inputFilter;
		
		public function setInputFilter(InputFilterInterface $inputFilter) {
			throw new \Exception("Not used");
		}
		
		public function getInputFilter() {
			if (!$this->inputFilter) {
				$inputFilter = new InputFilter();
		
				$factory = new InputFactory();
		
				$inputFilter->add($factory->createInput(array(
						'name'     => 'content',
						'filters'  => array(
							array('name' => 'StripTags'),
	                        array('name' => 'StringTrim'),
	                   	),
	                   	'validators' => array(
	                   		array(
	                   				'name' => 'NotEmpty',
	                   				'required' => true,
	                   				'options'	=> array(
			                         	'message'	=> 'Bạn phải điền vào mục này!',
			                         	'break_chain_on_failure' => true,
	                         		),
	                   		),
	                   	),
				)));
				
				$this->inputFilter = $inputFilter;
			}
		
			return $this->inputFilter; 
		}
	}
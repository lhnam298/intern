<?php
	namespace Admin\Form\Validate;
	
	use Zend\InputFilter\InputFilter,
		Zend\InputFilter\Factory as InputFactory,
		Zend\InputFilter\InputFilterAwareInterface,
		Zend\InputFilter\InputFilterInterface;

	class CreateSubject implements InputFilterAwareInterface {
		protected $inputFilter;
		
		public function setInputFilter(InputFilterInterface $inputFilter) {
			throw new \Exception ( "Not used" );
		}
		
		public function getInputFilter() {
			if (! $this->inputFilter) {
				$inputFilter = new InputFilter ();
				
				$factory = new InputFactory ();
				
				$inputFilter->add ( $factory->createInput ( array (
						'name' => 'name',
						'filters' => array (
								array (
										'name' => 'StripTags' 
								),
								array (
										'name' => 'StringTrim' 
								) 
						),
						'validators' => array (
								array (
										'name' => 'NotEmpty',
										'required' => true,
										'options' => array (
												'message' => 'Bạn phải điền tên môn học!',
												'break_chain_on_failure' => true 
										) 
								) 
						) 
				) ) );
				
				$inputFilter->add ( $factory->createInput ( array (
						'name' => 'description',
						'filters' => array (
								array (
										'name' => 'StripTags' 
								),
								array (
										'name' => 'StringTrim' 
								) 
						),
						'validators' => array (
								array (
										'name' => 'NotEmpty',
										'required' => true,
										'options' => array (
												'message' => 'Bạn phải điền thông tin môn học!',
												'break_chain_on_failure' => true 
										) 
								) 
						) 
				) ) );
				
				$this->inputFilter = $inputFilter;
			}
			
			return $this->inputFilter;
		}
	}
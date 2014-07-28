<?php
	namespace Exam\Form\Validate;
	
	use Zend\InputFilter\InputFilter,
		Zend\InputFilter\Factory as InputFactory,
		Zend\InputFilter\InputFilterAwareInterface,
		Zend\InputFilter\InputFilterInterface;
	
	class ExamContent implements InputFilterAwareInterface {
		protected $inputFilter;
		protected $type1, $type2, $type3;
		
		public function __construct($type1, $type2, $type3) {
			$this->type1	= $type1;
			$this->type2	= $type2;
			$this->type3	= $type3;
		}
		
		public function setInputFilter(InputFilterInterface $inputFilter) {
			throw new \Exception("Not used");
		}
		
		public function getInputFilter() {
			if (!$this->inputFilter) {
				$inputFilter = new InputFilter();
		
				$factory = new InputFactory();
				for ($i=1; $i<=$this->type1+$this->type2+$this->type3; $i++) {
					$name	= "question".$i;
					$inputFilter->add($factory->createInput(array(
							'name'     => $name,
							'required' => false,
					)));
				}
				$this->inputFilter = $inputFilter;
			}
		
			return $this->inputFilter; 
		}
	}
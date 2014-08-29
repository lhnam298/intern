<?php
	namespace Admin\Form\Validate;

	use Zend\InputFilter\InputFilter,
		Zend\InputFilter\Factory as InputFactory,
		Zend\InputFilter\InputFilterAwareInterface,
		Zend\InputFilter\InputFilterInterface;

	class CreateQuestion implements InputFilterAwareInterface {

		protected $inputFilter;

		public function setInputFilter(InputFilterInterface $inputFilter) {
			throw new \Exception ( "Not used" );
		}

		public function getInputFilter() {
			if (! $this->inputFilter) {
				$inputFilter = new InputFilter ();

				$factory = new InputFactory ();

				$inputFilter->add ( $factory->createInput ( array (
					'name' => 'content',
					'validators' => array (
						array (
							'name' => 'NotEmpty',
							'required' => true,
							'options' => array (
							'message' => 'Bạn phải điền câu hỏi!',
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
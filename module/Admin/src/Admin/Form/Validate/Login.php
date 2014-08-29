<?php
	namespace Admin\Form\Validate;

	use Zend\InputFilter\InputFilter,
		Zend\InputFilter\Factory as InputFactory,
		Zend\InputFilter\InputFilterAwareInterface,
		Zend\InputFilter\InputFilterInterface;

	class Login implements InputFilterAwareInterface {
		protected $inputFilter;

		public function setInputFilter(InputFilterInterface $inputFilter) {
			throw new \Exception ( "Not used" );
		}

		public function getInputFilter() {
			if (! $this->inputFilter) {
				$inputFilter = new InputFilter ();
				$factory = new InputFactory ();

				$inputFilter->add ( $factory->createInput ( array (
					'name' => 'username',
					'filters' => array (
						array ('name' => 'StripTags'),
						array ('name' => 'StringTrim'),
					),
					'validators' => array (
						array (
							'name' => 'NotEmpty',
							'required' => true,
							'options' => array (
								'message' => 'Bạn phải điền tên đăng nhập!',
							),
						),
					),
				)));

				$inputFilter->add ( $factory->createInput ( array (
					'name' => 'password',
					'filters' => array (
						array ('name' => 'StripTags'),
						array ('name' => 'StringTrim'),
					),
					'validators' => array (
						array (
							'name' => 'NotEmpty',
							'required' => true,
							'options' => array (
								'message' => 'Bạn phải điền mật khẩu!',
							),
						),
					),
				)));

				$this->inputFilter = $inputFilter;
			}

			return $this->inputFilter;
		}
	}
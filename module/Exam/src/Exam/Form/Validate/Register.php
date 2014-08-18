<?php
	namespace Exam\Form\Validate;

	use Zend\InputFilter\InputFilter,
		Zend\InputFilter\Factory as InputFactory,
		Zend\InputFilter\InputFilterAwareInterface,
		Zend\InputFilter\InputFilterInterface;

	class Register implements InputFilterAwareInterface {
		protected $inputFilter;

		public function setInputFilter(InputFilterInterface $inputFilter) {
			throw new \Exception("Not used");
		}

		public function getInputFilter() {
			if (!$this->inputFilter) {
				$inputFilter = new InputFilter();

				$factory = new InputFactory();

				$inputFilter->add($factory->createInput(array(
						'name' => 'username',
						'filters' => array(
							array('name' => 'StripTags'),
							array('name' => 'StringTrim'),
						),
						'validators' => array(
							array(
								'name' => 'NotEmpty',
								'required' => true,
								'options' => array(
									'message'	=> 'Bạn phải điền tên đăng nhập!',
									'break_chain_on_failure' => true,
								),
							),
							array(
								'name' => 'StringLength',
									'options' => array(
										'encoding' => 'UTF-8',
										'min' => 6,
										'message' => 'Tên đăng nhập tối thiểu 6 ký tự',
										'break_chain_on_failure' => true,
									),
							),
							array(
								'name' => 'StringLength',
								'options' => array(
									'encoding' => 'UTF-8',
									'max' => 32,
									'message' => 'Tên đăng nhập tối đa 32 ký tự',
									'break_chain_on_failure' => true,
								),
							),
							array(
								'name' => 'Regex',
								'options' => array(
									'pattern'	=> ('/^[a-zA-Z0-9\_.]*$/'),
									'message'	=> 'Tên đăng nhập chứa ký tự không hợp lệ',
									'break_chain_on_failure' => true,
								),
							),
						),
				)));

				$inputFilter->add($factory->createInput(array(
						'name' => 'password',
						'filters' => array(
							array('name' => 'StripTags'),
							array('name' => 'StringTrim'),
						),
						'validators' => array(
							array(
								'name' => 'NotEmpty',
								'required' => true,
									'options'	=> array(
									'message'	=> 'Bạn phải nhập mật khẩu!',
									'break_chain_on_failure' => true,
								),
							),
							array(
								'name' => 'StringLength',
								'options' => array(
									'encoding' => 'UTF-8',
									'min' => 8,
									'message'	=> 'Mật khẩu tối thiểu 8 ký tự',
									'break_chain_on_failure' => true,
								),
							),
							array(
								'name' => 'StringLength',
								'options' => array(
									'encoding' => 'UTF-8',
									'max' => 32,
									'message'	=> 'Mật khẩu tối đa 32 ký tự',
									'break_chain_on_failure' => true,
								),
							),
							array(
								'name' => 'Regex',
								'options'	=> array(
									'pattern'	=> ('/^[a-zA-Z0-9]*$/'),
									'message'	=> 'Mật khẩu chứa kí tự không hợp lệ!',
									'break_chain_on_failure' => true,
								),
							),
						),
				)));

				$inputFilter->add($factory->createInput(array(
						'name' => 're_password',
						'filters' => array(
							array('name' => 'StripTags'),
							array('name' => 'StringTrim'),
						),
						'validators' => array(
							array(
								'name' => 'NotEmpty',
								'required' => true,
								'options'	=> array(
									'message'	=> 'Bạn phải nhập lại mật khẩu!',
									'break_chain_on_failure' => true,
								),
							),
							array(
								'name' => 'Identical',
								'options' => array(
									'token' => 'password',
									'message' => 'Mật khẩu không khớp!',
								),
							),
						),
				)));

				$inputFilter->add($factory->createInput(array(
						'name' => 'yourname',
						'filters' => array(
							array('name' => 'StripTags'),
							array('name' => 'StringTrim'),
						),
						'validators' => array(
							array(
								'name' => 'NotEmpty',
								'required' => true,
								'options'	=> array(
									'message'	=> 'Bạn phải điền họ tên!',
									'break_chain_on_failure' => true
								),
							),
							array(
								'name' => 'StringLength',
								'options' => array(
									'encoding' => 'UTF-8',
									'min' => 6,
									'message' => 'Họ tên tối thiểu 6 ký tự',
									'break_chain_on_failure' => true,
								),
							),
							array(
								'name' => 'StringLength',
								'options' => array(
									'encoding' => 'UTF-8',
									'max' => 32,
									'message'	=> 'Họ tên tối đa 32 ký tự',
									'break_chain_on_failure' => true,
								),
							),
						),
				)));

				$inputFilter->add($factory->createInput(array(
						'name' => 'birthday',
						'required' => false,
				)));

				$this->inputFilter = $inputFilter;
			}

			return $this->inputFilter;
		}
	}
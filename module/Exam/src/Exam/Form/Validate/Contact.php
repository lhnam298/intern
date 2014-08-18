<?php
	namespace Exam\Form\Validate;

	use Zend\InputFilter\InputFilter,
		Zend\InputFilter\Factory as InputFactory,
		Zend\InputFilter\InputFilterAwareInterface,
		Zend\InputFilter\InputFilterInterface;

	class Contact implements InputFilterAwareInterface {
		protected $inputFilter;

		public function setInputFilter(InputFilterInterface $inputFilter) {
			throw new \Exception("Not used");
		}

		public function getInputFilter() {
			if (!$this->inputFilter) {
				$inputFilter = new InputFilter();

				$factory = new InputFactory();

				$inputFilter->add($factory->createInput(array(
						'name' => 'name',
						'filters' => array(
							array('name' => 'StripTags'),
							array('name' => 'StringTrim'),
						),
						'validators' => array(
							array(
								'name' => 'NotEmpty',
								'required' => true,
								'options'	=> array(
									'message'	=> 'Bạn phải điền họ tên !',
								),
							),
						),
				)));

				$inputFilter->add($factory->createInput(array(
						'name' => 'email',
						'filters' => array(
							array('name' => 'StripTags'),
							array('name' => 'StringTrim'),
						),
						'validators' => array(
							array(
								'name' => 'NotEmpty',
								'required' => true,
								'options'	=> array(
									'message'	=> 'Bạn phải điền email !',
									'break_chain_on_failure' => true,
								),
							),
							array(
								'name' => 'EmailAddress',
								'options' => array(
									'encoding' => 'UTF-8',
									'message' => 'Địa chỉ email không hợp lệ !',
									'break_chain_on_failure' => true,
								),
							),
						),
				)));

				$inputFilter->add($factory->createInput(array(
						'name' => 'phone',
						'required' => false,
						'filters' => array(
							array('name' => 'StripTags'),
							array('name' => 'StringTrim'),
						),
						'validators' => array(
							array(
								'name' => 'Digits',
								'options'	=> array(
									'message'	=> 'Số điện thoại không hợp lệ !',
								),
							),
						),
				)));

				$inputFilter->add($factory->createInput(array(
						'name' => 'title',
						'filters' => array(
							array('name' => 'StripTags'),
							array('name' => 'StringTrim'),
						),
						'validators' => array(
							array(
								'name' => 'NotEmpty',
								'required' => true,
								'options'	=> array(
									'message'	=> 'Bạn phải điền tiêu đề !',
									'break_chain_on_failure' => true,
								),
							),
						),
				)));

				$inputFilter->add($factory->createInput(array(
						'name' => 'content',
						'validators' => array(
							array(
								'name' => 'NotEmpty',
								'required' => true,
								'options'	=> array(
									'message'	=> 'Bạn phải viết ý kiến của bạn!',
									'break_chain_on_failure' => true,
								),
							),
							array(
								'name' => 'StringLength',
								'options' => array(
									'encoding' => 'UTF-8',
									'min' => 20,
									'message' => 'Ý kiến tối thiểu 20 ký tự!',
									'break_chain_on_failure' => true,
								),
							),
							array(
								'name' => 'StringLength',
								'options' => array(
									'encoding' => 'UTF-8',
									'max' => 1000,
									'message' => 'Ý kiến tối đa 1000 ký tự!',
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
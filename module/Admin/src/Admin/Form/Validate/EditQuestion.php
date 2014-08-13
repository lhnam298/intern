<?php
	namespace Admin\Form\Validate;

	use Zend\InputFilter\InputFilter,
		Zend\InputFilter\Factory as InputFactory,
		Zend\InputFilter\InputFilterAwareInterface,
		Zend\InputFilter\InputFilterInterface,
		Exam\Config\Config;

	class EditQuestion implements InputFilterAwareInterface {
		protected $inputFilter;
		protected $questionType;

		public function __construct($_questionType) {
			$this->questionType = $_questionType;
		}

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
				) ) );

				if ($this->questionType != Config::TRUE_FALSE_QUESTION) {
					$inputFilter->add ( $factory->createInput ( array (
							'name' => 'choice_1',
							'validators' => array (
									array (
											'name' => 'NotEmpty',
											'required' => true,
											'options' => array (
													'message' => 'Bạn phải điền phương án lựa chọn!',
													'break_chain_on_failure' => true,
											),
									),
							),
					) ) );

					$inputFilter->add ( $factory->createInput ( array (
						'name' => 'choice_2',
						'validators' => array (
								array (
										'name' => 'NotEmpty',
										'required' => true,
										'options' => array (
												'message' => 'Bạn phải điền phương án lựa chọn!',
												'break_chain_on_failure' => true,
										),
								),
						),
					) ) );

					$inputFilter->add ( $factory->createInput ( array (
						'name' => 'choice_3',
						'validators' => array (
								array (
										'name' => 'NotEmpty',
										'required' => true,
										'options' => array (
												'message' => 'Bạn phải điền phương án lựa chọn!',
												'break_chain_on_failure' => true,
										),
								),
						),
					) ) );
					$inputFilter->add ( $factory->createInput ( array (
							'name' => 'choice_4',
							'validators' => array (
									array (
											'name' => 'NotEmpty',
											'required' => true,
											'options' => array (
													'message' => 'Bạn phải điền phương án lựa chọn!',
													'break_chain_on_failure' => true,
											),
									),
							),
					) ) );
				}

				$this->inputFilter = $inputFilter;
			}

			return $this->inputFilter;
		}
	}
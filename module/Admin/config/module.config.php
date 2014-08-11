<?php
	return array(
		'controllers' => array(
			'invokables' => array(
				'Admin\Controller\Admin' => 'Admin\Controller\AdminController',
			),
		),
		// The following section is new and should be added to your file
		'router' => array(
			'routes' => array(
				'admin' => array(
					'type'		=> 'segment',
					'options'	=> array(
						'route'			=> '/admin[/:action][/:id]',
						'constraints'	=> array(
							'action'	=> '[a-zA-Z][a-zA-Z0-9_-]*',
							'id'		=> '[0-9]+',
						),
						'defaults' => array(
							'controller'	=> 'Admin\Controller\Admin',
							'action'		=> 'index',
						),
					),
				),
				'paginator' => array(
					'type' => 'segment',
					'options' => array(
						'route' => '/list/[page/:page]',
						'defaults' => array(
							'page' => 1,
						),
					),
				),
			),
		), 
	); 
<?php
	return array(
	    'controllers' => array(
	        'invokables' => array(
	            'Exam\Controller\Index' => 'Exam\Controller\IndexController',
				'Exam\Controller\Student' => 'Exam\Controller\StudentController',
	        ),
	    ),
	    // The following section is new and should be added to your file
	    'router' => array(
	        'routes' => array(
	            'index' => array(
	                'type'    => 'segment',
	                'options' => array(
	                    'route'    => '/index[/:action][/:id]',
	                    'constraints' => array(
	                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
	                        'id'     => '[0-9]+',
	                    ),
	                    'defaults' => array(
	                        'controller' => 'Exam\Controller\Index',
	                        'action'     => 'index',
	                    ),
	                ),
	            ),
	            'student' => array(
	                'type'    => 'segment',
	                'options' => array(
	                    'route'    => '/student[/:action][/:id]',
	                    'constraints' => array(
	                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
	                        'id'     => '[0-9]+',
	                    ),
	                    'defaults' => array(
	                        'controller' => 'Exam\Controller\Student',
	                        'action'     => 'index',
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
	    'view_manager' => array(
	    	'template_map' => array(
	           	'layout/layout'        	=> __DIR__ . '/../view/layout/layout.phtml',
	    		'admin/layout'        	=> __DIR__ . '/../../Admin/view/layout/layout.phtml',
	    		'admin/layout_login'	=> __DIR__ . '/../../Admin/view/layout/layout_login.phtml',
	        ),
	        'template_path_stack' => array(
	            'home' => __DIR__ . '/../view',
	        	'admin' => __DIR__ . '/../../Admin/view',
	        ),
	    ),
	    'module_layouts' => array(
            'Exam' => 'layout/layout',
            'Admin' => 'admin/layout',
	    	'Admin' => 'admin/layout_login',
	    ),
	); 
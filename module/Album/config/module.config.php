<?php
	return array(
	
	
		'router'=>array(
			'routes'=>array(
				'home' => array(
					'type' => 'Zend\Mvc\Router\Http\Literal',
					'options' => array(
						'route'    => '/',
						'defaults' => array(
							'controller'	=> 'Album\Controller\Album',
							'action'     => 'index',
						),
					),
				),
				'album'=>array(
					'type'=>'segment',
					'options'=>array(
						'route'=>	'/album[/:action][/:id]',
						'constraints'=>	array(
							'action'	=>	'[a-zA-Z0-9_-]*',
							'id'		=> '[0-9]+'
						),
						'defaults'=>array(
							'controller'	=> 'Album\Controller\Album',
							'action'	=>'index'
						)
						
					)
				)
			)
		),
		'controllers'=> array(
			'invokables'=>array(
				'Album\Controller\Album' => 'Album\Controller\AlbumController'
			)
		),
		'view_manager'=>array(
			'template_path_stack'=>array(
				'album'=> __DIR__.'/../view/'
			)
		)
		
	);
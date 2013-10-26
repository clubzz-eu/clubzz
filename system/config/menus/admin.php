<?php

$menu = array(
	array(
		'name' => 'Admin Panel',
		'url' => 'admin',
	),
	array(
		'name' => 'Users',
		'url' => 'admin/users',
	),
	array(
		'name' => 'Developer',
		'url' => 'admin/developer',
		'submenu' => array(
			array(
				'name' => 'FormBuilder',
				'url' => 'admin/developer/formbuilder',
			),
			array(
				'name' => 'ViewBuilder',
				'url' => 'admin/developer/viewbuilder',
			),
			array(
				'name' => 'MenuBuilder',
				'url' => 'admin/developer/menubuilder',
			),
			
		),
	),
	array(
		'name' => 'Toegangsrechten',
		'url' => 'admin/permissions',
	),
	array(
		'name' => 'Help',
		'url' => 'doc',
	),
	array(
		'name' => 'Terug naar de website',
		'url' => 'home',
	),
);

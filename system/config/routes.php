<?php

// routes.php

$routes = array(
	array(
		'url' => '/',
		'controller' => 'home',
	),
	array(
		'url' => 'home',
		'controller' => 'home',
	),
	array(
		'url' => 'contact',
		'controller' => 'contact',
	),
	array(
		'url' => 'about',
		'controller' => 'about',
	),
	array(
		'url' => 'clubs',
		'controller' => 'clubs',
	),
	array(
		'url' => 'events',
		'controller' => 'events',
	),
	array(
		'url' => 'registreer',
		'controller' => 'register',
	),
	array(
		'url' => 'registreer/activate/:id/:hash',
		'controller' => 'register',
		'action' => 'activate',
	),
	array(
		'url' => 'profile',
		'controller' => 'profile',
	),
	array(
		'url' => 'login',
		'controller' => 'login',
	),
	
	// admin pagina's
	array(
		'url' => 'admin',
		'controller' => 'admin',
	),
	array(
		'url' => 'admin/users',
		'controller' => 'users',
	),
	array(
		'url' => 'admin/user/edit/:id',
		'controller' => 'users',
		'action' => 'edit',
	),
	array(
		'url' => 'admin/permissions',
		'controller' => 'permissions',
	),
	array(
		'url' => 'admin/developer',
		'controller' => 'developer',
	),
	array(
		'url' => 'admin/developer/formbuilder',
		'controller' => 'developer',
		'action' => 'formbuilder',
	),
);

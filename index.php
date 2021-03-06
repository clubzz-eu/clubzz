<?php

include_once 'system/functions.php';
include_once 'system/vendor/autoload.php';

include_once 'system/config/config.php';
include_once 'system/config/routes.php';

use system\classes\loader;
use system\classes\router;
use system\classes\basecontroller;
use system\classes\authenticate;
use system\classes\session;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntitySerializer;

function initDoctrine()
{
		$paths = array(__DIR__ . '/system');
		//echo $paths[0];
		$isDevMode = false;
		
		// the connection configuration
		$dbParams = array(
			'driver'   => 'pdo_mysql',
			'user'     => DB_USER,
			'password' => DB_PASS,
			'dbname'   => DB_BASE
		);
		
		$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, NULL, NULL, false);
		//$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
		$entityManager = EntityManager::create($dbParams, $config);
		
		return $entityManager;
}

$session = new Session();
$em = initDoctrine();
$auth = new Authenticate($session, $em);

$loader = new Loader($session, $em, $auth);

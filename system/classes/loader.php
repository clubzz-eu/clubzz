<?php

namespace system\classes;

class Loader
{
	private $session;
	private $em;
	private $auth;
	
	function __construct($session, $em, $auth)
	{
		$this->session = $session;
		$this->em = $em;
		$this->auth = $auth;
		
		$router = new Router();
		
		if($route = $router->getRoute())
		{
			$this->loadController($route);
		}
		else
		{
			header('HTTP/1.0 404 Not Found');
			
			if(!$this->isHtmlRequest())
				exit;
				
			$this->loadController(array('controller' => 'error', 'vars' => array()));
		}
	}

	private function isHtmlRequest()
	{
		$headers = apache_request_headers();

		if(/*stripos($headers['Accept'], 'text') === false &&*/ stripos($headers['Accept'], 'html') === false)
			return false;
		return true;
	}
	
	
	private function loadController($route)
	{
		include 'system/controllers/' . strtolower($route['controller']) . '.php';
		
		$className =  'system\\controllers\\' . ucfirst($route['controller']) . 'Controller';
		
		$controller = new $className($this->session, $this->em, $this->auth);
		
		$action = 'index';
		
		if(isset($route['action']))
			$action = strtolower($route['action']);
		
		if(!$this->getPermission($route['controller'], $action))
		{
			header('HTTP/1.0 403 Forbidden');
			
			if(!$this->isHtmlRequest())
				exit;
				
			include 'system/controllers/error.php';
			$controller = new ErrorController($this->session, $this->em, $this->auth);
			$action = 'accessdenied';
		}

		$action .= 'Action';
		call_user_func_array(array($controller, $action), $route['vars']);
	}
	

	public function getPermission($controller, $action)
	{
		// probeer de juiste permission uit de database te halen ('controller:method')
		$perm = $this->em->getRepository('Permission')->findOneBy(array('description' => $controller.':'.$action));
		// als er geen permission gevonden is dan proberen we een permission op alleen de classnaam te vinden
		if($perm === null)
			$perm = $this->em->getRepository('Permission')->findOneBy(array('description' => $controller));
		
		// verkrijg de ingelogde gebruiker (null indien niet ingelogd)
		$user = $this->auth->getUser();
		
		// als er geen permission gevonden is dan is deze controller openbaar toegankelijk
		if($perm === null)
			return true;
			
		// is de gebruiker niet ingelogd? er zijn permissions gevonden dus dan altijd verboden toegang
		if($user === null)
			return false;
		
		// nu we weten dat er een geldig user object is kunnen we de roles opvragen.
		foreach($user->getRoles() as $userRole)
		{
			foreach($perm->getRoles() as $permRole)
				if($userRole->getId() == $permRole->getId())
					return true;
		}
		
		return false;
	}
};


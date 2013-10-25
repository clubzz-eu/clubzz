<?php

class DynamicMenu
{
	public function buildMenu($items)
	{
		$router = new system\classes\Router();
		$html = '<ul class="page" id="mainmenu">' . PHP_EOL;
		
		foreach($items as $name => $uri)
		{
			if($this->hasPermission($router->getRoute($uri)))
				$html .= '<li><a href="' . url($uri) . '">' . $name . '</a></li>' . PHP_EOL;
		}
		
		$html .= '</ul>' . PHP_EOL;

		return $html;		
	}
	
	private function hasPermission($route)
	{
		$className =  ucfirst($route['controller']) . 'Controller';
		$action = 'index';
		
		if(isset($route['action']))
			$action = strtolower($route['action']);
		
		return $GLOBALS['auth']->hasPermission($route['controller'], $action);
	}
}

function buildmenu()
{
	$menuItems = array(
		'Home' => 'home',
		'Clubzz' => 'clubs',
		'Events' => 'events',
		'Contact' => 'contact',
		'Registreren' => 'registreer',
		'Mijn Clubzz' => 'profile',
		'Admin' => 'admin',
	);
	
	echo PHP_EOL . '<nav>' . PHP_EOL;
	$menu = new DynamicMenu();
	echo $menu->buildMenu($menuItems);
	echo '</nav>' . PHP_EOL;
}

buildmenu();
?>

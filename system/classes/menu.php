<?php

namespace system\classes;

use system\classes\Router;

class Menu
{
	private $menuName;
	private $menuItems;
	private $router;
	
	function __construct($menuName)
	{
		$this->menuName = $menuName;
		$this->load();
		$this->router = new Router();
	}
	
	private function load()
	{
		$include = 'system/config/menus/' . strtolower($this->menuName) . '.php';
		
		if(file_exists($include))
		{
			include $include;
			
			if(isset($menu))
			{
				$this->menuItems = $menu;
				return;
			}
		}

		throw new \Exception('Menu ' . $this->menuName . ' doesn\'t exist.');
	}
	
	public function render()
	{
		return $this->renderMenu($this->menuItems);
	}
	
	private function renderMenu($arr, $tabs = 1, $setId = true)
	{
		$html = $this->renderTabs($tabs-1) . "<ul>\n";
		
		if($setId)
			$html = $this->renderTabs($tabs-1) . '<ul id="'.$this->menuName.'-menu" class="dropdown-menu">' . "\n";
			
		foreach($arr as $item)
		{
			if($this->hasPermission($this->router->getRoute($item['url'])))
			{
				$class = '';
				if(isset($item['submenu']))
					$class = ' class="has-sub"';
					
				$html .= $this->renderTabs($tabs);
				$html .= '<li'.$class.'><a href="' . url($item['url']) . '">' . $item['name'] . '</a>';
				if(isset($item['submenu']))
				{
					$html .= "\n" . $this->renderMenu($item['submenu'], $tabs+2, false);
					$html .= $this->renderTabs($tabs);
				}
				$html .= "</li>\n";
			}
		}
		
		return $html . $this->renderTabs($tabs-1) . "</ul>\n";
	}
	
	private function renderTabs($tabs)
	{
		$html = '';
		
		for($i = 0 ; $i < $tabs ; $i++)
			$html .= "\t";
			
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

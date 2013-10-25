<?php 

namespace system\controllers;
use system\classes\BaseController;

class HomeController extends BaseController
{
	public function indexAction()
	{
		$data = array(
			'pageTitle' => 'Clubzz - Home',
		);

		$this->loadPage('home', $data);
	}
}
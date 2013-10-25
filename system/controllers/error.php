<?php 

namespace system\controllers;

use system\classes\BaseController;

class ErrorController extends BaseController
{
	public function indexAction()
	{
		$data = array(
			'pageTitle' => 'Clubzz - Page not found',
		);

		$this->loadPage('404', $data);
	}
	
	public function accessdeniedAction()
	{
		$data = array(
			'pageTitle' => 'Clubzz - Geen toegang',
		);

		$this->loadPage('403', $data);
	}
}
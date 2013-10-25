<?php 

namespace system\controllers;

use system\classes\BaseController;

class AboutController extends BaseController
{
	public function indexAction()
	{
		$data = array(
			'pageTitle' => 'Clubzz - About',
		);

		$this->loadPage('about', $data);
	}
}
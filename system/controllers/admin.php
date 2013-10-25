<?php 

namespace system\controllers;

use system\classes\BaseController;

class AdminController extends BaseController
{
	public function indexAction()
	{
		$data = array(
			'pageTitle' => 'Clubzz - Admin',
		);

		$this->loadPage('admin-home', $data);
	}
}
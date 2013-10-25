<?php 

namespace system\controllers;

use system\classes\BaseController;

class ClubsController extends BaseController
{
	public function indexAction()
	{
		$data = array(
			'pageTitle' => 'Clubzz - Clubs',
		);

		$this->loadPage('clubs', $data);
	}
}
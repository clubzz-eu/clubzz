<?php 

namespace system\controllers;

use system\classes\BaseController;

class ContactController extends BaseController
{
	public function indexAction()
	{
		$data = array(
			'pageTitle' => 'Clubzz - Contact',
		);

		$this->loadPage('contact', $data);
	}
}
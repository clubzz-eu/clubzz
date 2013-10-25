<?php 

namespace system\controllers;
use system\classes\BaseController;

class LoginController extends BaseController
{
	public function indexAction()
	{
		$loginMessage = '';
		
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			if(isset($_POST['logout']))
			{
				$this->auth->logout();
			}
			else
			{
				$email = getPostValue('email');
				$password = getPostValue('password');
				$token = getPostValue('token');
				
				if(!$this->auth->login($email, $password, $token)) {
					$loginMessage = $this->auth->getLastMessage();
				}
			}
		}
		

		$data = array(
			'pageTitle' => 'Clubzz - Home',
			'loginMessage' => $loginMessage,
		);

		$this->loadPage('home', $data);
	}
}
<?php 

namespace system\controllers;
use system\classes\BaseController;

class PermissionsController extends BaseController
{
	public function indexAction()
	{
		$userRepository = $this->em->getRepository('Permission');
		$perms = $userRepository->findAll();

		$data = array(
			'pageTitle' => 'Admin - Toegangsrechten',
			'perms' => $perms,
		);

		$this->loadPage('admin-permissions', $data);
	}
	
	public function editAction($id)
	{
		$user = $this->em->find('User', $id);

		$data = array(
			'pageTitle' => 'Admin - edit user',
			'user' => $user,
		);
		
		$this->loadPage('admin-user-edit', $data);
	}
}
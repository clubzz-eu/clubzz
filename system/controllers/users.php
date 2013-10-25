<?php 

namespace system\controllers;

use system\classes\BaseController;
use system\classes\FormBuilder;
use system\classes\DoctrineData;

class UsersController extends BaseController
{
	public function indexAction()
	{
		$userRepository = $this->em->getRepository('User');
		$users = $userRepository->findAll();

		$data = array(
			'pageTitle' => 'Admin - Users',
			'users' => $users,
		);
		
		$this->loadPage('admin-users', $data);
	}
	
	public function editAction($id)
	{
		$user = $this->em->find('User', $id);

            $form = new FormBuilder(new DoctrineData($user));
            
            $form
			->add('notify_email','text')
			->add('notify_sms','text')
			->add('email_verified','text')
			->add('bedrijfsnaam','text')
			->add('user_type','integer')
			->add('username','text')
			->add('password','text')
			->add('last_visit','datetime')
			->add('email','text')
			->add('bday','date')
			->add('adres','text')
			->add('postcode','text')
			->add('woonplaats','text')
			->add('provincie','text')
			->add('land','text')
			->add('telefoonnummer','text')
			->add('kvknummer','integer')
			->add('contactpersoon','text')
			->add('btwnummer','integer')
			->add('website','text')
			->add('facebook','text')
			->add('twitter','text')
			->add('soundcloud','text')
			->add('linkedin','text')
			->add('register_date','date')
			->add('lng','text')
			->add('lat','text')
			->add('session_id','text')
			->add('huisnummer','text')
			->add('active','text')
			->add('activate_key','text')
			->add('activate_before','datetime')
			->add('profile_image','text')
			->add('credits','integer')
			->add('Verzenden', 'submit');
            
            $form->setCallback($this, 'validate');

            if($form->isValid())
            {
		$user = $form->save();

		$this->em->persist($user);
		$this->em->flush();
		
                $data = array(
                       'pageTitle' => 'Clubzz - [MyPage]',
                );

                $this->loadPage('[ready-page]', $data);
                return;
            }
		
            $data = array(
                'pageTitle' => 'Admin - edit user',
                'form' => $form,
                'errors' => $form->getAllErrors()
            );

            $this->loadPage('admin-user-edit', $data);
	}
        
	public function validate($validator)
	{
            $valid = true;
            
            // add your own validation rules here 			

            return $valid;
	}
}

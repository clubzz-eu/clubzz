<?php 

namespace system\controllers;

use system\classes\BaseController;
use system\classes\FormBuilder;
use system\classes\DoctrineData;
use system\classes\Pro66pp;
use system\classes\Mailer;

class RegisterController extends BaseController
{
	public function indexAction()
	{
            $user = new \User();
            $form = new FormBuilder(new DoctrineData($user));
            
            $form
                ->add('username','text')
                ->add('password','password')
                ->add('pw_repeat','password', 'Herhaal password')
                ->add('last_visit','text')
                ->add('email','text')
                ->add('bday','text', 'Geboortedatum')
                ->add('postcode','text')
                ->add('facebook','text')
                ->add('twitter','text')
                ->add('notify_email','select', 'stuur mij email', array('options' => array('Y' => 'Ja', 'N' => 'Nee')))
                ->add('verzenden','submit')
                ->setObligate('bday');
            
            $form->setCallback($this, 'validate');

            if($form->isValid())
            {
                $user = $this->AddUser($form);

                $this->sendemail($user->getUsername(), $user->getEmail(), $user->getId(), $user->getActivateKey());

                $data = array(
                       'pageTitle' => 'Clubzz - Register',
                );

                $this->loadPage('register_ready', $data);
                return;
            }
		
            $date = new \DateTime('now');
            $date->sub(new \DateInterval('P75Y'));
            $daterange = $date->format('Y:');
            $date->add(new \DateInterval('P60Y'));
            $daterange .= $date->format('Y');

            $data = array(
                'pageTitle' => 'Clubzz - Register',
                'daterange' => $daterange,
                'form' => $form,
                'errors' => $form->getAllErrors()
            );

            $this->loadPage('register', $data);
	}
	
	public function validate($validator)
	{
            $valid = true;
 			
            if($this->em->getRepository('User')->findOneBy(array('email' => $_POST['email'])) !== null)
            {
                $validator->setError('Dit e-mailadres is al geregistreerd.');
                $valid = false;
            }

            if($_POST['password'] != $_POST['pw_repeat'])
            {
                $validator->setError('De wachtwoorden zijn niet gelijk.');
                $valid = false;
            }

            return $valid;
	}
	
	private function AddUser($form)
	{
		$user = $form->save();

		$pro6 = new Pro66pp();
		if($pro6->getAddressDetails($user->getPostcode(), true))
		{
			$user->setAdres($pro6->getStreet())
				->setWoonplaats($pro6->getCity())
				->setPostcode($pro6->getCity())
				->setProvincie($pro6->getProvince())
				->setLat($pro6->getLat())
				->setLng($pro6->getLng());
		}
		
		$ab = new \DateTime('now');
		$role = $this->em->find('Role', 2);
		
		$ab->add(new \DateInterval('P' . ACTIVATE_DAYS . 'D'));

		$user->setUserType(2) // guest
			->setActivateKey(getRandomHash())
			->setActivateBefore($ab)
			->addRole($role);

		$this->em->persist($user);
		$this->em->flush();
		
		return $user;
	}
	
	public function sendemail($username, $email, $id, $activateKey)
	{
		$mailer = new Mailer();
		$mailer->SetFrom(NOREPLY_EMAIL);
		$mailer->setReplacements(array(
			'#ACTIVATE_DAYS' => ACTIVATE_DAYS,
			'#URL' => url('registreer/activate/'. $id . '/' . $activateKey),
			'#NAME' => $username
		));
		$images = array(
			array('path' => 'images/logo/logo.png', 'cid' => 'logo', 'name' => 'logo.png'),
		);
		$mailer->sendEmailFromFile($email, 'Hartelijk welkom bij Clubzz.eu!', 'activate_account.html', $images);
	}
	
	public function activateAction($id, $hash)
	{
		$data = array(
			'pageTitle' => 'Clubzz - Activation',
			'message' => 'Helaas konden we je account niet activeren. neem contact met ons op.',
		);

		$user = $this->em->find('User', $id);
		
		if($user)
		{
			if($user->getActivateKey() == $hash)
			{
				$user->setEmailVerified('Y');
				
				$this->em->persist();
				$this->em->flush();
				
				$data['message'] = 'Gefeliciteerd. Je account is geactiveerd!';
			}
		}
		
		$this->loadPage('register_activate', $data);
	}
}
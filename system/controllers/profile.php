<?php 

namespace system\controllers;

use system\classes\BaseController;
use system\classes\formbuilder;
use system\classes\DoctrineData;

class ProfileController extends BaseController
{
	private $error;
	
	public function indexAction()
	{
		$user = $this->auth->getUser();

		$form = new FormBuilder(new DoctrineData($user));
		$form
			
			->add('notes', 'textarea')			
			->add('sex', 'radio', 'Uw geslacht', array( 'options' => array('M' => 'Man', 'F' => 'Vrouw')))
			->add('events', 'checkbox', 'Email mij als', array( 'options' => array('event' => 'er nieuwe events zijn.', 'friends' => 'mijn vrienden een reactie achterlaten.')))
			->add('username', 'text', 'Uw naam')
			->add('email', 'email')
			->add('bday', 'date', 'Geboortedatum')
			->add('password', 'password', 'Password', array('validate' => false))
			->add('pw_repeat', 'password', 'Herhaal password', array('validate' => false))
			->add('postcode', 'postcode')
			->add('adres', 'text')
			->add('woonplaats', 'text')
			->add('provincie', 'text')
			->add('telefoonnummer', 'text')
			//->add('website', 'text')
			->add('facebook', 'text')
			->add('twitter', 'text')
			->add('soundcloud', 'text')
			//->add('linkedin', 'text')
			->add('notifyEmail', 'select', 'Stuur mij email', array( 'options' => array('Y' => 'Ja', 'N' => 'Nee')))
			->add('verzenden', 'submit')
			->set('adres', 'disabled', 'disabled')
			->set('woonplaats', 'disabled', 'disabled')
			->set('provincie', 'disabled', 'disabled');
			//->usePlaceholders(false)
			//->useLabels(true);
		
		//$form->setCallback($this, 'validation');
	
		if($form->isValid())
		{
			echo 'Bedankt.';
			exit;
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

		$this->loadPage('profile', $data);
	}
	
	public function validation($validator)
	{
/*		if($_POST['banaan'] != 'fruit')
		{
			$validator->setError('een banaan is geen ' . $_POST['banaan']);
			return false;
		}
*/			
		return true;
	}
}
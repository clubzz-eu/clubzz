<?php

namespace system\classes;

class Authenticate
{
	private $session;
	private $em;
	private $user = NULL;
	private $msg = '';
	
	function __construct($session, $em)
	{
		$this->session = $session;
		$this->em = $em;
	}
	
	public function login($email, $password, $token)
	{
		if($user = $this->validateLogin($email, $password, $token))
		{
			$user->setSessionId(getRandomHash());
			$user->setLastVisit(new \DateTime('now'));
			
			$this->em->persist($user);
			$this->em->flush();
			
			$this->session->kill();
			$this->session->setValue('status', 'Logged in');
			$this->session->setValue('userid', $user->getId());
			$this->session->setValue('session', $user->getSessionId());
	
			$this->user = $user;
			return true;
		}
		
		return false;
		
	}
	
	private function validateLogin($email, $password, $token)
	{
		$user = $this->em->getRepository('User')->findOneBy(array('email' => $email));

		if($user === null || $user->getPassword() != sha1($password))
		{
			$this->msg = 'Gebruikers-email of wachtwoord onjuist.';
			return false;
		}

		if($this->session->getValue('token') != $token)
		{
			$this->msg = 'Toegang geweigerd, probeer opnieuw.';
			return false;
		}
		
		if($user->getActive() != 'Y')
		{
			$this->msg = 'Account is niet actief.';
			return false;
		}
			
		if($user->getEmailVerified() != 'Y')
		{
			$interval = date_diff(new \DateTime('now'), $user->getActivateBefore());
			if($interval->invert)
			{
				$this->msg = 'Uw account is nog niet geactiveerd, controleer uw email.';				
				return false;
			}
			//$this->msg = 'Uw heeft nog ' . $interval->d . ' dagen om uw account te activeren.';
		}

		return $user;
	}
	
	public function logout()
	{
		$this->session->kill();
		$this->user = NULL;
	}
	
	public function getLastMessage()
	{
		return $this->msg;
	}
	
	public function getUser()
	{
		if($this->user == NULL)
		{
			if($this->session->getValue('status') == 'Logged in' && $this->session->getValue('userid') > 0)
			{
				$this->user = $this->em->find('User', $this->session->getValue('userid'));
				if($this->user === NULL || $this->user->getSessionId() != $this->session->getValue('session'))
					$this->user = NULL;
			}
		}
		
		return $this->user;
	}
	
	public function hasPermission($permission)
	{
		$perm = $this->em->getRepository('Permission')->findOneBy(array('description' => $permission));
		
		// verkrijg de ingelogde gebruiker (null indien niet ingelogd)
		$user = $this->getUser();
		
		// als er geen permission gevonden is dan is dan ALTIJD permissie verlenen
		if($perm === null)
			return true;
			
		// is de gebruiker niet ingelogd? er zijn permissions gevonden dus dan altijd verboden toegang
		if($user === null)
			return false;
		
		// nu we weten dat er een geldig user en permission object is kunnen we de roles opvragen en vergelijken.
		foreach($user->getRoles() as $userRole)
		{
			foreach($perm->getRoles() as $permRole)
				if($userRole->getId() == $permRole->getId())
					return true;
		}
		
		return false;
	}
};
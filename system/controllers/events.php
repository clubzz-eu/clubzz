<?php 

namespace system\controllers;

use system\classes\BaseController;
use system\classes\FormBuilder;
use system\classes\DoctrineData;

class EventsController extends BaseController
{
	public function indexAction()
	{
            $event = new \Event();
            $form = new FormBuilder(new DoctrineData($event));
            
            $form
			->add('title','text')
			->add('description','textarea')
			->add('start','datetime')
			->add('stop','datetime')
                        ->add('Verzenden', 'submit');
            
            $form->setCallback($this, 'validate');

            if($form->isValid())
            {
		$event = $form->save();

		$this->em->persist($event);
		$this->em->flush();
		
                echo 'Bedankt';
                exit;
             }
		
            $data = array(
                'pageTitle' => 'Clubzz - MyPage',
                'form' => $form,
                'errors' => $form->getAllErrors()
            );

            $this->loadPage('events', $data);
	}
	
	public function validate($validator)
	{
            $valid = true;
            
            // add your own validation rules here 			

            return $valid;
	}
}

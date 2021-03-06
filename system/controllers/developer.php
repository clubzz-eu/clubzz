<?php 

namespace system\controllers;

use system\classes\BaseController;
use system\classes\FormData;
use system\classes\FormBuilder;
use system\classes\menu;

class DeveloperController extends BaseController
{
	public function indexAction()
	{
		$menu = new Menu('admin');
		echo $menu->render();
	}
	
	public function formbuilderAction()
	{
		$form = new FormBuilder(new FormData());
		$form->add('entity', 'text');
		$form->add('Build', 'submit');
                
		if($form->isValid())
                {
                    $entityname = strtolower($_POST['entity']);
                    $meta = $this->em->getMetadataFactory()->getMetadataFor(ucfirst($entityname));
                    $colnames = $meta->getColumnNames();
                    $identifiers = $meta->getIdentifierColumnNames();

                    $fields = Array();
                    foreach($colnames as $colname)
                    {
                        if(!in_array($colname, $identifiers))
                        {
                            $type = $meta->getTypeOfColumn($colname);
                            switch ($type)
                            {
                                case 'text':
                                    $type = 'textarea';
                                    break;
                                
                                case 'email':
                                case 'date':
                                case 'time':
                                case 'datetime':
                                case 'integer':
                                case 'decimal':
                                    break;
                                
                                default:
                                    $type = 'text';
                                    break;
                            }
                            $fields[$colname] = $type;
                        }
                    }
					
					$fields['Verzenden'] = 'submit';

                    $data = array(
                        'pageTitle' => 'Clubzz - Home',
                        'entity' => $entityname,
                        'fields' => $fields
                    );

                    $this->loadPage('developer-formbuilder', $data);
                    exit;
		}

		echo $form->renderForm();
	}
}

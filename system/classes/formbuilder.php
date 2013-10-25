<?php

namespace system\classes;

class FormBuilder
{
	private $formData;
	private $class;
	private $autovalidation;
	private $validator;
	private $formFields;
	private $useLabels;
	private $usePlaceholders;
	private $formPrefix;
	private $formSuffix;
	private $rowPrefix;
	private $rowSuffix;
	private $fieldPrefix;
	private $fieldSuffix;
	private $labelPrefix;
	private $labelSuffix;
	
	function __construct($formData, $class = null)
	{
		$this->formData = $formData;
		
		if(!$class)
			$class = 'form';
			
		$this->class = $class;
		
		$this->autovalidation = true;
		
		$this->validator = new FormValidator($formData);

		$this->useLabels = true;
		$this->usePlaceholders = false;
		
		$this->ouputAsDivs();
		
	}
	
	public function setAutoValidation($autovalidation = true)
	{
		$this->autovalidation = $autovalidation;
	}

	public function setCallback($class, $method)
	{
		$this->validator->setCallback($class, $method);
	}

	public function getAllErrors()
	{
		return $this->validator->getAllErrors();
	}
	
	public function getError($fieldname)
	{
		return $this->validator->getError($fieldname);
	}

	public function ouputAsTable()
	{
		$this->formPrefix = '<table class="' . $this->class . '-table">';
		$this->formSuffix = '</table>';
		$this->rowPrefix = '<tr class="' . $this->class . '-tr">';
		$this->rowSuffix = '</tr>';
		$this->fieldPrefix = '<td class="' . $this->class . '-td">';
		$this->fieldSuffix = '</td>';
		$this->labelPrefix = '<th class="' . $this->class . '-th">';
		$this->labelSuffix = '</th>';
	}

	public function ouputAsDivs()
	{
		$this->formPrefix = '<div class="' . $this->class . '-div">';
		$this->formSuffix = '</div>';
		$this->rowPrefix = '<div class="' . $this->class . '-row-div">';
		$this->rowSuffix = '</div>';
		$this->fieldPrefix = '<div class="' . $this->class . '-field-div">';
		$this->fieldSuffix = '</div>';
		$this->labelPrefix = '<div class="' . $this->class . '-label-div">';
		$this->labelSuffix = '</div>';
	}

	public function add($name, $type, $label='', $options = false)
	{
		$this->formFields[$name] = new FormField($name, $type, $label, $options, $this->formData, $this->validator);
		return $this;
	}

	public function set($name, $tagname, $tagvalue)
	{
		if(isset($this->formFields[$name]))
			$this->formFields[$name]->set($tagname, $tagvalue);
		return $this;
	}

	public function setContent($name, $content)
	{
		if(isset($this->formFields[$name]))
			$this->formFields[$name]->setContent($content);

		return $this;
	}

	public function setObligate($fieldName, $obligate = true)
        {
                $this->validator->setObligate($fieldName, $obligate);
 
		return $this;
       }
        
	public function setMaxLength($fieldName, $maxLength)
        {
                $this->validator->setMaxLength($fieldName, $maxLength);
 
		return $this;
       }
        
        public function useLabels($useLabels = true)
	{
		$this->useLabels = $useLabels;
		return $this;
	}
	
	public function usePlaceholders($usePlaceholders = true)
	{
		$this->usePlaceholders = $usePlaceholders;
		return $this;
	}
	
	public function formPrefix($formPrefix)
	{
		$this->formPrefix = $formPrefix;
	}
	
	public function formSuffix($formSuffix)
	{
		$this->formSuffix = $formSuffix;
	}
	
	public function rowPrefix($rowPrefix)
	{
		$this->rowPrefix = $rowPrefix;
	}
	
	public function rowSuffix($rowSuffix)
	{
		$this->rowSuffix = $rowSuffix;
	}
	
	public function fieldPrefix($fieldPrefix)
	{
		$this->fieldPrefix = $fieldPrefix;
	}
	
	public function fieldSuffix($fieldSuffix)
	{
		$this->fieldSuffix = $fieldSuffix;
	}
	
	public function labelPrefix($labelPrefix)
	{
		$this->labelPrefix = $labelPrefix;
	}
	
	public function labelSuffix($labelSuffix)
	{
		$this->labelSuffix = $labelSuffix;
	}

	public function renderForm()
	{
		$html = $this->start();
		
		foreach($this->formFields as $name => $formfield)
			$html .= $this->render($name);
			
		return $html . $this->end();
	}

	public function render($name)
	{
		$html = '';
		
		if(!isset($this->formFields[$name]))
			return false;
		
		$isButton = in_array($this->formFields[$name]->getType(), array('submit', 'button'));
		
		$html .= $this->rowPrefix;

		if($this->usePlaceholders && !$isButton)
			$this->set($name, 'placeholder', $this->formFields[$name]->getLabel());

		if($this->useLabels && !$isButton)
		{
			$html .= $this->labelPrefix .
				'<label for="' . $name . '">' . $this->formFields[$name]->getLabel() . '</label>' .
				$this->labelSuffix . PHP_EOL;
		}

		$html .= $this->fieldPrefix .
			$this->formFields[$name]->render() .
			$this->fieldSuffix .
			$this->rowSuffix . PHP_EOL;
		
		return $html;
	}
	
	public function start($action = '', $method = 'post')
	{
		return '<form action="' . $action . '" method="' . $method . '">' . PHP_EOL . $this->formPrefix . PHP_EOL;
	}

	public function end()
	{
		return $this->formSuffix . PHP_EOL . '</form>' . PHP_EOL;
	}

	public function isValid()
	{
		$valid1 = true;
		$valid2 = true;
		
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$valid1 = $this->validator->runCallback();
			
                        if($this->autovalidation)
			{
                            foreach($this->formFields as $formfield)
                                if(!$formfield->isValid())
                                    $valid2 = false;
			}

				
			return $valid1 && $valid2;
		}
		
		return false;	
	}
        
        public function save()
	{
            return $this->formData->save();
	}

}
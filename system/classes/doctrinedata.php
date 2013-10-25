<?php

namespace system\classes;

interface iFormData
{
	public function getValue($fieldName);
	public function isObligate($fieldName);
	public function getMaxLength($fieldName);
	public function save();
}

class DoctrineData implements iFormData
{
	private $entity;
	private $metaData;
	
	function __construct($entity = null)
	{
            $this->entity = $entity;

            if($entity)
                $this->metaData = $GLOBALS['em']->getMetadataFactory()->getMetadataFor(get_class($this->entity));
	}
	
	public function getValue($fieldName)
	{
            if($this->entity == null || !$this->metaData->hasField($fieldName))
                    return null;

            $value = $this->metaData->getFieldValue($this->entity, $fieldName);

            if(@get_class($value) != 'DateTime')
                    return $value;

            switch($this->metaData->getTypeOfField($fieldName ))
            {
                case 'date':
                    return $value->format('d-m-Y');

                case 'time':
                    return $value->format('H:i:s');

                default: // datetime
                    return $value->format('d-m-Y H:i:s');
            };
	}
	
	public function isObligate($fieldName)
	{
		if($this->entity == null)
			return false;

                if(!$this->metaData->hasField($fieldName))
			return false;
			
		if($this->metaData->isNullable($fieldName))
			return false;

		return true;
	}

	public function getMaxLength($fieldName)
	{
		if(!$this->entity == null)
			return -1;

                if(!$this->metaData->hasField($fieldName))
			return -1;

		$arr = $this->metaData->getFieldMapping($fieldName);
		
		if(isset($arr['length']))
			return $arr['length'];
		
		return -1;	
	}

	public function save()
	{
            if($this->entity == null)
                return null;

            foreach($_POST as $fieldName => $value)
            {
                if($this->metaData->hasField($fieldName))
                {
                    switch($this->metaData->getTypeOfField($fieldName ))
                    {
                        case 'date':
                        case 'time':
                        case 'datetime':
                           $this->metaData->setFieldValue($this->entity, $fieldName, new \DateTime($value));
                           break;

                        default:
                           $this->metaData->setFieldValue($this->entity, $fieldName, $value);
                    }
                }
            }
 
            return $this->entity;
        }
}

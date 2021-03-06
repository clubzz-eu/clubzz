<?php

namespace system\classes;

class Tag
{
	private $name;
	private $elements;
	private $content;

	function __construct($name, $elements = array(), $content = null)
	{
		$this->name = $name;
		$this->elements = $elements;
		$this->content = $content;		
	}
	
	public function set($elemName, $elemValue)
	{
		return $this->setElement($elemName, $elemValue);
	}
	
	public function setElement($elemName, $elemValue)
	{
		$this->elements[$elemName] = $elemValue;
		return $this;
	}
	
	public function setContent($content)
	{
		$this->content = $content;
		return $this;
	}
	
	public function getContent()
	{
		return $this->content;
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function render()
	{
		$html = '<' . $this->name;
				
		foreach($this->elements as $elemName => $elemValue)
			$html .= ' ' . $elemName . '="' . $elemValue . '"';
			
		if($this->isSingleton())
			$html .= ' />';
		else
			$html .= ' >' . $this->content . '</' . $this->name . '>';

		return $html;
	}
	
	private function isSingleton()
	{
		$singletons = array ('img','input','br','hr','base','col','command','embed','link','meta','param','source');
		
		if(in_array($this->name, $singletons)) 
			return true;
			
		return false;
	}
	
}


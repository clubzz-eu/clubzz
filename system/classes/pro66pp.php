<?php

namespace system\classes;

class Pro66pp
{
	private $obj = null;

	public function getAddressDetails($postcode)
	{		
		$json = @file_get_contents('http://api.pro6pp.nl/v1/autocomplete?auth_key=' . PRO6PP_AUTH_KEY . '&nl_sixpp=' . $postcode . '&format=json');
		
		if($json === false)
			return false;
			
		$obj = json_decode($json);
		
		if(!property_exists($obj, 'status') || $obj->status == 'error')
			return false;
			
		$this->obj = $obj;
		
		return true;
	}

	public function getStreet()
	{
		return $this->obj->results[0]->street;
	}

	public function getPostcode()
	{
		return $this->obj->results[0]->postcode;
	}

	public function getCity()
	{
		return $this->obj->results[0]->city;
	}

	public function getProvince()
	{
		return $this->obj->results[0]->province;
	}

	public function getLat()
	{
		return $this->obj->results[0]->lat;
	}

	public function getLng()
	{
		return $this->obj->results[0]->lng;
	}

}
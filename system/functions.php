<?php

// autoload the entities!!!
spl_autoload_register(function ($class) {
	$class = strtolower(implode('/', explode('\\', $class))).'.php';
	
	if(file_exists($class))
    	include_once $class;
	else
		echo $class.' not found.<br>';
});

function url($uri = '')
{
	return str_replace(':/', '://', str_replace('//', '/', $GLOBALS['site_url'] . $uri));
}

function getPostValue($key, $default = '')
{
    if(isset($_POST[$key]))
        return $_POST[$key];
    
    return $default;
}

function isValidPassword($str)
{
    $dummy = array(); // php versie < 5.4 moet een derde parameter hebben
	$digits = preg_match_all("/[0-9]/", $str, $dummy);
	$upper = preg_match_all("/[A-Z]/", $str, $dummy);
	$length = strlen($str);
	
	if( $length < 6 || $upper < 1 || $digits < 1)
		return false;
		
	return true;
}

function isValidDutchPostcode($str, $onlyDiggits = false)
{
	$dummy = array(); // php versie < 5.4 moet een derde parameter hebben
    $str = strtoupper(preg_replace('/\s+/', '', $str));
	$digits = preg_match_all("/[0-9]/", $str, $dummy);
	$alphas = preg_match_all("/[A-Z]/", $str, $dummy);
	$length = strlen($str);
	
	if($digits == 4 && $alphas == 2 && $length == 6)
		return $str;
		
	if($digits == 4 && $length == 4 && $onlyDiggits)
		return $str;
		
	return false;
}

function getRandomHash()
{
	return sha1(microtime(true).mt_rand(10000,90000));
}

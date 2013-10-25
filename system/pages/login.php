<?php
include 'system/views/htmlstart.php';

/*
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$email = getPostValue('email');
	$password = getPostValue('password');
	$token = getPostValue('token');
	
	$auth = new Authenticate();
	if($auth->login($email, $password, $token))
		file_put_contents('log.txt' , 'login: ' . date('d-m-Y h:m') . PHP_EOL , FILE_APPEND);
	else
		file_put_contents('log.txt' , 'login failure: ' . date('d-m-Y h:m') . PHP_EOL , FILE_APPEND);
		
}
*/
include 'system/views/htmlend.php';

?>

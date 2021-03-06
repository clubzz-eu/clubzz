<?php

namespace system\classes;

include_once(__DIR__.'/phpmailer/class.phpmailer.php');

class Mailer extends \PHPMailer {
	private $mail;
	private $template_dir;	
	private $replacements;	
	
	function __construct($smtp_host = false, $smtp_port = false, $smtp_user = false, $smtp_pass = false)
	{
		if($smtp_host) {
			$this->IsSMTP();
			$this->Host = $smtp_host;
			if($smtp_port)
				$this->Port = $smtp_port;
			if($smtp_user) {
				$this->SMTPAuth = true;
				$this->Username = $smtp_user;
				if($smtp_pass)
					$this->Password = $smtp_pass;
			}
		}
		
		$this->template_dir = 'system/templates/';
		$this->replacements = array();
	}
	
	public function sendEmailFromFile($to, $subject, $filename, $images = false) {
		$body = file_get_contents($this->template_dir . $filename);
		$this->ClearAddresses();
		$this->ClearAttachments();
		$this->AddAddress($to /*, $name */);
		$this->Subject = $subject;
		
		$body = $this->replaceReplacements($body);
		
		$this->MsgHTML($body);
		
		if($images != false && is_array($images))
		{
			foreach($images as $image)
			{
				$this->AddEmbeddedImage($image['path'], $image['cid'], $image['name']);
			}
		}
		
		if(!$this->Send()) {
		  echo "Mailer Error: " . $this->ErrorInfo;
		}

	}
	
	public function setReplacements($replacements)
	{
		$this->replacements = $replacements;
	}
	
	private function replaceReplacements($text)
	{
		foreach($this->replacements as $key => $value)
		{
			$text = str_replace($key, $value, $text);
		}
		
		return $text;
	}
};


?>
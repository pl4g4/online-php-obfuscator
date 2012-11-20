<?php
	include_once("settings.php");

	$filePath = $_POST['folder'];
	$ipAddress = $_SERVER['REMOTE_ADDR'];
	
	//deleting all php files if error occur
	$files = glob($filePath."/*.php");
	foreach($files as $file){
		unlink($file);
	} 

	//send email
	$emailTo = CONTACT_TO; // Put your own email address here
	$subject = 'PHP Obfuscator Error';
	$body = "An error occured when uploading files to folder $filePath and IP address $ipAddress" ;
	$headers = 'From: PHP Obfuscator Error Uploading <' . CONTACT_FROM . "> \r\n" ;
		
	mail($emailTo, $subject, $body, $headers);

?>
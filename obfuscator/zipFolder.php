<?php

include_once("settings.php");


//get ip address from user
$ipAddress = $_SERVER['REMOTE_ADDR'];
$ipAddress = str_replace(".", "--", $ipAddress);

$filePath = $_POST['folder'];

//zip folder
$zip = new ZipArchive;
$zip->open('myzip.zip', ZipArchive::CREATE);
foreach (glob($filePath."/*") as $file) {
    $zip->addFile($file);
    
    
}
$zip->close();


//deleting zip files from folder
$files = glob($filePath."/*.zip");
foreach($files as $file){
	unlink($file);
}

//move zip to folder
if (!copy('myzip.zip', $filePath.'/myzip'.$ipAddress.'.zip')) {
    echo "failed to copy myzip.zip ...\n";
    
    
    $emailTo = CONTACT_TO; // Put your own email address here
    $subject = 'failed to copy myzip.zip';
	$body = "failed to copy myzip.zip IP $ipAddress" ;
	$headers = "From: PHP Obfuscator <".CONTACT_FROM."> \r\n" ;
		
	mail($emailTo, $subject, $body, $headers);
    
    
}else{
	unlink('myzip.zip');

	$files = glob($filePath."/*.php");
	foreach($files as $file){
		unlink($file);
	}  
	
	echo $_SERVER['SERVER_NAME'].FOLDER_NAME.$filePath.'/myzip'.$ipAddress.'.zip';	
	
	$emailTo = CONTACT_TO; // Put your own email address here
	$subject = 'zip file was created';
	$body = "A zip file was created IP $ipAddress" ;
	$headers = "From: PHP Obfuscator <".CONTACT_FROM."> \r\n" ;
		
	mail($emailTo, $subject, $body, $headers);	
	
}


?>
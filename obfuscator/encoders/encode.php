<?php

	$fileName = $_POST['fileName'];
	$filePath = $_POST['filePath'];	
	
	$file = "../".$filePath.'/'.$fileName;

	include_once("obfuscator1.php");
	include_once("obfuscator2.php");
	include_once("obfuscateVariables.php");	

	//obfuscating variables
	//$enc = new Encryption();
	//$enc->parse ($file)->codeit($file); 
	

	
		
	//First encoder
	$obfuscator=new PhpObfuscator();
	$obfuscatedFile=$obfuscator->obfuscate($file);
	if($obfuscator->hasErrors()){
	    $errors=$obfuscator->getAllErrors();
	    print_r($errors);
	}
	else {
  
	    //Second encoder 
		$packer=new obfuscator();
		$packer->file($obfuscatedFile);				
		$packer->strip=false;	
		$packer->strip_comments=false;	
		$packer->b64=true;			
		$packer->pack();
		$packer->save("../".$filePath."/obfuscated_".$fileName);
		
		//obfuscating variables
		$enc = new Encryption();
	    $enc->parse("../".$filePath."/obfuscated_".$fileName)->codeit ("../".$filePath."/obfuscated_".$fileName); 				

	    //deleting files
		unlink($obfuscatedFile);
		unlink($file);
		
		//echo result
	    echo "obfuscated_".$fileName;
	    
	}


?>
<?php
define("ENCODING_LEVEL", 3);
/**
 * This class Obfuscate / encodes the PHP code to that it becomes hard to read.
 *
 * @see The higher the ENCODING_LEVEL, the code becomes harder to read. However the filesize and executing time will also increase as ENCODING_LEVEL goes higher.
 * @author Rochak Chauhan
 * @version beta
 * @todo Encode the each line of php file before writing it as a file.
 */
Class PhpObfuscator {
    private $fileName="";
    private $obfuscatedFilePostfix="obfuscated";
    private $obfuscateFileName="";
    private $errors=array();

    /**
     * constructor function
     *
     * @param string $obfuscatedFilePostfix
     */
    public function __construct($obfuscatedFilePostfix=""){
        if (trim($obfuscatedFilePostfix)!="") {
            $this->obfuscatedFilePostfix=$obfuscatedFilePostfix;
        }
    }

    /**
     * function to obfuscate a file
     *
     * @param string $fileName
     * @return 
     */
    public function obfuscate($fileName) {
        if (trim($fileName)=="") {
            $this->errors[]="File Name cannot be blank in function: ".__FUNCTION__;
            return false;
        }
        if (!is_readable($fileName)){
            $this->errors[]="Failed to open file: $fileName in the function: ".__FUNCTION__;
            return false;
        }
        $this->fileName=trim($fileName);

        $ext=end(explode(".",$this->fileName));
        $pos=strrpos($this->fileName,".");
        $fileName=substr($this->fileName,0,$pos);
        $this->obfuscateFileName=$obfuscateFileName=$fileName.".".$this->obfuscatedFilePostfix.".".$ext;

        if(($fp=fopen($obfuscateFileName,"w+"))===false){
            $this->errors[]="Failed to open file: $obfuscateFileName for writing in the function: ".__FUNCTION__;
            return false;
        }
        else {
            fwrite($fp,"<?php \r\n");
            $line=file_get_contents($this->fileName);
            
            $line=str_replace("<?php","",$line);
            $line=str_replace("<?","",$line);
            $line=str_replace("?>","",$line);
            $line=trim($line);
            $line=$this->encodeString($line,ENCODING_LEVEL);
            $line.="\r\n";
            fwrite($fp,$line);
            fwrite($fp,"?>");
        }
        fclose($fp);
        return $obfuscateFileName;
    }
    
    /**
     * Function to encode the file content before writing it
     *
     * @param string $string
     * @param [int $levels]
     * @return string
     */
    private function encodeString($string, $levels=""){
        if (trim($levels)=="") {
        	$levels=rand(1,9);
        }
        $levels=(int) $levels;
        for ($i=0; $i<$levels;$i++){
            $string=base64_encode($string);
            $string='eval(base64_decode("'.$string.'"));';
        }
        return $string;
    }
    
    /**
     * Function to return all encountered errors
     * @return array
     */
    public function getAllErrors(){
        return $this->errors;
    }

    /**
     * Function to find if there were any errors
     *
     * @return boolean
     */
    public function hasErrors(){
        if (count($this->errors)>0) {
            return true;
        }
        else {
            return false;
        }
    }
}
?>
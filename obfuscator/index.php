<?php

function curPageName() {
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>PHP Obfuscator</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="FREE Online PHP Obfuscator. This is a free tool to ofuscate your php files. Feel free to use it">
    <meta name="author" content="pl4g4">
    <meta name="keywords" content="php, obfuscator, obfuscate, php obfuscator, free, online, script, encode scripts, decode scripts, obfuscate scripts">

    <!-- CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 40px;
      }

      /* Custom container */
      .container-narrow {
        margin: 0 auto;
        max-width: 700px;
      }
      .container-narrow > hr {
        margin: 30px 0;
      }

      /* Main marketing message and sign up button */
      .jumbotron {
        margin: 60px 0;
        text-align: center;
      }
      .jumbotron h1 {
        /*font-size: 72px;*/
        line-height: 1;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }
      
      
      .plupload_header_content{
	      background: none !important;
	      text-align: left;
	      padding-left: 10px !important;
	      
      }
      
    </style>

 
    <style type="text/css">@import url(js/plupload/jquery.plupload.queue/css/jquery.plupload.queue.css);</style>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
	
	
	<script type="text/javascript" src="js/bootstrap.min.js" ></script>
	  
	<!-- Third party script for BrowserPlus runtime (Google Gears included in Gears runtime now) -->
	<script type="text/javascript" src="http://bp.yahooapis.com/2.4.21/browserplus-min.js"></script>
	 
	<!-- Load plupload and all it's runtimes and finally the jQuery queue widget -->
	<script type="text/javascript" src="js/plupload/plupload.full.js"></script>
	<script type="text/javascript" src="js/plupload/jquery.plupload.queue/jquery.plupload.queue.js"></script>
	 
	<script type="text/javascript">
	
	var filePath = "";
	var fileName = "";
	
	
	// Convert divs to queue widgets when the DOM is ready
	$(function() {
		
		
	
	    $("#uploader").pluploadQueue({
	        // General settings
	        runtimes : 'html5,flash,gears,silverlight,browserplus,',
	        url : 'upload.php',
	        max_file_size : '10mb',
	        chunk_size : '1mb',
	        unique_names : false,
	 
	 
	        // Specify what files to browse for
	        filters : [
	            {title : "PHP files", extensions : "php"}
	        ],
	 
	        // Flash settings
	        flash_swf_url : '/plupload/js/plupload.flash.swf',
	 
	        // Silverlight settings
	        silverlight_xap_url : '/plupload/js/plupload.silverlight.xap',
	        
	        init:
	           {
		            FileUploaded: function(up, file, response) {
		                //getting the file name from upload.php
		                var obj = jQuery.parseJSON( response.response );
		                filePath =  obj.filePath;
		                fileName =  obj.fileName;
		                
		                
		                $.ajax({  
		                	type: "POST",  
		  					url: "encoders/encode.php",  
		  					data: "filePath="+filePath+"&fileName="+fileName,
							success: function(data){
								
								$('#results').css({"display":"inline"});
								$('#results ul').append("<li>"+data+"</li>");
								
						   }
		             		
		 				});
	
		                
		                
		                
		            },
		            
		            UploadComplete: function(up, files) {
		            	
		            	
		            	
		            	$.ajax({  
		                	type: "POST",  
		  					url: "zipFolder.php",  
		  					data: "folder="+filePath,
							success: function(data){
								
								
															
								$('#results').append('<a href="http://'+data+'">Download File Zip</a>');
								
								uploader.refresh();
								
						   }
		             		
		 				});
		            
		            },
		            
		            Error: function(up, args) {
	                	
	                	$.ajax({  
		                	type: "POST",  
		  					url: "sendEmailOnError.php",  
		  					data: "folder="+filePath,
							success: function(data){
								
								
								alert('There was an error with your upload, please try again. The files you uploaded will be deleted from the server. You must reupload all your files again.' );
								uploader.refresh();
								
						   }
		             		
		 				});
	                	
	                	
	                }
		            
		            
		            
		            
		            
	           }
	        
	        
	    });
	    
	        
	 
	    // Client side form validation
	    $('#uploadForm').submit(function(e) {
	       
		     var uploader = $('#uploader').pluploadQueue();
	        // Files in queue upload them first
	        if (uploader.files.length > 0) {
	            // When all files are uploaded submit form
	            uploader.bind('StateChanged', function() {
	                if (uploader.files.length === (uploader.total.uploaded + uploader.total.failed)) {
	                    $('#uploadForm').submit();
	                }
	            });
	                 
	            uploader.start();
	            
	            
	            
	            
	            
	            
	            
	        } else {
	            alert('You must queue at least one file.');
	        }
	 
	        return false;
	    });
	});
	</script>

  
  
  
  </head>

  <body>


    <div class="container-narrow">

	  
      <div class="masthead">
        <ul class="nav nav-pills pull-right">
	        <li <?php if(curPageName() == 'index.php'){echo 'class="active"' ;}?> ><a href="index.php">Home</a></li>
	        <li><a href="contact.php">Contact</a></li>	
        </ul>
        <h3 class="muted">PHP Obfuscator</h3>
      </div>
      

      <hr>

      <div class="jumbotron">
        <h1>Online PHP Obfuscator</h1>
        
        
        
         <form id="uploadForm" >
		    <div id="uploader">
		        <p>You browser doesn't have Flash, Silverlight, Gears, BrowserPlus or HTML5 support.</p>
		    </div>
		</form>
		
		
      </div>
      
      <div id="results" style="display:none" >
      		<p>Files</p>
      		<ul id="filesList" >
      			
      		</ul>
      </div>
      

      <hr>

      <div class="row-fluid marketing">
        <div class="span6">
          <h4>Online PHP Obfuscator</h4>
          <p>Submit any PHP file and you will get back an obfuscated 100% PHP equivalent file, which requires no special server runtime for execution. Backup your original files and replace them with those generated here. Please note that this method is NOT bulletproof, but will keep away curious eyes from your code. DO NOT modify the files we provide, as they might stop working.</p>

          <h4>How the encoding works</h4>
          <p>You need to upload php file(s). For each file uploaded it will generate a new obfuscated script, you will be able to download you new file. <strong> All files will be removed from our server for security reasons. </strong> </p>

         
        </div>

        <div class="span6">
          <h4>With the online Encoder you can: </h4>
          <p><ul>
	          <li>Encode a single file</li>
	          <li>Encode an multiple PHP files</li>
	          <li>Download your obfuscated file</li>
          </ul></p>

          <h4>Donations</h4>
          
          <?php
          
          echo '
          <form style="margin: 11px 90px 20px;" id="donationForm" name="donationForm" action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="5N6K3MF8HSTKL">
<input type="image" src="https://www.paypalobjects.com/WEBSCR-640-20110429-1/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/WEBSCR-640-20110429-1/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

				';
	?>

          
        </div>
      </div>

      <hr>

      <div class="footer">
        <p>&copy; Pl4g4 <?php echo date('Y'); ?></p>
      </div>

    </div> <!-- /container -->
        
        
       
 

      


 

  </body>
</html>
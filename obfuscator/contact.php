<?php
include_once("settings.php");

function curPageName() {
 return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}


//If the form is submitted
if(isset($_POST['submit'])) {


if(trim($_POST['anti']) != '') {
	$hasError = true;
}



//Check to make sure that the name field is not empty
if(trim($_POST['contactname']) == '') {
$hasError = true;
} else {
$name = trim($_POST['contactname']);
}


//Check to make sure that the name field is not empty
if(trim($_POST['weburl']) == '') {
$hasError = true;
} else {
$weburl = trim($_POST['weburl']);
}

//Check to make sure that the subject field is not empty
if(trim($_POST['subject']) == '') {
$hasError = true;
} else {
$subject = trim($_POST['subject']);
}

//Check to make sure sure that a valid email address is submitted
if(trim($_POST['email']) == '') {
$hasError = true;
} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
$hasError = true;
} else {
$email = trim($_POST['email']);
}

//Check to make sure comments were entered
if(trim($_POST['message']) == '') {
$hasError = true;
} else {
if(function_exists('stripslashes')) {
$comments = stripslashes(trim($_POST['message']));
} else {
$comments = trim($_POST['message']);
}
}

//If there is no error, send the email
if(!isset($hasError)) {
$emailTo = CONTACT_TO ; // Put your own email address here
$subject = 'PHP Obfuscator Contact';
$body = "Name: $name \n\nEmail: $email \n\nPhone Number: $phone \n\nSubject: $subject \n\nComments:\n $comments";
$headers = "From: PHP Obfuscator Contact <".CONTACT_FROM."> \r\n" ;

mail($emailTo, $subject, $body, $headers);
$emailSent = true;
}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>PHP Obfuscator Contact</title>
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
      /*.jumbotron {
        margin: 60px 0;
        text-align: center;
      }*/
      .jumbotron h1 {
        font-size: 72px;
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
      
      
      
    </style>

 
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
	
	
	<script type="text/javascript" src="js/bootstrap.min.js" ></script>
	  
	
	 
	<script type="text/javascript">
		$(document).ready(function(){
		// validate signup form on keyup and submit
		var validator = $("#contactform").validate({
		errorClass:'error',
		validClass:'success',
		errorElement:'span',
		highlight: function (element, errorClass, validClass) {
		$(element).parents("div[class='clearfix']").addClass(errorClass).removeClass(validClass);
		},
		unhighlight: function (element, errorClass, validClass) {
		$(element).parents(".error").removeClass(errorClass).addClass(validClass);
		},
		rules: {
		contactname: {
		required: true,
		minlength: 2
		},
		email: {
		required: true,
		email: true
		},
		weburl: {
		required: true,
		url: true
		},
		
		subject: {
		required: true
		},
		message: {
		required: true,
		minlength: 10
		}
		},
		messages: {
		contactname: {
		required: '<span class="help-inline">Please enter your name.</span>',
		minlength: jQuery.format('<span class="help-inline">Your name needs to be at least {0} characters.</span>')
		},
		email: {
		required: '<span class="help-inline">Please enter a valid email address.</span>',
		minlength: '<span class="help-inline">Please enter a valid email address.</span>'
		},
		weburl: {
		required: '<span class="help-inline">You need to enter the address to your website.</span>',
		url: jQuery.format('<span class="help-inline">You need to enter a valid URL.</span>')
		},
		
		subject: {
		required: '<span class="help-inline">You need to enter a subject.</span>'
		},
		message: {
		required: '<span class="help-block">You need to enter a message.</span>',
		minlength: jQuery.format('<span class="help-block">Enter at least {0} characters.</span>')
		}
		}
		});
		});
	
	</script>

  
  
  
  </head>

  <body>


    <div class="container-narrow">

	  
      <div class="masthead">
        <ul class="nav nav-pills pull-right">
          <li ><a href="index.php">Home</a></li>
          <li <?php if(curPageName() == 'contact.php'){echo 'class="active"' ;}?> ><a href="contact.php">Contact</a></li>
        </ul>
        <h3 class="muted">PHP Obfuscator</h3>
      </div>
      

      <hr>
      
      <script src="http://ajax.microsoft.com/ajax/jquery.validate/1.7/jquery.validate.pack.js" type="text/javascript"></script>

      <div class="jumbotron">
        <h3>Contact Form</h3>
        
        
        		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="contactform">
				<fieldset>
				<legend>Send Us a Message</legend>
				<?php if(isset($hasError)) { //If errors are found ?>
				<p class="alert-message error">Please check if you've filled all the fields with valid information and try again. Thank you.</p>
				<?php } ?>
				
				<?php if(isset($emailSent) && $emailSent == true) { //If email is sent ?>
				<div class="alert-message success">
				<p><strong>Message Successfully Sent!</strong></p>
				<p>Thank you for using our contact form, <strong><?php echo $name;?></strong>! Your email was successfully sent and we&rsquo;ll be in touch with you soon.</p>
				</div>
				<?php } ?>
				<div class="clearfix">
				<label for="name">
				Your Name<span class="help-required">*</span>
				</label>
				<div class="input">
				<input type="text" name="contactname" id="contactname" value="" class="span6 required" role="input" aria-required="true" />
				</div>
				</div>
				
				<div class="clearfix">
				<label for="email">
				Your Email<span class="help-required">*</span>
				</label>
				<div class="input">
				<input type="text" name="email" id="email" value="" class="span6 required email" role="input" aria-required="true" />
				</div>
				</div>
				<div class="clearfix">
				<label for="weburl">
				Your Website<span class="help-required">*</span>
				</label>
				<div class="input">
				<input type="text" name="weburl" id="weburl" value="" class="span6 required url" role="input" aria-required="true" />
				</div>
				</div>
				
				<div class="clearfix">
				<label for="subject">
				Subject<span class="help-required">*</span>
				</label>
				<div class="input">
				<input name="subject" id="subject" class="span6 required" type="text" aria-required="true" />
				</div>
				</div>
				
				<div class="clearfix">
				<label for="message">Message<span class="help-required">*</span></label>
				<div class="input">
				<textarea rows="8" name="message" id="message" class="span10 required" role="textbox" aria-required="true"></textarea>
				</div>
				</div>
				<div class="actions">
				<input type="submit" value="Send Your Message" name="submit" id="submitButton" class="btn primary" title="Click here to submit your message!" />
				<input type="reset" value="Clear Form" class="btn" title="Remove all the data from the form." />
				</div>
				
				
				<input type="hidden" value="" name="anti"  />
				
				
				</fieldset>
				</form>
        	
		
		
      </div>
      
   

     
      <div class="footer">
        <p>&copy; Pl4g4 <?php echo date('Y'); ?></p>
      </div>

    </div> <!-- /container -->
        
        
       
 

      


 

  </body>
</html>
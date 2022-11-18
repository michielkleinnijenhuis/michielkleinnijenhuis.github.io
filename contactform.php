<?php

if(isset($_POST['user_email'])) {
 
    $email_to = "michiel.kl@gmail.com";
    $email_subject = "MK website";
 
 
    function died($error) {
        echo "Sorry, but the form you submitted contained the error(s) listed below: ";
        echo "<br /><br />";
        echo $error."<br /><br />";
        echo "Please fix these errors and resubmit the form.<br /><br />";
        die();
    }
 
    if(!isset($_POST['user_name']) ||
        !isset($_POST['user_email']) ||
        !isset($_POST['user_subject']) ||
        !isset($_POST['user_message'])) {
        died('Sorry, but there appears to be a problem with the form you submitted.');
    }
 
 
    $user_name = $_POST['user_name']; // required
    $user_email = $_POST['user_email']; // required
    $user_subject = $_POST['user_subject']; // required
    $user_message = $_POST['user_message']; // required
 
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$user_email)) {
    $error_message .= 'The e-mail address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$user_name)) {
    $error_message .= 'The name you entered does not appear to be valid.<br />';
  }
 
  if(strlen($user_subject) < 2) {
    $error_message .= 'The subject you entered does not appear to be valid.<br />';
  }
 
  if(strlen($user_message) < 2) {
    $error_message .= 'The message you entered does not appear to be valid.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below.\n\n";
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
    $email_message .= "Name: ".clean_string($user_name)."\n";
    $email_message .= "Email: ".clean_string($user_email)."\n";
    $email_message .= "Message: ".clean_string($user_message)."\n";
 
$headers = 'From: '.$user_email."\r\n".
'Reply-To: '.$user_email."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $user_subject, $email_message, $headers);
 
?>
 
Thank you for contacting me. I will be in touch soon.
 
<?php
 
}
 
?>
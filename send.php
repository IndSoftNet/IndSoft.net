<?php
require 'mail/PHPMailerAutoload.php';
//require 'class.pop3.php';
//require_once 'class.smtp.php';
//include('Mail.php');
include('pear.php');

  //declare our variables
  $name = $_POST['your-name'];
  $email = $_POST['your-email'];
  $telephone = $_POST['your-phone'];
  $company_name = $_POST['company-name'];
  $website = $_POST['website'];
  $pageviews = $_POST['pageviews'];
  $country = $_POST['country'];
  $message = $_POST['your-message'];

 $contacts = array(
 "$email",
 //"dattatrayh@gmail.com"
 );

 foreach($contacts as $contact) {
 $to = $contact; 
 
 
 $from = "webmaster@events.tradefinex.org";
 //$to = "dattatrayh@gmail.com";
 $subject = "Contact form filled on events.tradefinex.org";
 $body = "Hello $name,<br>
  We received your email request!
  <br>Our team member will get back to you as soon as possible.<br>
  Thank you!<br><br><br>
  Name :- $name<br><br>
  E-mail :- $email<br><br>
  I'm interested in :- $company_name<br><br>
  Message :- $message<br>";
}

 $host = "207.182.142.230";
 $smtpinfo["auth"] = true;
 $smtpinfo["username"] = "krama@mail01-b.internetempower.com";
 $smtpinfo["password"] = "krama852";

 $headers = array ('From' => $from,'To' => $to,'Subject' => $subject);
 //$smtp = mail::factory('smtp',array ('host' => $host,'auth' => true,'username' => $username,'password' => $password));

 $mail = new PHPMailer();

	$mail->IsSMTP(); // telling the class to use SMTP
	$mail->IsHTML(true);
	$mail->Host       = "207.182.142.230"; // SMTP server
  	
	$mail->From       = $from;
	$mail->FromName   = "webmaster@events.tradefinex.org";
	$mail->Subject    = $subject;

	$mail->MsgHTML($body);
	
	$mail-> AddBCC ("info@xinfin.org", "events@tradefinex.org");
	
	$mail->AddReplyTo ($email);

	$mail->AddAddress($to, $to);

	//$mail->Send();

 	$mail->send($to, $headers, $body);

 //$mail->send($to, $headers, $body);
 // $mail = $smtp->send($to, $headers, $body);


  if (pear::isError($mail))
   {echo("<p>" . $mail->getMessage() . "</p>");}
  else
   {echo("<p>Message successfully sent!</p>");}

?>
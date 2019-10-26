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

 $to = 'support@indsoft.net'; 
 $from = $email;
 $subject = "Contact form filled on events.tradefinex.org";
 $body = "Hello $name,<br>
  We received an email request!
  <br><br><br><br>
  Name :- $name<br><br>
  E-mail :- $email<br><br>
  Mobile Number :- $telephone<br><br>
  Company :- $company_name<br><br>
  Website :- $website<br><br>
  Pageviews :- $pageviews<br><br>
  Country :- $country<br><br>
  Message :- $message<br>";

 $host = "mail-b01.cloudmailbox.in";
 $smtpinfo["auth"] = true;
 $smtpinfo["username"] = "indsoft@mail-b01.cloudmailbox.in";
 $smtpinfo["password"] = "Ind@mb01#$039";

 $headers = array ('From' => $from,'To' => $to,'Subject' => $subject);
 //$smtp = mail::factory('smtp',array ('host' => $host,'auth' => true,'username' => $username,'password' => $password));

 $mail = new PHPMailer();

	$mail->IsSMTP(); // telling the class to use SMTP
	$mail->IsHTML(true);
	$mail->Host       = "mail-b01.cloudmailbox.in"; // SMTP server
  	
	$mail->From       = $from;
	$mail->FromName   = $from;
	$mail->Subject    = $subject;

	$mail->MsgHTML($body);
	
	$mail->AddReplyTo ($email);

  $mail->AddAddress($to, $to);
  
  $mail-> AddBCC ("raj@xinfin.org");

	//$mail->Send();

 	$mail->send($to, $headers, $body);

 //$mail->send($to, $headers, $body);
 // $mail = $smtp->send($to, $headers, $body);

  if (pear::isError($mail))
   {echo("<p>" . $mail->getMessage() . "</p>");}
  else
   {echo("<p>Message successfully sent!</p>");}

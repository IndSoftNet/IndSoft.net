<?php
// require 'mail/PHPMailerAutoload.php';
//require 'class.pop3.php';
//require_once 'class.smtp.php';
//include('Mail.php');
// include('pear.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

  //declare our variables
	$name        = (isset($_POST['name'])?$_POST['name']:"");
  $email       = (isset($_POST['email'])?$_POST['email']:"");
  $telephone       = (isset($_POST['phone'])?$_POST['phone']:"");

  $company_name        = (isset($_POST['company'])?$_POST['company']:"");
  $website       = (isset($_POST['website'])?$_POST['website']:"");
  $pageviews       = (isset($_POST['pageviews'])?$_POST['pageviews']:"");

  $country        = (isset($_POST['country'])?$_POST['country']:"");
  $message       = (isset($_POST['message'])?$_POST['message']:"");
  

  $company_name = $_POST['company'];
  $website = $_POST['website'];
  $pageviews = $_POST['pageviews'];
  $country = $_POST['country'];
  $message = $_POST['message'];

 $to = 'support@indsoft.net,mktg@indsoft.net'; 
 $from = $email;
 $subject = "Contact form filled on IndSoft.net";
 $body = "Hello $name,
  We received an email request!
  Name :- $name
  E-mail :- $email
  Mobile Number :- $telephone
  Company :- $company_name
  Website :- $website
  Pageviews :- $pageviews
  Country :- $country
  Message :- $message";

 //TLS Port 587 Change if not TLS
 $mail = new PHPMailer;
 $mail->isSMTP();
 $mail->Host = 'mail-b01.cloudmailbox.in';
 $mail->Port = 587;
 $mail->SMTPAuth = true;
 $mail->Username = 'indsoft@mail-b01.cloudmailbox.in';
 $mail->Password = 'Ind@mb01#$039';
 $mail->setFrom('support@indsoft.net', 'Contact US Form');
 $mail->addAddress(' support@indsoft.net');
 $mail->addAddress('mktg@indsoft.net');
 $mail->addAddress('anil@xinfin.org');
 $mail->Subject = $subject;
 $mail->isHTML(false);
 $mail->Body = $body;
 $mail->addReplyTo($email, $name);

if (!$mail->send()){
  echo  "Fail to sent messagee";
}
else{
  echo "Message successfully sent!";
  // header("Location:https://IndSoft.net/");
}
 
//  $host = "mail-b01.cloudmailbox.in";
//  $smtpinfo["auth"] = true;
//  $smtpinfo["username"] = "indsoft@mail-b01.cloudmailbox.in";
//  $smtpinfo["password"] = "Ind@mb01#$039";


//  $headers = array ('From' => $from,'To' => $to,'Subject' => $subject);
 //$smtp = mail::factory('smtp',array ('host' => $host,'auth' => true,'username' => $username,'password' => $password));

//  $mail = new PHPMailer();

// 	$mail->IsSMTP(); // telling the class to use SMTP
// 	$mail->IsHTML(true);
// 	$mail->Host       = "mail-b01.cloudmailbox.in"; // SMTP server
  	
// 	$mail->From       = $from;
// 	$mail->FromName   = $from;
// 	$mail->Subject    = $subject;

// 	$mail->MsgHTML($body);
	
// 	$mail->AddReplyTo ($email);

//   $mail->AddAddress($to, $to);
  
//   $mail-> AddBCC ("anil@indsoft.net");

	//$mail->Send();

 	// $mail->send($to, $headers, $body);

 //$mail->send($to, $headers, $body);
 // $mail = $smtp->send($to, $headers, $body);

 
  ?>

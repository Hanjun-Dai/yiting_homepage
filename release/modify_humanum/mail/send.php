<?php

// Mail Settings

$host     = 'smtp.126.com'; // e.g. smtp.gmail.com
$username = 'd_dancer'; // e.g. yourname@gmail.com
$password = '5683u4ever'; // your password
$myName   = '小俊比'; // your full name
$myEmail  = 'd_dancer@126.com'; // your e-mail address
$herEmail = 'rabbitxyt@gmail.com';
$herName = '小萌比'
// Most likely, you don't need to modify anything below

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {

	require 'class.phpmailer.php';
	
	$mail = new PHPMailer;
	
	$mail->IsSMTP();
	$mail->Host = $host;
	$mail->SMTPAuth = true;
	$mail->Username = $username;
	$mail->Password = $password;
	$mail->SMTPSecure = 'tls';
	
	$mail->SetFrom($myEmail, $myName);
	$mail->AddReplyTo($_POST['email'], $_POST['name']);
	$mail->AddAddress($herEmail, $herName);
	
	$mail->Subject = 'Message from ' . $_SERVER['SERVER_NAME'];
	$mail->Body = $_POST['message'] . "\r\n\r\n--------------------------------\r\nSent from " . $_SERVER['SERVER_NAME'];
	
	if (!$mail->Send()) {
	   echo 'Message could not be sent.';
	   echo 'Mailer Error: ' . $mail->ErrorInfo;
	   exit;
	}
	
	echo 'success';
	
}
<?php
function Send_Mail($to,$subject,$body)
{
	require 'class.phpmailer.php';
	$from = " sfty@sfty.no";
	$mail = new PHPMailer();
	$mail->IsSMTP(true); // SMTP
	$mail->SMTPAuth   = true;  // SMTP authentication
	$mail->Mailer = "smtp";
	$mail->SMTPDebug = 1;
	$mail->SMTPSecure = 'tls';
	$mail->Host       = "email-smtp.us-east-1.amazonaws.com"; // Amazon SES server, note "tls://" protocol
	$mail->Port       = 25;                    // set the SMTP port
	$mail->Username   = "AKIAJ3ZMJMGI4OUSU4FA";  // SES SMTP  username
	$mail->Password   = "AvVinzF8qUngR7PTHEwBWK0tyQZl8uCM0WdyztOIhxQA";  // SES SMTP password
	$mail->SetFrom($from, 'From Name');
	$mail->AddReplyTo($from,'9lessons Labs');
	$mail->Subject = $subject;
	$mail->MsgHTML($body);
	$address = $to;
	$mail->AddAddress($address, $to);
	if(!$mail->Send())
	echo 'fail';
	else
	echo 'send';

}
?>
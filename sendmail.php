<?php
require("vendor/sendgrid-php/sendgrid-php.php");

 function sendmail($subject,$ToName,$ToEmail,$message)
{
	 $from = new SendGrid\Email("MITSEKURA", "mitsekura@iamaswin.me");
     $apiKey = "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";
	$to = new SendGrid\Email($ToName,$ToEmail,$message);
	$content = new SendGrid\Content("text/plain",$message);
    $mail = new SendGrid\Mail($from, $subject, $to, $content);
    $sg = new \SendGrid($apiKey);
    $response = $sg->client->mail()->send()->post($mail);
	return $response;
}



?>
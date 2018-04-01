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
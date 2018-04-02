<?php
require("vendor/sendgrid-php/sendgrid-php.php");

 function sendmail_parent1($subject,$ToName,$ToEmail,$message)
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

 function sendmail_issued_gatepass($subject,$ToName,$ToEmail,$message)
{
	 $from = new SendGrid\Email("MITSEKURA", "mitsekura@iamaswin.me");
     $apiKey = "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";
	$to = new SendGrid\Email($ToName,$ToEmail,$message);
	$content = new SendGrid\Content(" text/html",$message);
    $mail = new SendGrid\Mail($from, $subject, $to, $content);
    $sg = new \SendGrid($apiKey);
    $response = $sg->client->mail()->send()->post($mail);
	return $response;
}


function sendmail_welcome($subject,$ToName,$ToEmail,$message)
{
	 $from = new SendGrid\Email("MITSEKURA", "mitsekura@iamaswin.me");
     $apiKey = "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";
	$to = new SendGrid\Email($ToName,$ToEmail,$message);
	$content = new SendGrid\Content(" text/html",$message);
    $mail = new SendGrid\Mail($from, $subject, $to, $content);
    $sg = new \SendGrid($apiKey);
    $response = $sg->client->mail()->send()->post($mail);
	return $response;
}



?>
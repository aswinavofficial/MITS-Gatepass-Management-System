<?php
// using SendGrid's PHP Library
// https://github.com/sendgrid/sendgrid-php
// If you are using Composer (recommended)
//require 'vendor/autoload.php';
// If you are not using Composer
require("vendor/sendgrid-php/sendgrid-php.php");
$from = new SendGrid\Email("MITSEKURA", "info@mitsekura.me");
$subject = "Notification from MITS";
$to = new SendGrid\Email("Aswin", "aswinavofficial@gmail.com");
$content = new SendGrid\Content("text/plain", "and easy to do anywhere, even with PHP");
$mail = new SendGrid\Mail($from, $subject, $to, $content);
$apiKey = "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";
$sg = new \SendGrid($apiKey);
$response = $sg->client->mail()->send()->post($mail);
echo $response->statusCode();
print_r($response->headers());
echo $response->body();

?>
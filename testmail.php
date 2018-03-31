<?php
include_once 'sendmail.php';
$subject="hey";
$ToName="Aswin";
$ToEmail="notaswinav@gmail.com";
$message="Test mail";
$response=sendmail($subject,$ToName,$ToEmail,$message);
echo $response->statusCode();
print_r($response->headers());
echo $response->body();


?>
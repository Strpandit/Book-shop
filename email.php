<?php

$name = $_POST['fname'];
$subject = $_POST['sub'];
$fromEmail = $_POST['mail'];
$message = $_POST['msg'];

$mailto = "prashant100ji@gmail.com";

$subject2 ="Mail form Strpandit";

$txt ="Name = ". $name . "\r\n Email = " . $fromEmail . "\r\n Message = " . $message . "\r\n Subject = " . $subject;

$headers = "From: " . $fromEmail;
$headers2 = "From: " . $mailto;

if($fromEmail!=NULL){
    mail($mailto, $subject2, $txt, $headers, $headers2);
    header("Location:index.html");
}
?>
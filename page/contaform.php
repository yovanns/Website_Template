<?php 


if (isset($_POST['submit'])){
	$name = $_POST['name'];
	$subject = $_POST['subject'];
	$mailFrom = $_POST['mail'];
	$message = $_POST['message'];


	$mailTo = "jovan.soskic2@udg.edu.me";
	$headers = "From: ".$mailFrom;
	$txt = "You have receive an email from ".$name.".\n\n".$message;


	mail($mailTo, $subject, $txt, $headers);
	header("Location: contactus.php?mailsend")
}
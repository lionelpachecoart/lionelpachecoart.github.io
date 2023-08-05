<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
	
	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';
	require 'phpmailer/src/SMTP.php';
	
	
	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('en', 'phpmailer/language');
	$mail->IsHTML(true);
	
	//SMTP ajustes
	
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->UserName = 'correogoodvibes@gmail.com';
	$mail->Password = 'pejtnqqrotrpcqfr';
	$mail->Port = 587;
	$mail->SMTPSecure = "TLS";
	
	// ajustes email
	
	$mail->setFrom('correogoodvibes@gmail.com', 'Correo prueba');
	$mail->addAddress("garayjuan7@gmail.com");
	$mail->Subject = 'Mail prueba de adjunto';
	
	
	$body = '<h1>Hola este es un mail de prueba con su archivo adjunto</h1>';

	if(trim(!empty($POST['name']))){
		$body .= "<p>Nombre: <strong>".$_POST['name']."</strong></p>"
	}
	if(trim(!empty($POST['email']))){
		$body .= "<p>E-mail: <strong>".$_POST['email']."</strong></p>"
	}
	if(trim(!empty($POST['message']))){
		$body .= "<p>Mensaje: <strong>".$_POST['message']."</strong></p>"
	}
	if(trim(!empty($POST['like']))){
		$body .= "<p>¿Le gustaria trabajar en Good Vibes? <strong>".$_POST['like']."</strong></p>"
	}
	if(trim(!empty($POST['accept']))){
		$body .= "<strong><a href='https://www.goodvibes24.com'>Volver</a></strong>"
	}


	//Add file 

	if(trim(!empty($FILES['data']['tmp_name']))){
		$fileTmpName = $FILES['data']['tmp_name'];
		$fileName = $FILES['data']['name'];
		$mail->addAttachment($fileTmpName, $fileName);
	}

	$mail->Body = $body;

	$mail->send();
	$mail->smtpClose();

?>
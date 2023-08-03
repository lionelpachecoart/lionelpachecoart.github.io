<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
	
	require 'phpMailer/src/Exception.php';
	require 'phpMailer/src/PHPMailer.php';
	require 'phpMailer/src/SMTP.php';
	
	
	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->setLanguage('es', 'phpmailer/language');
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
	
	$mail->setFrom('correogoodvibes@gmail.com', 'Code Only Test');
	$mail->addAddress("garayjuan7@gmail.com");
	$mail->Subject = 'Mail prueba de adjunto';
	
	
	$body = '<h1>Hola este es un mail de prueba con su archivo adjunto</h1>';

	if(trim(!empty($POST['nombre']))){
		$body .= "<p>Nombre: <strong>".$_POST['nombre']."</strong></p>"
	}
	if(trim(!empty($POST['email']))){
		$body .= "<p>E-mail: <strong>".$_POST['email']."</strong></p>"
	}
	if(trim(!empty($POST['mensaje']))){
		$body .= "<p>Mensaje: <strong>".$_POST['mensaje']."</strong></p>"
	}
	if(trim(!empty($POST['opcion']))){
		$body .= "<p>Elija una opcion: <strong>".$_POST['opcion']."</strong></p>"
	}
	if(trim(!empty($POST['elmejor']))){
		$body .= "<strong><a href='https://www.goodvibes24.com'>Ir a GoodVibes24</a></strong>"
	}


	//Add file 

	if(trim(!empty($FILES['file']['tmp_name']))){
		$fileTmpName = $FILES['file']['tmp_name'];
		$fileName = $FILES['file']['name'];
		$mail->addAttachment($fileTmpName, $fileName);
	}

	$mail->Body = $body;

	$mail->send();
	$mail->smtpClose();

?>
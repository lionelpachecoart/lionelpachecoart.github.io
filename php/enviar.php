<?php 
 $to = "garayjuan7@hotmail.com"; 
 $from = $_REQUEST['correo'] ; 
 $name = $_REQUEST['nombre'] ;
 $coment = $_REQUEST['mensaje'] ; 
 $headers = "From: $from"; 
 $subject = "Form test pachecoart"; 
 
 $fields = array(); 
 $fields{"nombre"} = "Nombre"; 
 $fields{"correo"} = "Correo";
 $fields{"comentario"} = "Mensaje"; 
 
 $body = "Hemos recibido la siguiente informacion:\n\n"; foreach($fields as $a => $b){ 	$body .= sprintf("%20s: %s\n",$b,$_REQUEST[$a]); } 
 
 $headers2 = "From: cordobaprod@yahoo.com.ar"; 
 $subject2 = "Gracias por contactarse con nosotros"; 
 $autoreply = "Le agradecemos por habernos contactado. Le responderemos a la brevedad si tiene alguna duda por favor consulte www.los4decordoba.com";
 
 if($from == '') {echo "No ha ingresado un email, por favor trate de nuevo";} 
 else { 
 if($name == '') {echo "No ha ingresado un nombre, por favor trate de nuevo";} 
 else {
 if($coment == '') {echo "No ha ingresado un comentario, por favor trate de nuevo";} 
 else {  
 
 $send = mail($to, $subject, $body, $headers);
 $send2 = mail($from, $subject2, $autoreply, $headers2);  
 if($send) 
	{header( "Location: https://www.google.com" );}
 else 
      {header( "Location: https://es-la.facebook.com" );} 
  }
 }
}
?>
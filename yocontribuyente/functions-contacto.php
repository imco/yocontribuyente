<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/yocontribuyente/functions/default.php';

function agregaVoto( $source ){
	$limpia = new limpieza();


	if( isset($source['nombre_input']) && $limpia->chechaNombreApellido($source['nombre_input']) )
		$varLimpias['nombre_input'] = $source['nombre_input'];
	else
		$varNoLimpias['nombre_input'] = '1';
	
	if( isset($source['apellidos_input']) && $limpia->chechaNombreApellido($source['apellidos_input']) )
		$varLimpias['apellidos_input'] = $source['apellidos_input'];
	else
		$varNoLimpias['apellidos_input'] = '1';
		
	if( isset($source['email_input']) && $limpia->checaCorreo($source['email_input']) )
		$varLimpias['email_input'] = $source['email_input'];
	else
		$varNoLimpias['email_input'] = '1';
		
	if( isset($source['asunto_input']) && $limpia->chechaNombreApellido($source['asunto_input']) )
		$varLimpias['asunto_input'] = $source['asunto_input'];
	else
		$varNoLimpias['asunto_input'] = '1';
		
	if( isset($source['mensaje_input']) && $limpia->chechaNombreApellido($source['mensaje_input']) )
		$varLimpias['mensaje_input'] = $source['mensaje_input'];
	else
		$varNoLimpias['mensaje_input'] = '1';
	
	if( !isset($varNoLimpias) ){
		require_once $_SERVER['DOCUMENT_ROOT'].'/yocontribuyente/functions/sendgrid-php/SendGrid_loader.php';
		$sendgrid = new SendGrid('imcomx', 'Imco12345');
		$mail = new SendGrid\Mail();
		$mail->addTo('contacto@imco.org.mx')->
		       setFrom($varLimpias['email_input'])->
		       setSubject($varLimpias['asunto_input'])->
		       setText($varLimpias['mensaje_input'])->
		       setHtml($varLimpias['mensaje_input']);
		return $sendgrid->web->send($mail);		
	}else#variables no limpias
		return json_encode($varNoLimpias);
}

$source = &$_GET;

if( isset($source['contacto']) ){
	echo agregaVoto( $source );
}
?>

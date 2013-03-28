<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/yocontribuyente/functions/default.php';

function agregaVoto( $source ){
	$limpia = new limpieza();
	$base = new db();
	$base->create_connection();
	if($base->checkDBConnection() ){
		if( isset($source['nombre_input']) && $limpia->chechaNombreApellido($source['nombre_input']) )
			$varLimpias['nombre_input'] = $base->sanitize( $source['nombre_input'] );
		else
			$varNoLimpias['nombre_input'] = '1';
		
		if( isset($source['apellidos_input']) && $limpia->chechaNombreApellido($source['apellidos_input']) )
			$varLimpias['apellidos_input'] = $base->sanitize( $source['apellidos_input'] );
		else
			$varNoLimpias['apellidos_input'] = '1';
			
		if( isset($source['email_input']) && $limpia->checaCorreo($source['email_input']) )
			$varLimpias['email_input'] = $base->sanitize( $source['email_input'] );
		else
			$varNoLimpias['email_input'] = '1';
			
		if( isset($source['cp_input']) && $limpia->checaCP($source['cp_input']) )
			$varLimpias['cp_input'] = $base->sanitize( $source['cp_input'] );
		else
			$varNoLimpias['cp_input'] = '1';
		
		if( !isset($varNoLimpias) ){
	
			$ip = $base->sanitize( $limpia->regresaIP() );
			
			$query = "INSERT INTO firmas_4mp4r0 (nombre,apellido,correoElectronico,codigoPostal,cartaSenador,mostrarFirma,direccionRed) VALUES (
					  '".$varLimpias['nombre_input']."',
					  '".$varLimpias['apellidos_input']."',
					  '".$varLimpias['email_input']."',
					  '".$varLimpias['cp_input']."',
					  1,
					  1,
					  '".$ip."'
					  )";
			$result = $base->query_db($query);
			if( $result!=false ){
				return json_encode(array('exito'=>'1'));
			}else#no inserto porque ya existia el registro, servicio saturado, etc.
				return json_encode(array('error'=>'2'));
		}else#variables no limpias
			return json_encode($varNoLimpias);
	}else#sin base de datos
		return json_encode(array('error'=>'1'));
}

function regresaContador(){
	$base = new db();
	$base->create_connection();
	$count = -1;
	if($base->checkDBConnection() ){
		$query = "SELECT count(*) from firmas_4mp4r0";
		$result = $base->query_db($query);
		if( $result!=false && $result->num_rows > 0 ){
			$aux = $result->fetch_assoc();
			$count = $aux['count(*)'];
		}
	}
	return json_encode(array('firmas'=>$count));
}

$source = &$_GET;

if( isset($source['firma']) ){
	echo agregaVoto( $source );
}elseif( isset($source['cuenta']) ){
	echo regresaContador();
}

?>

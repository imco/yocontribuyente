<?php
class limpieza{
	function chechaNombreApellido( $string ){
		return ( (strlen( trim($string) ) >0 && strlen( trim($string) ) < 255)? true: false );
	}
	
    function checaCorreo( $string ){ 
        return (filter_var( $string, FILTER_VALIDATE_EMAIL )==$string?true:false) ;
    }
    
    function checaCP( $string ){
        return ( (ctype_digit((string)$string) && strlen($string)==5)?true:false);
    }
    
    function checaCheckBox( $string, $activo=1, $apagado=0 ){
        return ( $string==$activo?$activo:$apagado );
    }
    
    function regresaIP(){
        if (!empty($_SERVER['HTTP_CLIENT_IP'])){
            return $_SERVER['HTTP_CLIENT_IP'];
        }
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
        return $_SERVER['REMOTE_ADDR'];
    }
}
?>

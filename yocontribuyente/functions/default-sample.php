<?php
#if( $_SERVER['HTTP_HOST']=='imco.org.mx' )
	define('VUL_HOST', 'host-bd');
#else
#	define('VUL_HOST', '174.143.132.198');
	
define('VUL_USERNAME', 'usuario-bd');
define('VUL_PASSWORD', 'contraseña-bd');
define('VUL_NAME', 'nombre-de-la-bd');

function __autoload($class_name) {
    require_once $_SERVER['DOCUMENT_ROOT'].'/yocontribuyente/functions/classes/'.$class_name . '.php';
}
?>

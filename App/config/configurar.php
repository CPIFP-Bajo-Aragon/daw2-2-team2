<?php 
// Desarrollo 
ini_set('display_errors' ,1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Desarrollo 


define ('RUTA_APP', dirname(dirname(__FILE__)));


//-----------------CAMBIAR ESTO-----------------------------

//define ('RUTA_URL', 'http://localhost/mvc_completo_23-24');
define ('RUTA_URL', 'http://192.168.18.120');
define ('RUTA_PERFIL', '/var/www/html/public/images/fotoperfil/');
define ('RUTA_URL_IMAGENES', RUTA_URL.'/images');

//Nombre del sitio
define ('NOMBRE_SITIO',  'Web Alquiler y Traspasos Bajo Aragon');

//Configuracion Base de Datos
define ('DB_HOST', 'localhost');
define ('DB_USUARIO', 'team2');
define ('DB_PASSWORD', 'team2');
define ('DB_NOMBRE', 'bdcomarca');

//Tamaño paginacion
define('TAM_PAGINA', 2);
<?php 
// Desarrollo 
ini_set('display_errors' ,1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Desarrollo 


define ('RUTA_APP', dirname(dirname(__FILE__)));
define('RUTA_PUBLIC', dirname(dirname(dirname(__FILE__)))); //Arreglar


//-----------------CAMBIAR ESTO-----------------------------

//define ('RUTA_URL', 'http://localhost/mvc_completo_23-24');
define ('RUTA_URL', 'https://TU-IP');
define ('RUTA_PERFIL', RUTA_PUBLIC.'/public/images/fotoperfil/');
define ('RUTA_IMMUEBLES', RUTA_PUBLIC.'/public/images/fotoinmueble/');
define ('RUTA_IMMUEBLESBD','/images/fotoinmueble/');
define ('RUTA_URL_IMAGENES', RUTA_URL.'/images');
define ('RUTA_URL_DOCUMENTOS', RUTA_PUBLIC.'/public/DocumentoUsuario/');


//Nombre del sitio
define ('NOMBRE_SITIO',  'Web Alquiler y Traspasos Bajo Aragon');

//Configuracion Base de Datos
define ('DB_HOST', 'BASE-DE-DATOS');
define ('DB_USUARIO', 'USUARIO');
define ('DB_PASSWORD', 'CONTRASEÑA');
define ('DB_NOMBRE', 'mydb');

//Tamaño paginacion
define('TAM_PAGINA', 3);
define('TAM_PAGINA_MEDIANO', 5);
define('TAM_PAGINA_GRANDE', 10);


//Clave de cifrado
define('PSSWD_HASH', CONTRASEÑA-HASH);


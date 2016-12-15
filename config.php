
<?php
/**
 * Archivo de configuracion global
 */
// instanciamos la clase singleton
$config = Config::singleton();

date_default_timezone_set("America/La_Paz");
// parametros de configuracion para el mvc
$config->set('controllers', 'controllers/');
$config->set('views', 'views/');
$config->set('models', 'models/');

$config->set('dbhost', 'localhost');
$config->set('dbname', 'sistema');
$config->set('dbuser', 'root');
$config->set('dbport','3306');
$config->set('dbpass', '123');
/*
$config->set('dbhost', 'mysql.hostinger.es');
$config->set('dbname', 'u384178064_siste');
$config->set('dbuser', 'u384178064_johan');
$config->set('dbport','');
$config->set('dbpass', 'ivoncita1');
*/
$config->set('url','http://localhost/tienda/');
$config->set('imagenruta','imagenes/producto/');


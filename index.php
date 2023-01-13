<?php
require 'vendor/autoload.php';
$router = new AltoRouter();
$router->setBasePath('/paye-ton-kawa-api-php');
$router->map('GET', '/', [new ControllerHome, "home"]);
$match = $router->match();
if( is_array($match) && is_callable( $match['target'] ) ) {
	call_user_func_array( $match['target'], $match['params'] ); 
} else {
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
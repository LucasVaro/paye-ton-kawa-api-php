<?php
require '../vendor/autoload.php';

// ALLOW CORS

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Content-type: text/html; charset=UTF-8'); 
header('Access-Control-Allow-Headers: X-Requested-With');

require 'Model/constant.php';
use Api\Controller\ControllerRouter;

$instanceRouteur = new ControllerRouter;
$instanceRouteur->route();
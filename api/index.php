<?php
require '../vendor/autoload.php';
use Api\Controller\ControllerRouter;

$instanceRouteur = new ControllerRouter;
$instanceRouteur->route();
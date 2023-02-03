<?php
require '../vendor/autoload.php';
require 'Model/constant.php';
use Api\Controller\ControllerRouter;

$instanceRouteur = new ControllerRouter;
$instanceRouteur->route();
<?php
namespace Api\Controller;
class ControllerSwagger
{
    public function generateDocumentation()
    {
        require("../vendor/autoload.php");
        $openapi = \OpenApi\Generator::scan(['../api']);
        header('Content-Type: application/json');
        echo $openapi->toJson();
    }
}
<?php
namespace Api\Controller;

use AltoRouter;
class ControllerRouter
{
    /**
    * @OA\Info(
    *       title="Revendeurs API",
    *       description="L'API revendeurs est l'api qui va communiquer avec les revendeurs et en l'occurence, exclusivement à l'application mobile. Elle va communiquer avec l'ERP.",
    *       version="1.0.0",
    * )
    * @OA\Server(
    *     url="http://localhost:8888/paye-ton-kawa-api-php/api/",
    *     description="Serveur local",
    * )
    */
    public function route()
    {
        $router = new AltoRouter();
        $router->setBasePath('/paye-ton-kawa-api-php/api');
        $router->map('GET', '/', [new ControllerHome, "home"]);
        $router->map('GET', '/generate/documentation', [new ControllerSwagger, "generateDocumentation"]);
        $router->map('GET', '/documentation', [new ControllerDocumentation, "documentation"]);
        $match = $router->match();
        if (is_array($match) && is_callable($match['target'])) {
            call_user_func_array($match['target'], $match['params']);
        } else {
            header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
        }
    }
}
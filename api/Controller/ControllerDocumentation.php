<?php
namespace Api\Controller;
class ControllerDocumentation {
    public function documentation(): void
    {
        echo file_get_contents('View/Swagger/index.html');
    }
}
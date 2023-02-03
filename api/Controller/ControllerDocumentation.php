<?php
namespace Api\Controller;
class ControllerDocumentation {
    public function documentation() {
        echo file_get_contents('View/Swagger/index.html');
    }
}
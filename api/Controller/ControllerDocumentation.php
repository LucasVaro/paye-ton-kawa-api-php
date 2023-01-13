<?php
class ControllerDocumentation {
    public function documentation() {
        // var_dump($page);
        echo file_get_contents('View/Swagger/index.html');
    }
}
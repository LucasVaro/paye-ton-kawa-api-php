<?php
Class ControllerHome {
    function __construct() {
        
    }

    public function home() {
        ModelSendResponse::sendResponse(array("api" => "welcome to kawa api"));
    }
}
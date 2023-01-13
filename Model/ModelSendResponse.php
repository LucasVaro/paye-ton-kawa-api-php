<?php 
class ModelSendResponse {
    public static function sendResponse(array $response): void
    {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($response);
    }
}
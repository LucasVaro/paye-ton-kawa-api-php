<?php
namespace Api\Controller;

use Api\Model\ModelERP;
use Api\Model\ModelSendResponse;

class ControllerERP
{
    private string $apiKey = "1234";

    function __construct()
    {
        $apiKey = getallheaders()['secret'] ?? $this->unauthorized();
        if ($apiKey != $this->apiKey) {
            $this->unauthorized();
        }
    }

    private function unauthorized(): void
    {
        header("HTTP/1.1 401 Unauthorized");
        exit;
    }

    public function getCustomers(): void
    {
        $instanceModelERP = new ModelERP;
        $customers = $instanceModelERP->getCustomers();
        ModelSendResponse::sendResponse($customers);
    }

    public function getOrdersByCustomerId(string $customerId): void
    {
        $instanceModelERP = new ModelERP;
        $orders = $instanceModelERP->getOrdersByCustomerId($customerId);
        ModelSendResponse::sendResponse($orders);
    }

    public function getProductsByOrderIdByCustomerId(string $customerId, string $orderId): void
    {
        $instanceModelERP = new ModelERP;
        $products = $instanceModelERP->getProductsByOrderIdByCustomerId($customerId, $orderId);
        ModelSendResponse::sendResponse($products);
    }

    public function getProducts(): void
    {
        $instanceModelERP = new ModelERP;
        $products = $instanceModelERP->getProducts();
        ModelSendResponse::sendResponse($products);
    }

    public function getProductsByIdProduct(string $idProduct): void
    {
        $instanceModelERP = new ModelERP;
        $product = $instanceModelERP->getProductsByIdProduct($idProduct);
        ModelSendResponse::sendResponse($product);
    }
}
<?php
namespace Api\Controller;

use Api\Model\ModelERP;
use Api\Model\ModelSendResponse;

class ControllerERP
{
    private string $apiKey = API_KEY;

    function __construct()
    {
    }

    private function checkAuthorisation() {
        $apiKey = getallheaders()['secret'] ?? $this->unauthorized();
        if ($apiKey != $this->apiKey) {
            $this->unauthorized();
        }
    }
    private function unauthorized(): void
    {
        // header("HTTP/1.1 401 Unauthorized");
        // exit;
    }

    public function getCustomers(): void
    {
        $this->checkAuthorisation();
        $instanceModelERP = new ModelERP;
        $customers = $instanceModelERP->getCustomers();
        ModelSendResponse::sendResponse($customers);
    }

    public function getOrdersByCustomerId(string $customerId): void
    {
        $this->checkAuthorisation();
        $instanceModelERP = new ModelERP;
        $orders = $instanceModelERP->getOrdersByCustomerId($customerId);
        ModelSendResponse::sendResponse($orders);
    }

    public function getProductsByOrderIdByCustomerId(string $customerId, string $orderId): void
    {
        $this->checkAuthorisation();
        $instanceModelERP = new ModelERP;
        $products = $instanceModelERP->getProductsByOrderIdByCustomerId($customerId, $orderId);
        ModelSendResponse::sendResponse($products);
    }

    public function getProducts(): void
    {
        $this->checkAuthorisation();
        $instanceModelERP = new ModelERP;
        $products = $instanceModelERP->getProducts();
        ModelSendResponse::sendResponse($products);
    }

    public function getProductsByIdProduct(string $idProduct): void
    {
        $this->checkAuthorisation();
        $instanceModelERP = new ModelERP;
        $product = $instanceModelERP->getProductsByIdProduct($idProduct);
        ModelSendResponse::sendResponse($product);
    }
}
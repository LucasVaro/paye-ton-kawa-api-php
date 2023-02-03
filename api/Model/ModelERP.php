<?php
namespace Api\Model;

class ModelERP extends ModelRequest{
    private string $baseUrl;

    function __construct() {
        $this->baseUrl = "https://615f5fb4f7254d0017068109.mockapi.io/api/v1/";
    }

    public function getCustomers(): array
    {
        $url = $this->baseUrl."customers";
        $this->setUrl($url);
        return $this->get();
    }

    public function getOrdersByCustomerId(string $customerId): array
    {
        $url = $this->baseUrl."customers/".$customerId.'/orders';
        $this->setUrl($url);
        return $this->get();
    }

    public function getProductsByOrderIdByCustomerId(string $customerId, string $orderId): array
    {
        $url = $this->baseUrl."customers/".$customerId."/orders/".$orderId."/products";
        $this->setUrl($url);
        return $this->get();
    }

    public function getProducts(): array
    {
        $url = $this->baseUrl."products";
        $this->setUrl($url);
        return $this->get();
    }

    public function getProductsByIdProduct(string $idProduct): array
    {
        $url = $this->baseUrl."products/".$idProduct;
        $this->setUrl($url);
        return $this->get();
    }


}
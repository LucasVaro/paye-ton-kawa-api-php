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





}
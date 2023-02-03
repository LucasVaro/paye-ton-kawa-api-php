<?php
namespace Api\Model;

class ModelRequest
{
    private string $url;
    private string $method;

    protected function setUrl(string $url): void
    {
        $this->url = $url;
    }

    private function setMethod(string $method): void
    {
        $this->method = $method;
    }

    protected function get(): array
    {
        $this->setMethod("GET");
        return json_decode($this->curl(), true);
    }

    private function curl() {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $this->method,
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }


}
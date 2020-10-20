<?php

namespace WebforceHQ\OrderDesk;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\ClientException;
use WebforceHQ\OrderDesk\Exceptions\UnsetRequestException;


class OrderDeskRequest
{
    protected $api_key;
    protected $store_id;
    protected $headers;
    const URL = "https://app.orderdesk.me/api/v2/";

    protected function setUpHttpClient(){
        $this->setDefaultHeaders();
        $this->getClient();
    }

    private function getClient($params = null)
    {
        $this->client = new Client([
            'base_uri'  => self::URL,
            'headers'   => $this->headers
        ]);
    }
    
    private function setDefaultHeaders()
    {
        $this->headers = [
            'ORDERDESK-STORE-ID'    => $this->store_id,
            'ORDERDESK-API-KEY'     => $this->api_key,
            'content-type'          => 'application/json',
        ];

    }

    public function isOnline(){
        $this->currentRequest = new Request('POST', self::URL."test", $this->headers);
        return $this;
    }

    public function post($endpoint, $payload)
    {
        $payload = json_encode($payload);
        $this->currentRequest = new Request('POST', self::URL.$endpoint, $this->headers, $payload);
        return $this;
    }

    public function get($endpoint)
    {
        $this->currentRequest = new Request('GET', self::URL.$endpoint, $this->headers);
        return $this;
    }

    public function delete($endpoint)
    {
        $this->currentRequest   = new Request("DELETE", self::URL.$endpoint, $this->headers);
        return $this;
    }

    public function put($endpoint, $payload)
    {
        $payload = json_encode($payload);
        $this->currentRequest   = new Request('PUT', $endpoint, $this->headers, $payload);
        return $this;
    }

    protected function sendRequest(){
        if ( ! $this->currentRequest ) {
            throw new UnsetRequestException();
        }
        $responseObj = new \stdClass();
        try {
            $response = $this->client->send($this->currentRequest);
            $responseObj->success = true;
            $responseObj->code = $response->getStatusCode();
            $responseObj->body = json_decode($response->getBody());
        } catch (ClientException $e) {
            $response       = $e->getResponse();
            $responseObj->code = $response->getStatusCode();
            $responseObj->body   = json_decode($response->getBody()->getContents());
            $responseObj->success = false;
        } finally {
            return $responseObj;
        }
    }

    protected function setQuery($parameters){
        $queryParams = "";
        if(empty($parameters)){
            return $queryParams;
        }
        $paramsLength = count($parameters);
        $counter = 0;
        foreach($parameters as $key => $value){
            $queryParams .= "{$key}={$value}";
            if( $counter < $paramsLength - 1 ){
              $queryParams .= "&";
            }
            $counter++;
        }
        return $queryParams;
    }
    
}

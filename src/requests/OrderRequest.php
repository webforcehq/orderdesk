<?php

namespace WebforceHQ\OrderDesk\Requests;

use WebforceHQ\OrderDesk\Models\Order;
use WebforceHQ\OrderDesk\OrderDeskRequest;
use WebforceHQ\OrderDesk\Exceptions\OrderDeskUnsetIdentifierException;

class OrderRequest extends OrderDeskRequest
{
    private const ENDPOINT = 'orders';

    public function __construct($storeId, $apiKey)
    {
       $this->api_key  = $apiKey;
       $this->store_id = $storeId;
       $this->setUpHttpClient();
    }
    
    public function create(Order $order){
        
        return $this->post(self::ENDPOINT, $order->toArray())->sendRequest();
        
    }

    public function read($id){

        if( ! $id ){
            throw new OrderDeskUnsetIdentifierException();
        }
        return $this->get(self::ENDPOINT."/{$id}")->sendRequest();

    }

    public function readUsingParams(array $parameters){

        $queryParams = $this->setQuery($parameters);

        return $this->get(self::ENDPOINT."{$queryParams}")->sendRequest();

    }

    public function update($id, Order $order){

        if( ! $id ){
            throw new OrderDeskUnsetIdentifierException();
        }
        
        return $this->put(self::ENDPOINT."/{$id}", $order->toArray())->sendRequest();

    }

    public function destroy($id){

        if( ! $id ){
            throw new OrderDeskUnsetIdentifierException();
        }
        return $this->delete(self::ENDPOINT."/{$id}")->sendRequest();

    }

    public function list(){
    
        return $this->get(self::ENDPOINT)->sendRequest();

    }

}

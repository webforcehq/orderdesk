<?php

namespace WebforceHQ\OrderDesk\Requests;

use WebforceHQ\OrderDesk\Models\OrderItem;
use WebforceHQ\OrderDesk\OrderDeskRequest;
use WebforceHQ\OrderDesk\Exceptions\OrderDeskUnsetIdentifierException;

class OrderItemRequest extends OrderDeskRequest
{

    private const ENDPOINT = 'orders';
    
    public function __construct($storeId, $apiKey)
    {
       $this->api_key  = $apiKey;
       $this->store_id = $storeId;
       $this->setUpHttpClient();
    }

    public function create($orderId, OrderItem $orderItem)
    {
        if( ! $orderId ){
            throw new OrderDeskUnsetIdentifierException();
        }
        
        return $this->post(self::ENDPOINT."/{$orderId}/order-items", $orderItem->toArray())->sendRequest();

    }

    public function read(int $orderId, int $orderItemId)
    {
        if( ! $orderId ){
            throw new OrderDeskUnsetIdentifierException();
        }

        if( ! $orderItemId ){
            throw new OrderDeskUnsetIdentifierException("Order Item does not have an ID related when trying to read shipment from order");
        }

        return $this->get(self::ENDPOINT."/{$orderId}/order-items/{$orderItemId}")->sendRequest();

    }

    /**
     * All fields should be passed through. Any empty fields will be set to blank on the record.
     */
    public function update(int $orderId, OrderItem $orderItem){

        if( ! $orderId ){
            throw new OrderDeskUnsetIdentifierException();
        }

        $orderItemId = $orderItem->getId();
        if( ! $orderItemId ){
            throw new OrderDeskUnsetIdentifierException("Shipment does not have an ID related when trying to update shipment order");
        }
        return $this->put(self::ENDPOINT."/{$orderId}/order-items/$orderItemId", $orderItem->toArray())->sendRequest();

    }

    public function destroy(int $orderId, int $orderItemId)
    {
        if( ! $orderId ){
            throw new OrderDeskUnsetIdentifierException();
        }
        if( ! $orderItemId ){
            throw new OrderDeskUnsetIdentifierException("Order Item does not have an ID related when trying to update Order Item from order");
        }
        return $this->delete(self::ENDPOINT."/{$orderId}/order-items/{$orderItemId}")->sendRequest();

    }

    public function list(int $orderId)
    {
        if( ! $orderId ){
            throw new OrderDeskUnsetIdentifierException("Order id not found when trying to list all order items");
        }
        return $this->get(self::ENDPOINT."/{$orderId}/order-items")->sendRequest();

    }

}

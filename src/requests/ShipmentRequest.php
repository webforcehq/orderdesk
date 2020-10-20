<?php

namespace WebforceHQ\OrderDesk\Requests;

use WebforceHQ\OrderDesk\Models\Shipment;
use WebforceHQ\OrderDesk\OrderDeskRequest;
use WebforceHQ\OrderDesk\Exceptions\OrderDeskUnsetIdentifierException;

class ShipmentRequest extends OrderDeskRequest
{

    private const ENDPOINT = 'orders';

    public function __construct($storeId, $apiKey)
    {
       $this->api_key  = $apiKey;
       $this->store_id = $storeId;
       $this->setUpHttpClient();
    }

    public function create($orderId, Shipment $item)
    {
        
        return $this->post(self::ENDPOINT."/{$orderId}/shipments", $item->toArray())->sendRequest();

    }

    public function read(int $orderId, int $shipmentId)
    {
        if( ! $orderId ){
            throw new OrderDeskUnsetIdentifierException();
        }

        if( ! $shipmentId ){
            throw new OrderDeskUnsetIdentifierException("Shipment does not have an ID related when trying to read shipment from order");
        }

        return $this->get(self::ENDPOINT."/{$orderId}/shipments/{$shipmentId}")->sendRequest();

    }

    /**
     * All fields should be passed through. Any empty fields will be set to blank on the record.
     */
    public function update(int $orderId, Shipment $shipment){

        if( ! $orderId ){
            throw new OrderDeskUnsetIdentifierException();
        }

        $shipmentId = $shipment->getId();
        if( ! $shipmentId ){
            throw new OrderDeskUnsetIdentifierException("Shipment does not have an ID related when trying to update shipment order");
        }
        return $this->put(self::ENDPOINT."/{$orderId}/shipments/$shipmentId", $shipment->toArray())->sendRequest();

    }

    public function destroy(int $orderId, int $shipmentId)
    {
        if( ! $orderId ){
            throw new OrderDeskUnsetIdentifierException();
        }
        if( ! $shipmentId ){
            throw new OrderDeskUnsetIdentifierException("Shipment does not have an ID related when trying to update shipment order");
        }
        return $this->delete(self::ENDPOINT."/{$orderId}/shipments/{$shipmentId}")->sendRequest();

    }

    public function list(int $orderId)
    {
        if( ! $orderId ){
            throw new OrderDeskUnsetIdentifierException("Order id not found when trying to list all shipments");
        }
        return $this->get(self::ENDPOINT."/{$orderId}/shipments")->sendRequest();

    }

}

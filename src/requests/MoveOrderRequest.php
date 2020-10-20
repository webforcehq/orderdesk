<?php


namespace WebforceHQ\OrderDesk\Requests;

use WebforceHQ\OrderDesk\Models\MoveOrder;
use WebforceHQ\OrderDesk\OrderDeskRequest;

class MoveOrderRequest extends OrderDeskRequest
{
    private const ENDPOINT = 'move-orders';

    public function __construct($storeId, $apiKey)
    {
       $this->api_key  = $apiKey;
       $this->store_id = $storeId;
       $this->setUpHttpClient();
    }

    public function moveOrder(MoveOrder $object)
    {
        
        return $this->post(self::ENDPOINT, $object->toArray())->sendRequest();

    }

}

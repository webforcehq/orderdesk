<?php


namespace WebforceHQ\OrderDesk\Requests;

use WebforceHQ\OrderDesk\OrderDeskRequest;
use WebforceHQ\OrderDesk\Models\OrderHistory;
use WebforceHQ\OrderDesk\Exceptions\OrderDeskUnsetIdentifierException;

class OrderHistoryRequest extends OrderDeskRequest
{
    private const ENDPOINT = 'orders';

    public function __construct($storeId, $apiKey)
    {
       $this->api_key  = $apiKey;
       $this->store_id = $storeId;
       $this->setUpHttpClient();
    }

    public function create($orderId, OrderHistory $orderHistory)
    {
        if( ! $orderId ){
            throw new OrderDeskUnsetIdentifierException();
        }
        
        return $this->post(self::ENDPOINT."/{$orderId}/order-history", $orderHistory->toArray())->sendRequest();

    }

}

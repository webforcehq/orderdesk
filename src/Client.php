<?php

namespace WebforceHQ\OrderDesk;


use WebforceHQ\OrderDesk\Requests\TestRequest;
use WebforceHQ\OrderDesk\Requests\OrderRequest;
use WebforceHQ\OrderDesk\Requests\ShipmentRequest;
use WebforceHQ\OrderDesk\Requests\MoveOrderRequest;
use WebforceHQ\OrderDesk\Requests\OrderItemRequest;
use WebforceHQ\OrderDesk\Requests\OrderHistoryRequest;
use WebforceHQ\OrderDesk\Requests\InventoryItemsRequest;

class Client
{
    protected $storeId;
    protected $apikey;

    public function __construct($storeId, $apikey)
    {
        $this->storeId = $storeId;
        $this->apikey  = $apikey;
    }    

    public function isOrderDeskOnline()
    {
        return (new TestRequest($this->storeId, $this->apikey))->test();
    }

    public function inventoryItemsApi()
    {
        return new InventoryItemsRequest($this->storeId, $this->apikey);
    }

    public function moveOrderApi()
    {
        return new MoveOrderRequest($this->storeId, $this->apikey);
    }

    public function ordersApi()
    {
        return new OrderRequest($this->storeId, $this->apikey);
    }

    public function orderHistoryApi()
    {
        return new OrderHistoryRequest($this->storeId, $this->apikey);
    }

    public function orderItemsApi()
    {
        return new OrderItemRequest($this->storeId, $this->apikey);
    }

    public function shipmentsApi()
    {
        return new ShipmentRequest($this->storeId, $this->apikey);
    }

}

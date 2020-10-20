<?php

namespace WebforceHQ\OrderDesk\Requests;

use WebforceHQ\OrderDesk\Models\InventoryItem;
use WebforceHQ\OrderDesk\OrderDeskRequest;
use WebforceHQ\OrderDesk\Exceptions\OrderDeskUnsetIdentifierException;

class InventoryItemsRequest extends OrderDeskRequest
{

    private const ENDPOINT = 'inventory-items';

    public function __construct($storeId, $apiKey)
    {
       $this->api_key  = $apiKey;
       $this->store_id = $storeId;
       $this->setUpHttpClient();
    }

    public function create(InventoryItem $item)
    {
        
        return $this->post(self::ENDPOINT, $item->toArray())->sendRequest();

    }

    public function read($id)
    {
        if( ! $id ){
            throw new OrderDeskUnsetIdentifierException();
        }
        return $this->get(self::ENDPOINT."/{$id}")->sendRequest();

    }

    /**
     * All fields should be passed through. Any empty fields will be set to blank on the record.
     */
    public function update(int $id, InventoryItem $item){

        if( ! $id ){
            throw new OrderDeskUnsetIdentifierException();
        }
        
        return $this->put(self::ENDPOINT."/{$id}", $item->toArray())->sendRequest();

    }

    public function destroy(int $id)
    {
        if( ! $id ){
            throw new OrderDeskUnsetIdentifierException();
        }
        return $this->delete(self::ENDPOINT."/{$id}")->sendRequest();

    }

    public function list()
    {
        
        return $this->get(self::ENDPOINT)->sendRequest();

    }

    //TODO:Implement this method
    public function bulkUpdate(InventoryItem ...$items){
        
    }

}

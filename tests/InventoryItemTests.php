<?php

use PHPUnit\Framework\TestCase;

use WebforceHQ\OrderDesk\Client;
use WebforceHQ\OrderDesk\Models\InventoryItem;

class InventoryItemTests extends TestCase{

    private $key;
    private $storeId;

    protected function setUp(): void
    {
        $this->key = "";
        $this->storeId  = "";
    }
    
    public function testConnectionIsSuccessfull(){
        $client = new Client($this->storeId, $this->key);    
        $request = $client->isOrderDeskOnline();
        $this->assertTrue($request->success);
    }

    public function testReadAllInventoryItems(){
        $client = new Client($this->storeId, $this->key);    
        $inventoryItemsApi = $client->inventoryItemsApi();
        $request = $inventoryItemsApi->list();
        $this->assertTrue($request->success);
    }

    public function testCreateInventoryItem(){
        $inventoryItem = $this->buildDemoItem();
        $response = $this->store($inventoryItem);
        $this->assertTrue($response->success);
        $inventoryItem->setId($response->body->inventory_item->id);
        $this->destroy($inventoryItem);
    }

    public function testUpdateInventoryItem(){
        $inventoryItem = $this->buildDemoItem();
        $response = $this->store($inventoryItem);
        $inventoryItem = new InventoryItem;
        $inventoryItem->setId($response->body->inventory_item->id);
        $inventoryItem->setName("Demo Item 1");
        $inventoryItem->setCode("DMO1");
        $inventoryItem->setPrice(100.00);
        $inventoryItem->setCost(100.00);
        $inventoryItem->setWeight(120.5);
        $inventoryItem->setStock(100);
        $inventoryItem->setMetadata([
            "key10"=>"value10",
            "key20"=>"value20"
        ]);
        $inventoryItem->setLocation("MEXICO");
        $inventoryItem->setUpdateSource("WebforceHQ");
        $client = new Client($this->storeId, $this->key);
        $inventoryItemsApi = $client->inventoryItemsApi();
        $response = $inventoryItemsApi->update($inventoryItem->getId(),$inventoryItem);
        $this->assertTrue($response->success);
        $this->destroy($inventoryItem);
    }

    public function testReadInventoryItem(){
        $inventoryItem = $this->buildDemoItem();
        $response = $this->store($inventoryItem);
        $inventoryItem->setId($response->body->inventory_item->id);
        $client = new Client($this->storeId, $this->key);
        $inventoryItemsApi = $client->inventoryItemsApi();
        $response = $inventoryItemsApi->read($inventoryItem->getId());
        $this->assertTrue($response->success);
        $this->destroy($inventoryItem);
    }

    private function buildDemoItem(){
        $inventoryItem = new InventoryItem;
        $inventoryItem->setName("Demo Item");
        $inventoryItem->setCode("DMO");
        $inventoryItem->setPrice(10.00);
        $inventoryItem->setCost(1.00);
        $inventoryItem->setWeight(12.5);
        $inventoryItem->setStock(5);
        $inventoryItem->setMetadata([
            "key1"=>"value1",
            "key2"=>"value2"
        ]);
        $inventoryItem->setLocation("MEXICO");
        $inventoryItem->setUpdateSource("WebforceHQ");
        return $inventoryItem;
    }

    private function store(InventoryItem $inventoryItem){
        $client = new Client($this->storeId, $this->key);
        $inventoryItemsApi = $client->inventoryItemsApi();
        return $inventoryItemsApi->create($inventoryItem);
    }

    private function destroy(InventoryItem $inventoryItem){
        $client = new Client($this->storeId, $this->key);
        $inventoryItemsApi = $client->inventoryItemsApi();
        return $inventoryItemsApi->destroy($inventoryItem->getId());
    }

}

<?php

use PHPUnit\Framework\TestCase;
use WebforceHQ\OrderDesk\Client;
use WebforceHQ\OrderDesk\Models\Address;
use WebforceHQ\OrderDesk\Models\Discount;
use WebforceHQ\OrderDesk\Models\Order;
use WebforceHQ\OrderDesk\Models\OrderItem;
use WebforceHQ\OrderDesk\Models\OrderNote;
use WebforceHQ\OrderDesk\Models\ReturnAddress;
use WebforceHQ\OrderDesk\Models\Shipment;

class OrderTests extends TestCase{

    private $key;
    private $storeId;
    private $orderId;

    protected function setUp(): void
    {
        $this->key = "";
        $this->storeId  = "";
        $this->orderId = uniqid();
    }

    public function testConnectionIsSuccessfull(){
        $client = new Client($this->storeId, $this->key);
        $request = $client->isOrderDeskOnline();
        $this->assertTrue($request->success);
    }

    public function testCreateOrder(){
        $order = $this->getOrderDemo();
        $response = $this->store($order);
        $this->assertTrue($response->success);
        $order->setId($response->body->order->id);
        //$this->destroy($order);
    }

    public function testReadOrder(){
        $order = $this->getOrderDemo();
        $response = $this->store($order);
        $order->setId($response->body->order->id);
        $client = new Client($this->storeId, $this->key);
        $ordersApi = $client->ordersApi();
        $response = $ordersApi->read($order->getId());
        $this->assertTrue($response->success);
        $this->destroy($order);
    }

    public function testUpdateOrder(){
        $order = $this->getOrderDemo();
        $response = $this->store($order);
        $order->setId($response->body->order->id);
        $order->setEmail("demo1@webforcehq.com");
        $order->setSourceName("Skynet");
        $client = new Client($this->storeId, $this->key);
        $ordersApi = $client->ordersApi();
        $response = $ordersApi->update($order->getId(), $order);
        $this->assertTrue($response->success);
        $this->destroy($order);
    }

    public function listOrders(){
        $order = $this->getOrderDemo();
        $response = $this->store($order);
        $order->setId($response->body->order->id);
        $client = new Client($this->storeId, $this->key);
        $ordersApi = $client->ordersApi();
        $response = $ordersApi->list();
        $this->destroy($order);
    }

    private function store(Order $order){
        $client = new Client($this->storeId, $this->key);
        $ordersApi = $client->ordersApi();
        return $ordersApi->create($order);
    }

    private function destroy(Order $order){
        $client = new Client($this->storeId, $this->key);
        $ordersApi = $client->ordersApi();
        return $ordersApi->destroy($order->getId());
    }

    private function getOrderDemo(){
        $order = new Order;
        $order->setSourceId($this->orderId);
        $order->setSourceName("WebforceHQ");
        $order->setEmail("demo@mail.com");
        $order->setShippingMethod("FedEx");
        $order->setShippingTotal(100.50);
        $order->setHandlingTotal(50.50);
        $order->setTaxTotal(25.50);
        $order->setCcNumber("4242");
        $order->setCcExp(date("m/Y"));
        $order->setProcessorResponse("stripe:123456");
        $order->setPaymentType("Visa");
        $order->setPaymentStatus("Approved");
        $order->setProcessorBalance(100.50);
        $order->setRefundTotal(0.00);
        $order->setCustomerId(100);
        $order->setIpAddress("192.168.10.24");
        $order->setCheckoutData([
            "key1" => "value1",
            "key2" => "value3",
            "key3" => "value3",
        ]);
        $order->setOrderMetadata([
            "key1" => "value1",
            "key2" => "value3",
            "key3" => "value3",           
        ]);

        //Shipping Address
        $shipping = new Address;
        $shipping->setFirstName("John");
        $shipping->setLastName("Doe");
        $shipping->setCompany("Skynet");
        $shipping->setAddress1("1 Main St");
        $shipping->setCity("San Jose");
        $shipping->setState("CA");
        $shipping->setPostalCode("95131");
        $shipping->setCountry("US");
        $shipping->setPhone("+5121236565");

        //Customer
        $customer = new Address;
        $customer->setFirstName("John");
        $customer->setLastName("Doe");
        $customer->setCompany("Skynet");
        $customer->setAddress1("1 Main St");
        $customer->setCity("San Jose");
        $customer->setState("CA");
        $customer->setPostalCode("95131");
        $customer->setCountry("US");
        $customer->setPhone("+5121236565");

        //Return Address
        $returnAddress = new ReturnAddress;
        $returnAddress->setTitle("Title");
        $returnAddress->setName("Shipping Name");
        $returnAddress->setCompany("Skynet");
        $returnAddress->setAddress1("1 Main St");
        $returnAddress->setCity("San Jose");
        $returnAddress->setState("CA");
        $returnAddress->setPostalCode("95131");
        $returnAddress->setCountry("US");
        $returnAddress->setPhone("+5121236565");

        //Discount List
        $discount = new Discount;
        $discount->setName("Black Friday");
        $discount->setCode("BF123");
        $discount->setAmount(150.00);

        //Order Notes
        $orderNote = new OrderNote;
        $orderNote->setUsername("John Connor");
        $orderNote->setContent("This is a demo note");

        //Order Shipments
        $orderShipment = new Shipment;
        $orderShipment->setTrackingNumber("n/a");
        $orderShipment->setCarrierCode("FX-123456789");
        $orderShipment->setShipmentMethod("First Class");
        $orderShipment->setWeight(10.5);
        $orderShipment->setCost(10.50);
        $orderShipment->setTrackingUrl("https://demotracking.com");

        $order->setShipping($shipping);
        $order->setCustomer($customer);
        $order->setReturnAddress($returnAddress);
        $order->setDiscountList([$discount]);
        $order->setOrderNotes([$orderNote]);
        $order->setOrderShipments([$orderShipment]);

        //Order Items
        $orderItem1 = new OrderItem;
        $orderItem1->setName("Dead Pool Figure");
        $orderItem1->setPrice(50.50);
        $orderItem1->setQuantity(1);
        $orderItem1->setWeight(1.2);
        $orderItem1->setCode("DPOOL");
        $orderItem1->setDeliveryType("future");
        $orderItem1->setCategoryCode("Toys");
        $orderItem1->setVariationList([
            "Size"=>"Large",
            "Color"=>"Red"
        ]);
        $orderItem1->setMetadata([
            "key1"=>"value1",
            "key2"=>"value2",
            "key3"=>"value3",
        ]);

        $orderItem2 = new OrderItem;
        $orderItem2->setName("Batman Figure");
        $orderItem2->setPrice(50.50);
        $orderItem2->setQuantity(1);
        $orderItem2->setWeight(1.2);
        $orderItem2->setCode("BATMAN");
        $orderItem2->setDeliveryType("future");
        $orderItem2->setCategoryCode("Toys");
        $orderItem2->setVariationList([
            "Size"=>"Large",
            "Color"=>"Red"
        ]);
        $orderItem2->setMetadata([
            "key1"=>"value1",
            "key2"=>"value2",
            "key3"=>"value3",
        ]);

        $orderItems = [$orderItem1, $orderItem2];

        $order->setOrderItems($orderItems);

        return $order;
    }
}
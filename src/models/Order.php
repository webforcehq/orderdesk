<?php

namespace WebforceHQ\OrderDesk\Models;

use WebforceHQ\OrderDesk\Models\Address;
use WebforceHQ\OrderDesk\Models\OrderNote;
use WebforceHQ\OrderDesk\Models\InventoryItem;
use WebforceHQ\OrderDesk\Models\Discount;


class Order extends OrderDeskModel
{

    protected $id;
    protected $email;
    protected $cc_exp;
    protected $shipping;
    protected $customer;
    protected $source_id;
    protected $tax_total;
    protected $cc_number;
    protected $folder_id;
    protected $ip_address;
    protected $date_added;
    protected $source_name;
    protected $order_total;
    protected $customer_id;
    protected $email_count;
    protected $order_notes;
    protected $weight_total;
    protected $payment_type;
    protected $refund_total;
    protected $date_updated;
    protected $product_total;
    protected $checkout_data;
    protected $discount_list;
    protected $quantity_total;
    protected $shipping_total;
    protected $handling_total;
    protected $discount_total;
    protected $payment_status;
    protected $fulfillment_id;
    protected $order_metadata;
    protected $return_address;
    protected $shipping_method;
    protected $order_shipments;
    protected $fulfillment_name;
    protected $processor_balance;
    protected $processor_response;

    public $order_items;

    /*At least one of these properties is required */
    protected $customer_first_name;
    protected $customer_last_name;
    protected $customer_company;
    protected $shipping_first_name;
    protected $shipping_last_name;
    protected $shipping_company;
    
    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId(string $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of source_id
     */ 
    public function getSourceId()
    {
        return $this->source_id;
    }

    /**
     * Set the value of source_id
     *
     * @return  self
     */ 
    public function setSourceId(string $source_id)
    {
        $this->source_id = $source_id;

        return $this;
    }

    /**
     * Get the value of source_name
     */ 
    public function getSourceName()
    {
        return $this->source_name;
    }

    /**
     * Set the value of source_name
     *
     * @return  self
     */ 
    public function setSourceName(string $source_name)
    {
        $this->source_name = $source_name;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of shipping_method
     */ 
    public function getShippingMethod()
    {
        return $this->shipping_method;
    }

    /**
     * Set the value of shipping_method
     *
     * @return  self
     */ 
    public function setShippingMethod(string $shipping_method)
    {
        $this->shipping_method = $shipping_method;

        return $this;
    }

    /**
     * Get the value of quantity_total
     */ 
    public function getQuantityTotal()
    {
        return $this->quantity_total;
    }

    /**
     * Set the value of quantity_total
     *
     * @return  self
     */ 
    public function setQuantityTotal(int $quantity_total)
    {
        $this->quantity_total = $quantity_total;

        return $this;
    }

    /**
     * Get the value of weight_total
     */ 
    public function getWeightTotal()
    {
        return $this->weight_total;
    }

    /**
     * Set the value of weight_total
     *
     * @return  self
     */ 
    public function setWeightTotal(float $weight_total)
    {
        $this->weight_total = $weight_total;

        return $this;
    }

    /**
     * Get the value of product_total
     */ 
    public function getProductTotal()
    {
        return $this->product_total;
    }

    /**
     * Set the value of product_total
     *
     * @return  self
     */ 
    public function setProductTotal(float $product_total)
    {
        $this->product_total = $product_total;

        return $this;
    }

    /**
     * Get the value of shipping_total
     */ 
    public function getShippingTotal()
    {
        return $this->shipping_total;
    }

    /**
     * Set the value of shipping_total
     *
     * @return  self
     */ 
    public function setShippingTotal(float $shipping_total)
    {
        $this->shipping_total = $shipping_total;

        return $this;
    }

    /**
     * Get the value of handling_total
     */ 
    public function getHandlingTotal()
    {
        return $this->handling_total;
    }

    /**
     * Set the value of handling_total
     *
     * @return  self
     */ 
    public function setHandlingTotal(float $handling_total)
    {
        $this->handling_total = $handling_total;

        return $this;
    }

    /**
     * Get the value of tax_total
     */ 
    public function getTaxTotal()
    {
        return $this->tax_total;
    }

    /**
     * Set the value of tax_total
     *
     * @return  self
     */ 
    public function setTaxTotal(float $tax_total)
    {
        $this->tax_total = $tax_total;

        return $this;
    }

    /**
     * Get the value of discount_total
     */ 
    public function getDiscountTotal()
    {
        return $this->discount_total;
    }

    /**
     * Set the value of discount_total
     *
     * @return  self
     */ 
    public function setDiscountTotal(float $discount_total)
    {
        $this->discount_total = $discount_total;

        return $this;
    }

    /**
     * Get the value of order_total
     */ 
    public function getOrderTotal()
    {
        return $this->order_total;
    }

    /**
     * Set the value of order_total
     *
     * @return  self
     */ 
    public function setOrderTotal(float $order_total)
    {
        $this->order_total = $order_total;

        return $this;
    }

    /**
     * Get the value of cc_number
     */ 
    public function getCcNumber()
    {
        return $this->cc_number;
    }

    /**
     * Set the value of cc_number
     *
     * @return  self
     */ 
    public function setCcNumber(string $cc_number)
    {
        $this->cc_number = $cc_number;

        return $this;
    }

    /**
     * Get the value of cc_exp
     */ 
    public function getCcExp()
    {
        return $this->cc_exp;
    }

    /**
     * Set the value of cc_exp
     *
     * @return  self
     */ 
    public function setCcExp(string $cc_exp)
    {
        $this->cc_exp = $cc_exp;

        return $this;
    }

    /**
     * Get the value of processor_response
     */ 
    public function getProcessorResponse()
    {
        return $this->processor_response;
    }

    /**
     * Set the value of processor_response
     *
     * @return  self
     */ 
    public function setProcessorResponse(string $processor_response)
    {
        $this->processor_response = $processor_response;

        return $this;
    }

    /**
     * Get the value of payment_type
     */ 
    public function getPaymentType()
    {
        return $this->payment_type;
    }

    /**
     * Set the value of payment_type
     *
     * @return  self
     */ 
    public function setPaymentType(string $payment_type)
    {
        $this->payment_type = $payment_type;

        return $this;
    }

    /**
     * Get the value of payment_status
     */ 
    public function getPaymentStatus()
    {
        return $this->payment_status;
    }

    /**
     * Set the value of payment_status
     *
     * @return  self
     */ 
    public function setPaymentStatus(string $payment_status)
    {
        $this->isValidOrderPaymentStatus($payment_status);

        $this->payment_status = $payment_status;

        return $this;
    }

    /**
     * Get the value of processor_balance
     */ 
    public function getProcessorBalance()
    {
        return $this->processor_balance;
    }

    /**
     * Set the value of processor_balance
     *
     * @return  self
     */ 
    public function setProcessorBalance(float $processor_balance)
    {
        $this->processor_balance = $processor_balance;

        return $this;
    }

    /**
     * Get the value of refund_total
     */ 
    public function getRefundTotal()
    {
        return $this->refund_total;
    }

    /**
     * Set the value of refund_total
     *
     * @return  self
     */ 
    public function setRefundTotal(float $refund_total)
    {
        $this->refund_total = $refund_total;

        return $this;
    }

    /**
     * Get the value of customer_id
     */ 
    public function getCustomerId()
    {
        return $this->customer_id;
    }

    /**
     * Set the value of customer_id
     *
     * @return  self
     */ 
    public function setCustomerId($customer_id)
    {
        $this->customer_id = $customer_id;

        return $this;
    }

    /**
     * Get the value of email_count
     */ 
    public function getEmailCount()
    {
        return $this->email_count;
    }

    /**
     * Set the value of email_count
     *
     * @return  self
     */ 
    public function setEmailCount(int $email_count)
    {
        $this->email_count = $email_count;

        return $this;
    }

    /**
     * Get the value of ip_address
     */ 
    public function getIpAddress()
    {
        return $this->ip_address;
    }

    /**
     * Set the value of ip_address
     *
     * @return  self
     */ 
    public function setIpAddress($ip_address)
    {
        $this->ip_address = $ip_address;

        return $this;
    }


    /**
     * Get the value of fulfillment_name
     */ 
    public function getFulfillmentName()
    {
        return $this->fulfillment_name;
    }

    /**
     * Set the value of fulfillment_name
     *
     * @return  self
     */ 
    public function setFulfillmentName(string $fulfillment_name)
    {
        $this->fulfillment_name = $fulfillment_name;

        return $this;
    }

    /**
     * Get the value of fulfillment_id
     */ 
    public function getFulfillmentId()
    {
        return $this->fulfillment_id;
    }

    /**
     * Set the value of fulfillment_id
     *
     * @return  self
     */ 
    public function setFulfillmentId($fulfillment_id)
    {
        $this->fulfillment_id = $fulfillment_id;

        return $this;
    }

    /**
     * Get the value of folder_id
     */ 
    public function getFolderId()
    {
        return $this->folder_id;
    }

    /**
     * Set the value of folder_id
     *
     * @return  self
     */ 
    public function setFolderId($folder_id)
    {
        $this->folder_id = $folder_id;

        return $this;
    }

    /**
     * Get the value of date_added
     */ 
    public function getDateAdded()
    {
        return $this->date_added;
    }

    /**
     * Set the value of date_added
     *
     * @return  self
     */ 
    public function setDateAdded($date_added)
    {
        $this->date_added = $date_added;

        return $this;
    }

    /**
     * Get the value of date_updated
     */ 
    public function getDateUpdated()
    {
        return $this->date_updated;
    }

    /**
     * Set the value of date_updated
     *
     * @return  self
     */ 
    public function setDateUpdated($date_updated)
    {
        $this->date_updated = $date_updated;

        return $this;
    }

    /**
     * Get the value of checkout_data
     */ 
    public function getCheckoutData()
    {
        return $this->checkout_data;
    }

    /**
     * Set the value of checkout_data
     *
     * @return  self
     */ 
    public function setCheckoutData(array $checkout_data)
    {
        $this->checkout_data = $checkout_data;

        return $this;
    }

    /**
     * Get the value of order_metadata
     */ 
    public function getOrderMetadata()
    {
        return $this->order_metadata;
    }

    /**
     * Set the value of order_metadata
     *
     * @return  self
     */ 
    public function setOrderMetadata(array $order_metadata)
    {
        $this->order_metadata = $order_metadata;

        return $this;
    }

    /**
     * Get the value of shipping
     */ 
    public function getShipping()
    {
        return $this->shipping;
    }

    /**
     * Set the value of shipping
     *
     * @return  self
     */ 
    public function setShipping(Address $shipping)
    {   

        $this->shipping = $shipping;

        return $this;
    }

    /**
     * Get the value of customer
     */ 
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set the value of customer
     *
     * @return  self
     */ 
    public function setCustomer(Address $customer)
    {

        $this->customer = $customer;

        return $this;
    }

    /**
     * Get the value of return_address
     */ 
    public function getReturnAddress()
    {
        return $this->return_address;
    }

    /**
     * Set the value of return_address
     *
     * @return  self
     */ 
    public function setReturnAddress(ReturnAddress $return_address)
    {

        $this->return_address = $return_address;

        return $this;
    }

    /**
     * Get the value of discount_list
     */ 
    public function getDiscountList()
    {
        return $this->discount_list;
    }

    /**
     * Set the value of discount_list
     *
     * @return  self
     */ 
    public function setDiscountList(array $discount_list)
    {
        $this->allObjectsAreValidClass([Discount::class], $discount_list);

        $this->discount_list = $discount_list;

        return $this;
    }

    /**
     * Get the value of order_notes
     */ 
    public function getOrderNotes()
    {
        return $this->order_notes;
    }

    /**
     * Set the value of order_notes
     *
     * @return  self
     */ 
    public function setOrderNotes(array $order_notes)
    {
        $this->allObjectsAreValidClass([OrderNote::class], $order_notes);

        $this->order_notes = $order_notes;

        return $this;
    }

    /**
     * Get the value of order_shipments
     */ 
    public function getOrderShipments()
    {
        return $this->order_shipments;
    }

    /**
     * Set the value of order_shipments
     *
     * @return  self
     */ 
    public function setOrderShipments(array $order_shipments)
    {
        $this->allObjectsAreValidClass([Shipment::class], $order_shipments);

        $this->order_shipments = $order_shipments;

        return $this;
    }

    /**
     * Get the value of customer_first_name
     */ 
    public function getCustomerFirstName()
    {
        return $this->customer_first_name;
    }

    /**
     * Set the value of customer_first_name
     *
     * @return  self
     */ 
    public function setCustomerFirstName(string $customer_first_name)
    {
        $this->customer_first_name = $customer_first_name;

        return $this;
    }

    /**
     * Get the value of customer_last_name
     */ 
    public function getCustomerLastname()
    {
        return $this->customer_last_name;
    }

    /**
     * Set the value of customer_last_name
     *
     * @return  self
     */ 
    public function setCustomerLastName(string $customer_last_name)
    {
        $this->customer_last_name = $customer_last_name;

        return $this;
    }

    /**
     * Get the value of customer_company
     */ 
    public function getCustomerCompany()
    {
        return $this->customer_company;
    }

    /**
     * Set the value of customer_company
     *
     * @return  self
     */ 
    public function setCustomerCompany(string $customer_company)
    {
        $this->customer_company = $customer_company;

        return $this;
    }

    /**
     * Get the value of shipping_first_name
     */ 
    public function getShippingFirstName()
    {
        return $this->shipping_first_name;
    }

    /**
     * Set the value of shipping_first_name
     *
     * @return  self
     */ 
    public function setShippingFirstName($shipping_first_name)
    {
        $this->shipping_first_name = $shipping_first_name;

        return $this;
    }

    /**
     * Get the value of shipping_last_name
     */ 
    public function getShippingLastName()
    {
        return $this->shipping_last_name;
    }

    /**
     * Set the value of shipping_last_name
     *
     * @return  self
     */ 
    public function setShippingLastName(string $shipping_last_name)
    {
        $this->shipping_last_name = $shipping_last_name;

        return $this;
    }

    /**
     * Get the value of shipping_company
     */ 
    public function getShippingCompany()
    {
        return $this->shipping_company;
    }

    /**
     * Set the value of shipping_company
     *
     * @return  self
     */ 
    public function setShippingCompany(string $shipping_company)
    {
        $this->shipping_company = $shipping_company;

        return $this;
    }

    /**
     * Get the value of orderItems
     */ 
    public function getOrderItems()
    {
        return $this->order_items;
    }

    /**
     * Set the value of orderItems
     *
     * @return  self
     */ 
    public function setOrderItems(array $orderItems)
    {
        $this->allObjectsAreValidClass([InventoryItem::class,OrderItem::class], $orderItems);

        $this->order_items = $orderItems;

        return $this;
    }
}

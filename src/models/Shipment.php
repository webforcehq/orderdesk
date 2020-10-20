<?php

namespace WebforceHQ\OrderDesk\Models;

class Shipment extends OrderDeskModel
{

    protected $id;
    protected $cost;
    protected $weight;
    protected $status;
    protected $carrier_code;
    protected $tracking_url;
    protected $tracking_number;
    protected $shipment_method;

    /**
     * Get the value of tracking_number
     */ 
    public function getTrackingNumber()
    {
        return $this->tracking_number;
    }

    /**
     * Set the value of tracking_number
     *
     * @return  self
     */ 
    public function setTrackingNumber(string $tracking_number)
    {
        $this->tracking_number = $tracking_number;

        return $this;
    }

    /**
     * Get the value of carrier_code
     */ 
    public function getCarrierCode()
    {
        return $this->carrier_code;
    }

    /**
     * Set the value of carrier_code
     *
     * @return  self
     */ 
    public function setCarrierCode(string $carrier_code)
    {
        $this->carrier_code = $carrier_code;

        return $this;
    }

    /**
     * Get the value of shipment_method
     */ 
    public function getShipmentMethod()
    {
        return $this->shipment_method;
    }

    /**
     * Set the value of shipment_method
     *
     * @return  self
     */ 
    public function setShipmentMethod(string $shipment_method)
    {
        $this->shipment_method = $shipment_method;

        return $this;
    }

    /**
     * Get the value of weight
     */ 
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set the value of weight
     *
     * @return  self
     */ 
    public function setWeight(float $weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get the value of cost
     */ 
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set the value of cost
     *
     * @return  self
     */ 
    public function setCost(float $cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus(string $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of tracking_url
     */ 
    public function getTrackingUrl()
    {
        return $this->tracking_url;
    }

    /**
     * Set the value of tracking_url
     *
     * @return  self
     */ 
    public function setTrackingUrl($tracking_url)
    {
        $this->tracking_url = $tracking_url;

        return $this;
    }

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
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}

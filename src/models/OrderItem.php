<?php

namespace WebforceHQ\OrderDesk\Models;

use WebforceHQ\OrderDesk\Models\OrderDeskModel;

class OrderItem extends OrderDeskModel
{

    protected $id;
    protected $name;
    protected $code;
    protected $price;
    protected $weight;
    protected $quantity;
    protected $metadata;
    protected $delivery_type;
    protected $category_code;
    protected $variation_list;

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

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName(string $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice(float $price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of quantity
     */ 
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Set the value of quantity
     *
     * @return  self
     */ 
    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;

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
     * Get the value of code
     */ 
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set the value of code
     *
     * @return  self
     */ 
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get the value of delivery_type
     */ 
    public function getDeliveryType()
    {
        return $this->delivery_type;
    }

    /**
     * Set the value of delivery_type
     *
     * @return  self
     */ 
    public function setDeliveryType($delivery_type)
    {
        
        $this->isValidDeliveryType($delivery_type);
        
        $this->delivery_type = $delivery_type;

        return $this;
    }

    /**
     * Get the value of category_code
     */ 
    public function getCategoryCode()
    {
        return $this->category_code;
    }

    /**
     * Set the value of category_code
     *
     * @return  self
     */ 
    public function setCategoryCode(string $category_code)
    {
        $this->category_code = $category_code;

        return $this;
    }

    /**
     * Get the value of variation_list
     */ 
    public function getVariationList()
    {
        return $this->variation_list;
    }

    /**
     * Set the value of variation_list
     *
     * @return  self
     */ 
    public function setVariationList(array $variation_list)
    {
        $this->variation_list = $variation_list;

        return $this;
    }

    /**
     * Get the value of metadata
     */ 
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * Set the value of metadata
     *
     * @return  self
     */ 
    public function setMetadata(array $metadata)
    {
        $this->metadata = $metadata;

        return $this;
    }
}

<?php

namespace WebforceHQ\OrderDesk\Models;

use phpDocumentor\Reflection\Types\Integer;

class MoveOrder extends OrderDeskModel
{

    protected $order_id_list;
    protected $destination_folder_id;
    protected $destination_folder_name;

    /**
     * Get the value of order_id_list
     */ 
    public function getOrderIdList()
    {
        return $this->order_id_list;
    }

    /**
     * Set the value of order_id_list
     *
     * @return  self
     */ 
    public function setOrderIdList(array $order_id_list)
    {
        $this->allObjectsAreValidClass([Integer::class], $order_id_list);

        $this->order_id_list = $order_id_list;

        return $this;
    }

    /**
     * Get the value of destination_folder_id
     */ 
    public function getDestinationFolderId()
    {
        return $this->destination_folder_id;
    }

    /**
     * Set the value of destination_folder_id
     *
     * @return  self
     */ 
    public function setDestinationFolderId(int $destination_folder_id)
    {
        $this->destination_folder_id = $destination_folder_id;

        return $this;
    }

    /**
     * Get the value of destination_folder_name
     */ 
    public function getDestinationFolderName()
    {
        return $this->destination_folder_name;
    }

    /**
     * Set the value of destination_folder_name
     *
     * @return  self
     */ 
    public function setDestinationFolderName(string $destination_folder_name)
    {
        $this->destination_folder_name = $destination_folder_name;

        return $this;
    }
}

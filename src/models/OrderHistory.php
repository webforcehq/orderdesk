<?php

namespace WebforceHQ\OrderDesk\Models;

class OrderHistory extends OrderDeskModel
{

    protected $note;
    protected $source_name;

    /**
     * Get the value of note
     */ 
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set the value of note
     *
     * @return  self
     */ 
    public function setNote(string $note)
    {
        $this->note = $note;

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
}

<?php

namespace WebforceHQ\OrderDesk\Models;

use WebforceHQ\OrderDesk\Models\OrderDeskModel;

class OrderNote extends OrderDeskModel
{

    protected $date_added;
    protected $username;
    protected $content;

    /**
     * Get the value of date_added
     */ 
    public function getDateAdded()
    {
        return $this->date_added;
    }


    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of content
     */ 
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */ 
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }
}

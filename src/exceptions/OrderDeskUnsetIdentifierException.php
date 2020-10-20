<?php

namespace WebforceHQ\OrderDesk\Exceptions;

use Exception;

class OrderDeskUnsetIdentifierException extends Exception
{

    protected $message = "Identifier (ID) element has not been set and is a required parameter";

    public function __construct($msg = null)
    {
        if ($msg) {
            $this->message = $msg;
        }
    }
}

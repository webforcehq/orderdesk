<?php

namespace WebforceHQ\OrderDesk\Models;

use Exception;
use JsonSerializable;

abstract class OrderDeskModel implements JsonSerializable
{
    public function jsonSerialize(){
        return get_object_vars($this);
    }
    
    public function toArray(){
        return array_filter(json_decode(json_encode($this), true));
    }

    protected function allObjectsAreValidClass(array $validClasses, array $objects){
        foreach($objects as $object){
            $currClazz = get_class($object);
            if( ! in_array($currClazz, $validClasses) ){
                $allowedClasses = join(",",$validClasses);
                throw new Exception("Object of class {$currClazz} not allowed, expecting objects of classes: {$allowedClasses}");
            }
        }
    }

    protected function isValidOrderPaymentStatus($status){
        $validStatus = [ "Approved", "Authorized", "Captured", "Fully Refunded", "Partially Refunded", "Pending", "Rejected","Voided"];
        $validValues = join(",",$validStatus);
        if( ! in_array($status, $validStatus) ){
            throw new Exception("Invalid payment status: {$status}, valid values are {$validValues} ");
        }
    }

    protected function isValidDeliveryType($status){
        $validStatus = ["ship", "noship", "download", "future"];
        $validValues = join(",",$validStatus);
        if( ! in_array($status, $validStatus) ){
            throw new Exception("Invalid delivery type: {$status}, valid values are {$validValues} ");
        }
    }

}

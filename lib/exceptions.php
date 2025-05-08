<?php
/**
* @package exceptions
* MethodNotImplementedException occurs when a method is not present
* Program defensively!
* @param $message any additional human readable info.
* @param $code error code.
* @return Informative exception error message.
* @author florianh
*/

class MethodNotImplementedException extends RuntimeException {
    public function __construct($message = '', $code = 0) {
        $message = "Method is not yet implemented";
 //       debug_dump($message, $object);
        return parent::__construct($message, $code);
    }
}

/**
* @package exceptions
* BadRequestException occurs when a request is formulated incorectly
* Program defensively!
* @param $message any additional human readable info.
* @param $code error code.
* @return Informative exception error message.
* @author florianh
*/

class BadRequestException extends RuntimeException {
    public function __construct($message = '', $code = 0) {
        $message = "Bad Request exception";
 //       debug_dump($message, $object);
        return parent::__construct($message, $code);
    }
}

/**
* @package exceptions
* BadRequestException occurs when a request is formulated incorectly
* Program defensively!
* @param $message any additional human readable info.
* @param $code error code.
* @return Informative exception error message.
* @author florianh
*/

class InternalErrorException extends RuntimeException {
    public function __construct($message = '', $code = 0) {
        $message = "Internal error exception";
 //       debug_dump($message, $object);
        return parent::__construct($message, $code);
    }
}

?>

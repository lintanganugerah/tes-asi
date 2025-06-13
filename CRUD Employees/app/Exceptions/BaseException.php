<?php

namespace App\Exceptions;

use Exception;

class BaseException extends Exception
{
    public $statusCode;
    public $errors;

    public function __construct($message = "", $errors = [], $statusCode = 500)
    {
        parent::__construct($message);
        $this->statusCode = $statusCode;
        $this->errors = $errors;
    }
}

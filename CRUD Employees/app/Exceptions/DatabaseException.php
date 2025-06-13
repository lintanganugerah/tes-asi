<?php

namespace App\Exceptions;

use App\Exceptions\BaseException;

class DatabaseException extends BaseException
{
    public function __construct($message = "Database Error", $errors = [], $statusCode = 500)
    {
        parent::__construct($message, $errors, $statusCode);
    }
}

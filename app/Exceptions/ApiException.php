<?php


namespace App\Exceptions;
use Exception;

class ApiException extends Exception
{
    public function __construct(array $codeResponse,$info='')
    {
        [$code,$message] = $codeResponse;
        parent::__construct($info ?: $message,$code);
    }

    public function report(): bool
    {
        return true;
    }
}

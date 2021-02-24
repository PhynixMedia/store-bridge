<?php

namespace Phynixmedia\Store\Exceptions;

use Phynixmedia\Store\Traits\ResponseTrait;
use Phynixmedia\Store\Core\StoreConstants;
use Psr\Http\Message\ResponseInterface;
use Exception;

class StoreException extends Exception
{

    use ResponseTrait;

    protected $responseCode;

    protected $responseBody;

    public function __construct($error)
    {
        parent::__construct($error);
    }

    public function getStatusCode()
    {
        return $this->responseCode;
    }

    public function getResponseBody()
    {
        return $this->responseBody;
    }
}
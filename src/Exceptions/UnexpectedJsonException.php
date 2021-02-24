<?php

namespace Phynixmedia\Store\Exceptions;

use Phynixmedia\Store\Traits\ResponseTrait;
use Phynixmedia\Store\Core\StoreConstants;
use Psr\Http\Message\ResponseInterface;
use Exception;

class UnexpectedJsonException extends StoreException
{

    use ResponseTrait;

    public function __construct(ResponseInterface $response)
    {
        $this->responseCode = $response->getStatusCode();

        $this->responseBody = $response->getBody()->getContents();

        $error = $this->responseError($this->responseCode, $this->responseBody, StoreConstants::UNEXPECTED_JSON_STRUCTURE_ERROR);

        parent::__construct($error);
    }
}
<?php

namespace Phynixmedia\Store\Exceptions;

use Phynixmedia\Store\Traits\ResponseTrait;
use Phynixmedia\Store\Core\StoreConstants;
use Psr\Http\Message\ResponseInterface;

class StoreUnableToConnectException extends StoreException
{

    use ResponseTrait;

    public function __construct(ResponseInterface $response)
    {
        $this->responseBody = $response->getBody()->getContents();

        $error = $this->responseError(404, $this->responseBody, StoreConstants::STORE_UNABLE_TO_CONNECT_EXCEPTION);

        parent::__construct($error);
    }
}
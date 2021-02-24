<?php

namespace Phynixmedia\Store\Exceptions;

use Phynixmedia\Store\Traits\ResponseTrait;
use Phynixmedia\Store\Core\StoreConstants;
use Psr\Http\Message\ResponseInterface;

class UnexpectedStatusCodeException extends StoreException
{

    use ResponseTrait;

    public function __construct(ResponseInterface $response)
    {
        $this->responseCode = $response->getStatusCode();

        $this->responseBody = $response->getBody()->getContents();

        $error = $this->responseError(
            $response->getStatusCode(), $response->getBody()->getContents(), StoreConstants::UNEXPECTED_STATUS_CODE_ERROR);

        parent::__construct($error);
    }
}
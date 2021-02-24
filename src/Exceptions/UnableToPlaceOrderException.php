<?php

namespace Phynixmedia\Store\Exceptions;

use Phynixmedia\Store\Traits\ResponseTrait;
use Phynixmedia\Store\Core\StoreConstants;
use Psr\Http\Message\ResponseInterface;
use Exception;

class UnableToPlaceOrderException extends Exception
{

    use ResponseTrait;

    public function __construct(ResponseInterface $response)
    {
        $error = $this->responseError(
            $response->getStatusCode(), $response->getBody()->getContents(), StoreConstants::UNABLE_TO_PLACE_ORDER_ERROR);

        parent::__construct($error);
    }
}
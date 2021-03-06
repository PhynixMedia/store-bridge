<?php

namespace Phynixmedia\Store\Responses\Parsers;

use Phynixmedia\Store\Exceptions\UnexpectedStatusCodeException;
use Phynixmedia\Store\Exceptions\UnexpectedJsonException;
use Psr\Http\Message\ResponseInterface;
use Phynixmedia\Store\Responses\Response;
use Exception;

class OrderResponseParser
{

    private $response;

    /**
     * ProductResponseParser constructor.
     * @param ResponseInterface $response
     * @throws UnexpectedJsonException
     * @throws UnexpectedStatusCodeException
     */
    public function __construct(ResponseInterface $response)
    {
        if($response->getStatusCode() !== 200){
            throw new UnexpectedStatusCodeException($response);
        }

        $this->response = new Response();

        $this->response->{'orders'} = $response->getBody()->getContents();
    }


    public  function getResponse(): ?Response
    {
        return $this->response;
    }

}
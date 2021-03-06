<?php

namespace Phynixmedia\Store\Responses\Parsers;

use Phynixmedia\Store\Exceptions\UnexpectedStatusCodeException;
use Phynixmedia\Store\Exceptions\UnexpectedJsonException;
use Psr\Http\Message\ResponseInterface;
use Phynixmedia\Store\Responses\Response;
use Exception;

class DealsResponseParser
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

        $this->response->{'category'} = $response->getBody()->getContents();
    }


    public  function getResponse(): ?Response
    {
        return $this->response;
    }

}
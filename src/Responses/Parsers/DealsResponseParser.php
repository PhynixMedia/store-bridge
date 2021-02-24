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

        $bodyString = $response->getBody()->getContents();

        try
        {
            $body = json_decode($bodyString, false, 512, JSON_THROW_ON_ERROR);
        } catch (Exception $e) {

            throw new UnexpectedJsonException($response);
        }

        if(!property_exists($body, 'data')){
            throw new UnexpectedJsonException($response);
        }

        $this->response = new Response();

        $this->response->{'category'} = $body->data;
    }


    public  function getResponse(): ?Response
    {
        return $this->response;
    }

}
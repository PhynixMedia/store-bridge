<?php

namespace Phynixmedia\Store\Responses\Parsers;

use Phynixmedia\Store\Exceptions\UnexpectedStatusCodeException;
use Phynixmedia\Store\Exceptions\UnexpectedJsonException;
use Psr\Http\Message\ResponseInterface;
use Phynixmedia\Store\Responses\Response;
use Exception;

class ResponseParser
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

        try
        {
            $body = json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
        } catch (Exception $e) {

            throw new UnexpectedJsonException($response);
        }

        $this->response = new Response();

        foreach($body as $key => $value)
        {
            $this->response->{$key} = $value;
        }
    }

    public  function getResponse(): ?Response
    {
        return $this->response;
    }

}
